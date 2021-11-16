<?php

namespace App\Http\Controllers;

use App\Http\Resources\BooksResource;
use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
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
        $faker = \Faker\Factory::create(1);
        $book = Book::create([
           'title' => (string) $this->faker->sentence($nbWords = 5),
            'ISBN' => $this->faker->isbn13,
            'description' => $this->faker->sentence,
            'publication_year' => (string) $this->faker->year,
            'price' => $this->faker->randomNumber($nbDigits = 2),
            'in_stock' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'checked_out' => $this->faker->date,
            'checked_in' => date(null)

        ]);

        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
         $book->update([
            'title' => $request->input('title'),
            'ISBN' => $request->input('ISBN'),
            'description' => $request->input('description'),
            'publication_year' => $request->input('publication_year'),
            'price' => $request->input('price'),
            'in_stock' => $request->input('in_stock'),
            'checked_out' => $this->faker->date,
            'checked_in' => date(null)
        ]);

        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
         $book->delete();
        return response(null, 204);
    }
}
