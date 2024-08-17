<?php

namespace App\Http\Controllers;

use App\Models\Collectible;
use App\Models\Rarity;
use Illuminate\Http\Request;

class CollectibleController extends Controller
{
    // Display a listing of the collectibles.
    public function index()
    {
        $collectibles = Collectible::all();
        return view('collectibles.index', compact('collectibles'));
    }



    // Store a newly created collectible in storage.
    public function store(Request $request)
    {
        $request->validate([
            'collectible_id' => 'nullable|string|max:255|unique:collectibles,collectible_id',
            'name' => 'nullable|string|max:255',
            'rarity' => 'nullable|string|max:50',
            'version' => 'nullable|integer',
            'sequence_number' => 'nullable|integer',
            'qr_code_id' => 'nullable|string|max:255|unique:collectibles,qr_code_id',
            'loyalty_points' => 'nullable|integer',
            'nfts_included' => 'nullable|integer',
        ]);

        Collectible::create($request->all());

        return redirect()->route('collectibles.index')->with('success', 'Collectible created successfully.');
    }

    // Display the specified collectible.
    public function show(Collectible $collectible)
    {
        return view('collectibles.show', compact('collectible'));
    }
    // Show the form for creating a new collectible.
    public function create()
    {
        $rarities = Rarity::all(); // Fetch all rarities from the database
        return view('collectibles.create', compact('rarities'));
    }

// Show the form for editing the specified collectible.
    public function edit(Collectible $collectible)
    {
        $rarities = Rarity::all(); // Ensure rarities are available for the dropdown
        return view('collectibles.edit', compact('collectible', 'rarities'));
    }
    // Update the specified collectible in storage.
    public function update(Request $request, Collectible $collectible)
    {
        $request->validate([
            'collectible_id' => 'nullable|string|max:255|unique:collectibles,collectible_id,' . $collectible->id,
            'name' => 'nullable|string|max:255',
            'rarity' => 'nullable|string|max:50',
            'version' => 'nullable|integer',
            'sequence_number' => 'nullable|integer',
            'qr_code_id' => 'nullable|string|max:255|unique:collectibles,qr_code_id,' . $collectible->id,
            'loyalty_points' => 'nullable|integer',
            'nfts_included' => 'nullable|integer',
        ]);

        $collectible->update($request->all());

        return redirect()->route('collectibles.index')->with('success', 'Collectible updated successfully.');
    }

    // Remove the specified collectible from storage.
    public function destroy(Collectible $collectible)
    {
        $collectible->delete();

        return redirect()->route('collectibles.index')->with('success', 'Collectible deleted successfully.');
    }
}
