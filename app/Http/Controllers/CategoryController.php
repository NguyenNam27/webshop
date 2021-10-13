<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $category = DB::table('categories')->select('*');
        $category = $category->get();
        $category = Category::latest()->paginate(5);
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'slug' =>'required',
            'created_at'=> 'required',
            'image' => 'required'
        ]);
        
        $name = $request->input('name');
        $slug = $request->input('slug');
     
        $is_active = 0; // default
        if ($request->has('is_active')) {
            $is_active = (int) $request->input('is_active');
        }
    
        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = $file->getClientOriginalName(); // lấy tên gốc của ảnh
            // duong dan upload
            $path_upload = 'upload/user/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $cat = new Category();
            $cat ->name = $name;
            $cat->slug=$slug;
            $cat->image = $path_avatar;
  
            //lưu
            $cat->save();
                // chuyển hướng điều trang
            return redirect()->route('admin.category.index');
        }
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
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
        $name = $request->input('name');
        $slug = $request->input('slug');

        $is_active = 0; // default
        if ($request->has('is_active')) {
            $is_active = (int) $request->input('is_active');
        }

        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = $file->getClientOriginalName(); // lấy tên gốc của ảnh
            // duong dan upload
            $path_upload = 'upload/category/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $cat = Category::find($id);
            $cat ->name = $name;
            $cat->slug  = $slug;
            $cat->image = $path_avatar;
            //lưu
            $cat->save();
                // chuyển hướng điều trang
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Category::destroy($id);

        if ($isDelete) { // xóa thành công
            return response()->json(['isSuccess' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['isSuccess' => 0, 'message'=>'Thất bại']);
        }
    }
}
