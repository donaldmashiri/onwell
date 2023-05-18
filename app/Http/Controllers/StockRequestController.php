<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all stock requests
        $stockRequests = StockRequest::all();
        $stocksAll = Stock::all();

        // Retrieve the stock IDs from the requests
        $stockIds = $stockRequests->pluck('stock_id')->toArray();
        $stockReID = $stocksAll->pluck('id')->toArray();

        // Retrieve the stocks based on the requested stock IDs
        $stocks = Stock::whereIn('id', $stockIds)->get();
        $stocksrequests = StockRequest::whereIn('id', $stockReID)->get();

        // Return the view with the retrieved stocks
        return view('stocksrequests.index', ['stocks' => $stocks, 'stocksrequests' => $stocksrequests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stocksrequests.create')->with('stocks', Stock::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = "requested";
        StockRequest::create([
            "user_id"=>Auth::user()->id,
            "stock_id" => request('stock_id'),
            "status" => $status,
            "quantity_requested" => request('quantity_requested'),
        ]);

        // flash message
//        session()->flash('status', 'Stock Successfully requested.');
//
//        return view('stocksrequests.index')->with('stocks', Stock::all());

        return redirect()->back()->with('success', 'Stock Successfully requested.');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the stock request by ID
        $stockRequest = StockRequest::findOrFail($id);

        // Update the status or perform any other necessary actions
        $stockRequest->status = 'Approved';
        $stockRequest->save();

        return redirect()->back()->with('success', 'Stock request approved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the stock request by ID
        $stockRequest = StockRequest::findOrFail($id);

        // Perform any necessary cleanup or deletion
        $stockRequest->delete();

        // Redirect back or to any other desired page
        return redirect()->back()->with('success', 'Stock request declined and deleted successfully.');
    }
}
