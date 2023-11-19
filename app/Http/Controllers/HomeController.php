<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;    
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       
        $datas = Book::all();
        return view('index', ['datas'=>$datas]);
    }
    public function search()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $cates = Category::all();
            $books = Book::all();
            $books2 = Book::orderBy('created_at', 'DESC')->where('title_book', 'like', '%' . $search . '%')->orWhere('author', 'like', '%' . $search . '%')->paginate();
            return view('client.books.filter', compact('cates', 'books', 'books2'));
        } else {
            return redirect()->back();
        }
    }
    public function author($key)
    {
        $cates = Category::all();
        $books = Book::all();
        $books2 = Book::orderBy('created_at', 'DESC')->where('author', '=', $key)->paginate();
        return view('client.books.filter', compact('cates', 'books', 'books2'));
    }
    public function category($id)
    {
        $cates = Category::all();
        $books = Book::all();
        $books2 = Book::orderBy('created_at', 'DESC')->where('id_cate', '=', $id)->paginate();
        return view('client.books.filter', compact('cates', 'books', 'books2'));
    }
}
