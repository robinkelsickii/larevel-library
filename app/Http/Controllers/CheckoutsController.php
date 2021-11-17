<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Resources\CheckoutsResource;

class CheckoutsController extends Controller
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
         'user_id' => (string)$this->user_id,
         'book_id' => (string)$this->book_id,
         'user_name'=> $this->user_name,
         'book_title' => $this->book_title,
         'checked_out' => $this->checked_out
        ]);

        return new CheckoutsResource($checkout);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return new CheckoutsResource($checkout);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkouts $checkouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkouts $checkout)
    {
        $checkout = Checkout::create([
         'user_id' => (string)$this->user_id,
         'book_id' => (string)$this->book_id,
         'user_name'=> $this->user_name,
         'book_title' => $this->book_title,
         'checked_out' => $this->checked_out
        ]);

        return new CheckoutsResource($checkout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkouts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkouts $checkout)
    {
         $checkout->delete();
        return response(null, 204);
    }
}
