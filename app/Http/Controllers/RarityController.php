<?php

namespace App\Http\Controllers;

use App\Models\Rarity;
use Illuminate\Http\Request;

class RarityController extends Controller
{
    // Display a listing of the rarities.
    public function index()
    {
        $rarities = Rarity::all();
        return view('rarities.index', compact('rarities'));
    }

    // Show the form for creating a new rarity.
    public function create()
    {
        return view('rarities.create');
    }

    // Store a newly created rarity in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percent_of_total_inventory' => 'required|numeric|min:0|max:100',
            'nfts_included' => 'required|integer|min:0',
            'loyalty_points_earned' => 'required|integer|min:0',
        ]);

        Rarity::create($request->all());

        return redirect()->route('rarities.index')->with('success', 'Rarity created successfully.');
    }

    // Display the specified rarity.
    public function show(Rarity $rarity)
    {
        return view('rarities.show', compact('rarity'));
    }

    // Show the form for editing the specified rarity.
    public function edit(Rarity $rarity)
    {
        return view('rarities.edit', compact('rarity'));
    }

    // Update the specified rarity in storage.
    public function update(Request $request, Rarity $rarity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percent_of_total_inventory' => 'required|numeric|min:0|max:100',
            'nfts_included' => 'required|integer|min:0',
            'loyalty_points_earned' => 'required|integer|min:0',
        ]);

        $rarity->update($request->all());

        return redirect()->route('rarities.index')->with('success', 'Rarity updated successfully.');
    }

    // Remove the specified rarity from storage.
    public function destroy(Rarity $rarity)
    {
        $rarity->delete();

        return redirect()->route('rarities.index')->with('success', 'Rarity deleted successfully.');
    }
}
