<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Image_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show(){
        $datas = Book::orderBy('id','DESC')->paginate(10);
        $cate = Category::all();
        return view("client.books.books",['datas'=>$datas],compact("cate"));
    }
    public function detailBook(Request $request){
        $data = Book::find($request->id);
        $image = DB::table('image_details')->select('*')->where('id_book', $request->id)->get();
        $same = DB::table('books')->select('*')->where('id_cate',   $data->id_cate)->get();

        return view("client.books.detail",["book"=>$data,"image"=>$image,"same"=>$same]);
    }
    public function viewcategory($slug) {
        
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::all();
            $cate =Category::where('slug',$slug)->first();
            $products = Book::where('id_cate', $cate->id)->get();
            return view('client.books.filter', compact('cate','products','category'));
        }
        // else{
        //     return redirect('/')->with('status',"Slug doesnot exists");
        // }
        
    }
}