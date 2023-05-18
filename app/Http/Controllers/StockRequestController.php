<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockRequest;
use Illuminate\Http\Request;

class StockRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all stock requests
        $stockRequests = StockRequest::all();

        // Retrieve the stock IDs from the requests
        $stockIds = $stockRequests->pluck('stock_id')->toArray();

        // Retrieve the stocks based on the requested stock IDs
        $stocks = Stock::whereIn('id', $stockIds)->get();

        // Return the view with the retrieved stocks
        return view('stocksrequests.index', ['stocks' => $stocks]);
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
        //
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
