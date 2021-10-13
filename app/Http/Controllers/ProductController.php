<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->select('*');
        $product = $product ->get();
        $product = Product::latest()->paginate(10);
        return view('backend.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('backend.product.create',compact('category'));
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
            'image' => 'required',
            'stock'=>'required',
            'price'=>'required',
            'sale'=>'required',

        ]);

        $name = $request->input('name');
        $category = $request->input('category_id');
        $slug = $request->input('slug');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $sale = $request->input('sale');

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
            $path_upload = 'upload/product/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $pro = new Product();
            $pro ->name = $name;
            $pro->category_id=$category;
            $pro->slug=$slug;
            $pro->image = $path_avatar;
            $pro->stock = $stock;
            $pro->price = $price;
            $pro->sale = $sale;


            //lưu
            $pro->save();
                // chuyển hướng điều trang
            return redirect()->route('admin.product.index');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('backend.product.edit', compact('product','category'));
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

        $request->validate([
            'name' =>'required',
            'slug' =>'required',
            'created_at'=> 'required',
            'image' => 'required',
            'stock'=>'required',
            'price'=>'required',
            'sale'=>'required',

        ]);
        // dd($request->all());
        $name = $request->input('name');
        $category = $request->input('category_id');
        $slug = $request->input('slug');
        $stock = $request->input('stock');
        $price = $request->input('price');
        $sale = $request->input('sale');

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
            $path_upload = 'upload/product/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $pro = Product::find($id);


            $pro->name = $name;
            $pro->category_id=$category;
            $pro->slug=$slug;
            $pro->image = $path_avatar;
            $pro->stock = $stock;
            $pro->price = $price;
            $pro->sale = $sale;


            //lưu
            $pro->save();
            // chuyển hướng điều trang
            return redirect()->route('admin.product.index');
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
        $isDelete = Product ::destroy($id);

        if ($isDelete) { // xóa thành công
            return response()->json(['isSuccess' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['isSuccess' => 0, 'message'=>'Thất bại']);
        }
    }
}
