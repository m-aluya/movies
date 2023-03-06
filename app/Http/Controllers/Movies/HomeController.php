<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Rating;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::orderBy('title')->get(['title', '_id']);
        $data['title'] = 'Home page';
        $data['description'] = 'Description page';
        return view('movies.home', ['data' => collect($data), 'movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add a new movie';
        $data['description'] = 'Add a new movie';
        return view('movies.add', ['data' => collect($data)]);
    }



    public function rate(string $id)
    {
        $movie = Movie::find($id);


        $data['title'] = 'Rate a movie';
        $data['description'] = 'Rate a movie';
        return view('movies.rate', ['data' => collect($data), 'movie' => $movie]);
    }


    public function rated(Request $request)
    {
        $data = $this->validate($request, [
            'id' => 'required',
            'rating' => 'required'
        ]);

        $rate = new Rating();
        $rate->movie_id = $data['id'];
        $rate->comment = $request->comment ?? null;
        $rate->rating =  floatval($data['rating']);
        $rate->save();

        return back()->with('success', 'Rating saved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data = $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
            'kind' => 'required',
            'country' => 'required'
        ]);
        //dd($data);
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->year = $data['year'];
        $movie->kind = $data['kind'];
        $movie->country = $data['country'];
        $movie->save();
        return back()->with('success', 'You have successfully added a new movie to the database.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $movie = Movie::with('rating')->find($id);

        return response()->json($movie);
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
        $movie = Movie::find($id);
        $ratings = Rating::where('movie_id', $id)->get();

        // Delete the movie and its ratings
        $movie->delete();
        $ratings->each(function ($rating) {
            $rating->delete();
        });

        return back()->with('success', 'The selected movie has been deleted');
    }
}
