<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;

use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = DB::table('banners')->select('*');
        $banner = $banner->get();
        $banner = Banner::latest()->paginate(5);
        return view('backend.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.banner.create');
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
            'title' =>'required',
            'slug' =>'required',
            'created_at'=> 'required',
            'image' => 'required'
        ]);

        $title = $request->input('title');
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
            $path_upload = 'upload/banner/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $Ban = new Banner();
            $Ban ->title = $title;
            $Ban->slug=$slug;
            $Ban->image = $path_avatar;

            
            //lưu
            $Ban->save();
            // chuyển hướng điều trang
            return redirect()->route('admin.banner.index');
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
        $banner = Banner::find($id);
        return view('backend.banner.edit', compact('banner'));
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
        $name = $request->input('title');
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
            $path_upload = 'upload/banner/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $Ban = Banner::find($id);
            $Ban ->title = $name;
            $Ban->slug  = $slug;
            $Ban->image = $path_avatar;
            //lưu
            $Ban->save();
            // chuyển hướng điều trang
            return redirect()->route('admin.banner.index');
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
        $isDelete = Banner::destroy($id);

        if ($isDelete) { // xóa thành công
            return response()->json(['isSuccess' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['isSuccess' => 0, 'message'=>'Thất bại']);
        }
    }
}
