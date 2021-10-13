@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
           Chỉnh sửa thông tin sản phẩm <a href="{{route('admin.product.index')}}" class="btn btn-primary"> Danh Sách</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            
            <li class="active">Quản lý danh mục</li>
        </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">  Thông Tin Sản Phẩm  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="post" action="{{route('admin.product.update',['id'=>$product->id])}} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
              <div class="box-body"> 

                    <div class="col-md-6">

                    <div class="form-group" name="category_id" id ="category_id"> 
                            <label>Thay đổi Danh mục sản phẩm</label>
                            <select class="form-control" name="category_id"  >
                                <option value="select"> -- chọn Danh Mục --</option>
                                   @foreach($category as $cat)
                                      <option value="{{ $cat->id }}" {{ ($product->category_id == $cat->id) ? 'selected' : '' }} >{{ $cat->name }}</option>
                                    @endforeach
                             </select>
                          </div>

                          

                        <div class="form-group">
                              <label for="exampleInputEmail1">Tên sản phẩm</label>
                              <input required type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" value="{{$product->name}}">
                            @if($errors->has('name'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('name')}}
                              </label>
                            @endif
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1">Slug </label>
                              <input required type="text" class="form-control" id="slug" name="slug" placeholder="Nhập tên slug" value="{{$product->slug}}">
                              @if($errors->has('slug'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('slug')}}
                              </label>
                            @endif  
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1">Số lượng trong kho </label>
                              <input required type="text" class="form-control" id="stock" name="stock" placeholder="Nhập số lượng" value="{{$product->stock}}">
                            @if($errors->has('stock'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('stock')}}
                              </label>
                            @endif
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1"> Giá Gốc(vnđ) </label>
                              <input required type="number" class="form-control" id="price" name="price" placeholder="Nhập tên giá gốc" value="{{$product->price}}">
                            @if($errors->has('price'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('price')}}
                              </label>
                            @endif
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1"> Giá Khuyến mãi(vnđ) </label>
                              <input required type="number" class="form-control" id="sale" name="sale" placeholder="Nhập giá khuyến mãi" value="{{$product->sale}}">
                            @if($errors->has('sale'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('sale')}}
                              </label>
                            @endif
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1">Ngày Thêm</label>
                              <input required type="date" class="form-control" id="created_at" name="created_at" placeholder="Nhập ngày thêm" value="{{$product->created_at}}">
                        </div>

                        <div class="form-group">
                                  <label for="exampleInputFile">Avatar Sản Phẩm Mới</label>
                                  <input type="file" id="image" name="image" >
                                  <img src="{{ asset($product->image) }}" alt="" width="100" style="margin-top: 10px;">
                                  

                                  @if($errors->has('image'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('image')}}
                              </label>
                            @endif  

                        </div>

                        <div class="form-group">
                                  <label for="exampleInputEmail1">Vị trí hiển thị </label>
                                  <input required type="number" class="form-control" id="position" name="position" min="1">
                        </div>
                                            
                        <div class="checkbox">
                                  <label>
                                      <input type="checkbox"  name="is_active" id="is_active" > Hiển thị
                                  </label>
                       </div>
               
                                            
                        <div class="checkbox">
                                  <label>
                                      <input {{ ($product->is_active == 1) ? 'checked' : '' }} type="checkbox"  name="is_active" id="is_active" > Kích Hoạt
                                  </label>
                       </div>
               

                    </div>

                    
              </div>
              

               <div class="box-footer">
                  <button type="submit" class="btn btn-primary" > Lưu  </button>
              </div>
        </form>
        </div>

      </div>
       
    </section>
@endsection

@section('js')
<script>  
$('#name').keyup(function(event) {
  var title, slug;
 
    //Lấy text từ thẻ input title 
   title = document.getElementById("name").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    $('#slug').val(slug);
});
      

</script>
@endsection


