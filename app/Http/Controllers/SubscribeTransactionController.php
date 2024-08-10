<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubscribeTransaction;

class SubscribeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $subscribeTransaction = SubscribeTransaction::find($id);
        return response()->json($subscribeTransaction);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscribeTransaction = SubscribeTransaction::find($id);
        return view('subscribe_transactions.edit', compact('subscribeTransaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subscribeTransaction = SubscribeTransaction::find($id);
        // Update data based on the request
        $subscribeTransaction->update($request->all());
        return response()->json($subscribeTransaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subscribeTransaction = SubscribeTransaction::find($id);
        $subscribeTransaction->delete();
        return response()->json(['message' => 'Successfully deleted']);
    }
}
