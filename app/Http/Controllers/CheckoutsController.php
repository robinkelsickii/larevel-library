<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheckoutsResource;
use App\Models\Checkout;
use DateTime;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CheckoutsResource::collection(Checkout::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkout = Checkout::create([
            'user_id' => (string) $request->user_id, // from request
            'book_id' => (string) $request->book_id, // from request
            'checked_out' => new DateTime(), // new timestamp
            'checked_in' => new DateTime()// null

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return new CheckoutsResource($checkout);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->update([
            'user_id'=>$request->input('user_id'),
            'book_id'=>$request->input('book_id'),
            'checked_out'=>$request->input('checked_out'),
            'checked_in'=>$request->input('checked_in')
        ]);

        return new CheckoutsResource($checkout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
