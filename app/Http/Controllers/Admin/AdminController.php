<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Rating;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('title')->get(['title', '_id']);
        $data['title'] = 'Home page';
        $data['description'] = 'Description page';
        return view('movies.admin.index', ['data' => collect($data), 'movies' => $movies]);
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::with('rating')->find($id);
        $data['title'] = 'Stats';
        $data['description'] = 'Description page';
        $das = collect($movie);
       
        $rated = $das->get('rating');
     

        $rating = 0;
        $nrate = 0;
        foreach ($rated as $value) {
            $rating = $rating +   $value['rating'];
            $nrate++;
          
        }
      $averageRatin =  $rating/$nrate;

        return view('movies.admin.show',['data' => $data, 'movie' => $movie, 'rate' => $averageRatin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
