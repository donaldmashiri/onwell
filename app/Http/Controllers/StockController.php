<?php

namespace App\Http\Controllers;

use App\Imports\StockImport;
use App\Imports\StocksImport;
use App\Models\Stock;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\ToModel;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stocks.index')
            ->with('stocks', Stock::all());
    }

    public function level()
    {
        return view('stocks.level')
            ->with('stocks', Stock::all());
    }

    public function reports()
    {
        return view('stocks.reports');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stocks.create')
            ->with('stocks', Stock::all());
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        \Maatwebsite\Excel\Facades\Excel::import(new StockImport, $file);

        return back()->withStatus('Excel file imported successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'max:255'],
            'price' => ['required', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        Stock::create([
            "name" => request('name'),
            "quantity" => request('quantity'),
            "price" => request('price'),
            "description" => request('description'),
            "type" => request('type'),
        ]);

        // flash message
        session()->flash('status', 'Stock Successfully added.');

        return view('stocks.index')->with('stocks', Stock::all());
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);

        $stock->delete();

        return back()->withStatus('Stock deleted Deleted');
    }
}
