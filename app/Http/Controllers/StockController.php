<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stocks.index')
            ->with('stocks', Stock::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        // Import the stocks from the Excel file
//        Excel::import(new StocksImport, $file);
        \Maatwebsite\Excel\Facades\Excel::import(new StocksImport, $file);

        // Redirect back with a success message
        return back()->with('success', 'Stocks uploaded successfully.');


//        $file = $request->file('file');
//
////        Excel::import(new CountryImport, );
//        \Maatwebsite\Excel\Facades\Excel::import(new StocksImport, $file);
//
//        return back()->withStatus('Excel file imported successfully');
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
