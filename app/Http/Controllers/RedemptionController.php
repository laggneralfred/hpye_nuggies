<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PointsLedger;
use App\Models\RedemptionRequest;
use Illuminate\Http\Request;

class RedemptionController extends Controller
{
    // Display a listing of the redemption requests.
    public function index()
    {
        $redemptions = RedemptionRequest::all();
        return view('redemptions.index', compact('redemptions'));
    }

    // Show the form for creating a new redemption request.
    public function create()
    {
        $customers = Customer::all();
        return view('redemptions.create', compact('customers'));
    }

    // Store a newly created redemption request in storage.
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'item_requested' => 'required|string|max:255',
            'points_required' => 'required|integer|min:1',
        ]);

        $customer = Customer::find($request->customer_id);

        if ($customer->total_redeemable_points < $request->points_required) {
            return redirect()->back()->withErrors(['points_required' => 'Insufficient points for redemption.']);
        }

        RedemptionRequest::create([
            'request_id' => 'RR-' . now()->format('Ymd') . '-' . str_pad(RedemptionRequest::count() + 1, 5, '0', STR_PAD_LEFT),
            'customer_id' => $request->customer_id,
            'item_requested' => $request->item_requested,
            'points_required' => $request->points_required,
            'status' => 'Pending',
        ]);

        return redirect()->route('redemptions.index')->with('success', 'Redemption request created successfully.');
    }

    // Display the specified redemption request.
    public function show(RedemptionRequest $redemption)
    {
        return view('redemptions.show', compact('redemption'));
    }

    // Show the form for editing the specified redemption request.
    public function edit(RedemptionRequest $redemption)
    {
        return view('redemptions.edit', compact('redemption'));
    }

    // Update the specified redemption request in storage.
    public function update(Request $request, RedemptionRequest $redemption)
    {
        $request->validate([
            'item_requested' => 'required|string|max:255',
            'points_required' => 'required|integer|min:1',
        ]);

        $redemption->update($request->all());

        return redirect()->route('redemptions.index')->with('success', 'Redemption request updated successfully.');
    }

    // Remove the specified redemption request from storage.
    public function destroy(RedemptionRequest $redemption)
    {
        $redemption->delete();

        return redirect()->route('redemptions.index')->with('success', 'Redemption request deleted successfully.');
    }

    // Custom method to redeem points and create a redemption request.
    public function redeem(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        if ($customer && $customer->total_redeemable_points >= $request->points_required) {
            $customer->total_redeemable_points -= $request->points_required;
            $customer->save();

            PointsLedger::create([
                'transaction_id' => 'LP-REDEEM-' . now()->format('Ymd') . '-' . str_pad(PointsLedger::count() + 1, 5, '0', STR_PAD_LEFT),
                'customer_id' => $request->customer_id,
                'date' => now(),
                'transaction_type' => 'REDEEM',
                'points' => -$request->points_required,
                'base_points_balance' => $customer->total_base_points,
                'redeemable_points_balance' => $customer->total_redeemable_points,
            ]);

            RedemptionRequest::create([
                'request_id' => 'RR-' . now()->format('Ymd') . '-' . str_pad(RedemptionRequest::count() + 1, 5, '0', STR_PAD_LEFT),
                'customer_id' => $request->customer_id,
                'item_requested' => $request->item_requested,
                'points_required' => $request->points_required,
                'status' => 'Pending',
            ]);

            return response()->json(['message' => 'Redemption request submitted.'], 200);
        }
        return response()->json(['message' => 'Insufficient points.'], 400);
    }
}
