<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Banner;
use App\Brand;
use App\Category;
use App\Contacts;
use App\Product;
use App\Setting;
use App\Vendor;
use App\User;
use Hash;
use Session;
use Auth;

class ShopController extends GeneralController
{

    public function __contruct()
    {
        parent::__contruct();
    }

    
    public function index()
    {   
        $banner = Banner::all();
        $products = Product::where(['is_active'=>1])
                                ->orderBy('id','desc')
                                ->orderBy('position','asc')
                                ->get();
        $products = Product::latest()->paginate(8);
        
        return view('frontend.main',[
        
        'banner'=> $banner,
        'products'=>$products
            
        ] );
    }

    /**
     * Show the form for creating
     *  a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Trang danh mục
     public function Category($type)
     {
        
        $category =Category::all();
       
        $Loaisanpham = Product::where('category_id',$type)->get();
        
        return view('frontend.Loaisanpham',[
            'category' => $category,
            'Loaisanpham' => $Loaisanpham,
               
            
        ]);
        
        
     }
     

     public function Chitietsanpham( Request $request)
     {
         $chitietsanpham = Product::where('id',$request->id)->first();
         $Laptop = Product::where('category_id',4)->get();
         $dongho = Product::where('category_id',6)->get();

         return view('frontend.chitietsanpham',[
             'chitietsanpham'=>$chitietsanpham,
             'Laptop'=>$Laptop,
             'dongho'=>$dongho
         ]);
     }
     public function Articles()
     {
         $article = Article::all();

         return view('frontend.Article');
     }

     //trang liên hệ
    public function Contact()
    {
        return view('frontend.contact');
    }
    public function postContact(Request $request )
    {
        $request->validate([
       
            'email' => 'required|email'
        ], [
            
            'email.required' => 'Bạn cần nhập vào địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ'
        ]);

        $contact = new Contacts();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();
        return redirect()->route('shop.contact')->with('msg', 'Bạn đã gửi tin nhắn thành công');
    }

    public function Seach( Request $request)
    {
        $seach_product = Product::where('name','like','%'.$request->key.'%')
                                ->orwhere('price',$request->key)
                                ->get();
                return view(    'frontend.Seach',['seach_product' =>$seach_product]);
    }

    public function Register() 
    {
        return view('frontend.register');
    }
    public function postRegister( Request $request)
    {
        $this->validate($request,
            [
                'email'=> 'required|email|unique:users,email',
                'password'=> 'required|min:6|max:20',
                // 're_password'=> 'required|same:password',

            ],
            [
                'email.required'=>'vui lòng nhập email',
                'email.email'=>'không đúng dạng email',
                'email.unique'=>'emai đã có người dùng',
                'password.required'=>'password chưa nhập',
                // 're_password.same'=>'mật khẩu không giống nhau',
            ]);

            $avatar = '';
            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $filename = $file->getclientOriginalName();
                $path_upload = 'upload/user/';
                $avatar = $path_upload.$filename;

            }
            $users = new User();
            // $users->name = $request->fullname;
            // $users->email = $request->email;
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            // $users->password = $request->input('password');
            $users->password =  Hash::make($request->password);
            $users ->avatar = $avatar;
            $users->save();
            return redirect()->route('shop.register')->with('thanhcong','Tạo tài khoản thành công');
            
            
    }
    public function Login() {
        return view('frontend.Login');
    }
    public function postLogin( Request $request) {
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'email.email' =>'email chưa đúng định dạng',
            'password.required'=>'Bạn chưa nhập password',
            'password.min' =>'mật khẩu ít nhất 6 ký tự',
            'password.max'=>'mật khẩu nhiều nhất 20 ký tự'
        ]);
        $credentials = array('email'=>$request->input('email'), 'password'=>$request->input('password'));
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.user.index')->with(['flag'=>'sucsess','massage'=>'đăng nhập thành công']);
        }else{
            return redirect()->route('admin.user.index')->with(['flag'=>'danger','massage'=>'đăng nhập thất bại']);
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('shop.Login'); 
    }

    public function OrderProduct()
    {
        return view('frontend.Order');
    }
    
}
