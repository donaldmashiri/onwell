<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Stock;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastBudget = Budget::latest()->first();

        return view('budgets.index')->with([
            'stocks' => Stock::all(),
            'lastBudget' => Budget::latest()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Budget::create([
            "amount" => request('amount'),
        ]);

        // flash message
//        session()->flash('status', 'Budget created added.');
//
//        return view('budgets.index')->with('stocks', Stock::all());
        return redirect()->back()->with('success', 'Budget created added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
