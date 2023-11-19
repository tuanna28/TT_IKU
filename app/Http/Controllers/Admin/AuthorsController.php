<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AuthorsController extends Controller
{
    //
    public function index()
    {
       $authors = Author::all();
       return view('admin.authors.list',compact('authors'));
    }
    public function add(Request $request){

        if($request->isMethod('post')) {

            $authors = new Author();
            $authors->name_author = $request->name_author;
            $authors->info = $request->info;

            if ($request->hasFile('author_image')) {
                $file = $request->file('author_image');
                $extention = $file->getClientOriginalName();
                $filename = $extention;
                $file->move('storage/hinh/', $filename);
                $authors->author_image = $filename;
            }
            $authors->save();
            //tạo thông báo

            if($authors->save()){
                session::flash('success','Thêm loại phòng thành công');
                return redirect()->route('list.authors');


            }else {
                session::flash('error', 'Lỗi thêm loại phòng');
            }

        }

        return view('admin.authors.add');


    }
    public function edit(Request $request , string $id)
    {
        {
            $authors = Author::find($id);
            if ($request->isMethod('POST')) {
                $authors->name_author = $request->name_author;
                $authors->info = $request->info;
                if ($request->hasFile('author_image')) {
                    $image_new = 'storage/hinh/'.$authors->author_image;
                    if(File::exists($image_new)){
                        File::delete($image_new);

                    }
                    $file =  $request->file('author_image');
                    $extention = $file->getClientOriginalName();
                    $filename = $extention;
                    $file->move('storage/hinh',$filename);
                    $authors->author_image = $filename;

                }
                $authors->update();
                if ($authors->update()) {
                    Session::flash('success', 'Sửa thành công');
                    return redirect()->route('list.authors');
                } else {
                    Session::flash('error', 'Sửa lỗi');
                }

            }
            return view('admin.authors.edit', compact('authors'));
        }
    }

    public function delete(string $id){
        $authors = Author::find($id)->delete();
        if($authors){
            Session::flash('success','Xóa thành công');
            return redirect()->route('list.authors');
        }
        else{
            Session::flash('error','Xóa lỗi');
        }
    }
}
