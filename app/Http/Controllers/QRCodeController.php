<?php

namespace App\Http\Controllers;

use App\Models\QRCode;
use App\Models\Customer;
use App\Models\PointsLedger;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    // Display a listing of the QR codes.
    public function index()
    {
        $qrCodes = QRCode::all();
        return view('qrcodes.index', compact('qrCodes'));
    }

    // Show the form for creating a new QR code.
    public function create()
    {
        return view('qrcodes.create');
    }

    // Store a newly created QR code in storage.
    public function store(Request $request)
    {
        $request->validate([
            'qr_code_id' => 'required|string|max:255|unique:qr_codes',
            // Add other fields and validation rules as necessary
        ]);

        QRCode::create($request->all());

        return redirect()->route('qrcodes.index')->with('success', 'QR Code created successfully.');
    }

    // Display the specified QR code.
    public function show(QRCode $qrCode)
    {
        return view('qrcodes.show', compact('qrCode'));
    }

    // Show the form for editing the specified QR code.
    public function edit(QRCode $qrCode)
    {
        return view('qrcodes.edit', compact('qrCode'));
    }

    // Update the specified QR code in storage.
    public function update(Request $request, QRCode $qrCode)
    {
        $request->validate([
            'qr_code_id' => 'required|string|max:255|unique:qr_codes,qr_code_id,' . $qrCode->id,
            // Add other fields and validation rules as necessary
        ]);

        $qrCode->update($request->all());

        return redirect()->route('qrcodes.index')->with('success', 'QR Code updated successfully.');
    }

    // Remove the specified QR code from storage.
    public function destroy(QRCode $qrCode)
    {
        $qrCode->delete();

        return redirect()->route('qrcodes.index')->with('success', 'QR Code deleted successfully.');
    }

    // Custom method to scan a QR code and assign points to a customer.
    public function scan(Request $request)
    {
        $qrCode = QRCode::where('qr_code_id', $request->qr_code_id)->first();

        if ($qrCode && !$qrCode->customer_id) {
            $qrCode->customer_id = $request->customer_id;
            $qrCode->date_scanned = now();
            $qrCode->save();

            // Update points ledger
            $customer = Customer::find($request->customer_id);
            $points = $qrCode->collectible->loyalty_points;
            $customer->total_base_points += $points;
            $customer->total_redeemable_points += $points;
            $customer->save();

            PointsLedger::create([
                'transaction_id' => 'LP-EARN-' . now()->format('Ymd') . '-' . str_pad(PointsLedger::count() + 1, 5, '0', STR_PAD_LEFT),
                'customer_id' => $request->customer_id,
                'date' => now(),
                'transaction_type' => 'EARN',
                'points' => $points,
                'base_points_balance' => $customer->total_base_points,
                'redeemable_points_balance' => $customer->total_redeemable_points,
            ]);

            return response()->json(['message' => 'Points earned successfully.'], 200);
        }

        return response()->json(['message' => 'Invalid or already scanned QR code.'], 400);
    }
}
