<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubscribeTransaction; // Tambahkan ini



class SubscribeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transactions=SubscribeTransaction::with(['user'])->orderByDesc('id')->get();
        return view('admin.transactions.index',compact('transactions'));
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
    public function show(SubscribeTransaction $subscribeTransaction )
    {
        return view ('admin.transactions.show',compact('subscribeTransaction'));
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
    public function update(Request $request, SubscribeTransaction $subscribeTransaction)
    {
        DB::transaction(function () use($subscribeTransaction) {
            $subscribeTransaction->update(
                [
                    'is_paid' =>true,
                    'subscription_start_date' => Carbon::now()
                ]);

    });
    return redirect()->route('admin.subscribe_transactions.show', $subscribeTransaction);
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
