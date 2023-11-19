<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view("admin.category.list", compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "admin.category.create"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        
        $cate_Name = $request->input('cate_Name');
        $slug = $request->input('slug');
        $category = new Category;
        $category->cate_Name = $cate_Name;
        $category->slug = $slug;
        $category->save();
        if ($category->save()) {
            Session::flash('success', 'Thâm thành công');
            return redirect()->route('category.index');
        } else {
            Session::flash('error', 'Thêm Lỗi');
        }
    }
    public static function listCategories()
    {
        return $categories = Category::orderBy('id', 'asc')

            ->select('id', 'cate_name')
            ->get();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public static function getSelect($id)
    {
        return CategoryController::selectCategories($id, CategoryController::listCategories());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(
            "admin.category.edit",
            compact('category')
        );
    }
    //  HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    public static function selectCategories($id, $categories, $char = '|----', $tableStr = '')
    {

        foreach ($categories as $key => $item) {

            // Nếu là chuyên mục con thì hiển thị
            $tableStr .= "<option value='$item->id'>";
            $tableStr .= $char . $item->category_name;
            $tableStr .= '</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
            // echo $item->id;
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            $tableStr = CategoryController::selectCategories($id, $categories, $item->id, $char . '|------', $tableStr);
        }

        return $tableStr;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $cate_Name = $request->input('cate_Name');
        $slug = $request->input('slug');
        $category->cate_Name = $cate_Name;
        $category->slug = $slug;
        $category->save();
        return redirect()->route('category.index')
            ->with('success', 'Category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
