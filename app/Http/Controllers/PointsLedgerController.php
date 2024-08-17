<?php

namespace App\Http\Controllers;

use App\Models\PointsLedger;
use Illuminate\Http\Request;

class PointsLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points_ledgers = PointsLedger::all();
        return view('points_ledgers.index', compact('points_ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('points_ledgers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string|max:255',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'transaction_type' => 'required|string|max:255',
            'points' => 'required|integer',
            'base_points_balance' => 'required|integer',
            'redeemable_points_balance' => 'required|integer',
        ]);

        PointsLedger::create($request->all());

        return redirect()->route('points_ledgers.index')->with('success', 'Points Ledger entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PointsLedger $pointsLedger)
    {
        $pointsLedger;
        return view('points_ledgers.show', compact('pointsLedger'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointsLedger $pointsLedger)
    {
        return view('points_ledgers.edit', compact('pointsLedger'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PointsLedger $pointsLedger)
    {
        $request->validate([
            'transaction_id' => 'required|string|max:255',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'transaction_type' => 'required|string|max:255',
            'points' => 'required|integer',
            'base_points_balance' => 'required|integer',
            'redeemable_points_balance' => 'required|integer',
        ]);

        $pointsLedger->update($request->all());

        return redirect()->route('points_ledgers.index')->with('success', 'Points Ledger entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointsLedger $pointsLedger)
    {
        $pointsLedger->delete();

        return redirect()->route('points_ledgers.index')->with('success', 'Points Ledger entry deleted successfully.');
    }
}
