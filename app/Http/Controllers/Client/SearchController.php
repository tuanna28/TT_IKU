<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }
    public function searchKey(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = Category::get();
        $search = Book::where('title_book', 'like', '%'.$keyword.'%')
                ->get();
    
    return view("client.search.key", compact('search'),['category' => $category]);
    }
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