@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh Sửa Banner <a href="{{route('admin.banner.index')}}" class="btn btn-primary"> Danh Sách</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            
            <li class="active">Sửa Banner</li>
        </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Sửa Thông Tin Banner </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="post" action="{{route('admin.banner.update',['id'=>$banner->id])}} " enctype="multipart/form-data">
        @csrf
        
        @method('PUT')
              <div class="box-body"> 

                    <div class="col-md-6">

                        <!-- <div class="form-group" name="parent_id" id ="parent_id"> 
                            <label>Loại Danh Mục</label>
                            <select class="form-control">
                              <option>0</option>
                              <option>1</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              
                            </select>
                          </div> -->

                          <!-- <div class="form-group" name="text" id ="text"> 
                            <label> Loại Danh Mục </label>
                            <select class="form-control">
                              <option> Menu </option>
                              <option>Bài Viết</option>
                              <option>Sản Phẩm</option>
                              
                            </select>
                          </div> -->

                        <div class="form-group">
                              <label for="exampleInputEmail1">Sửa Tên Banner</label>
                              <input required type="text" class="form-control" id="title" name="title" placeholder="Nhập tên danh mục" value="{{$banner->title}}">
                            @if($errors->has('title'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('title')}}
                              </label>
                            @endif
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1">Slug </label>
                              <input required type="text" class="form-control" id="slug" name="slug" placeholder="Nhập tên slug">
                              @if($errors->has('slug'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('slug')}}
                              </label>
                            @endif  
                        </div>

                        <div class="form-group">
                              <label for="exampleInputEmail1">Ngày Thêm </label>
                              <input required type="date" class="form-control" id="created_at" name="created_at" placeholder="Nhập ngày thêm" value="{{$banner->created_at}}">
                        </div>

                        <div class="form-group">
                                  <label for="exampleInputFile">Avatar</label>
                                  <input type="file" id="image" name="image"  >
                                  <img src="{{ asset($banner->image) }}" alt="" width="100" style="margin-top: 10px;">

                                  @if($errors->has('image'))
                              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                                    <i class="fa fa-info"></i>{{$errors->first('image')}}
                              </label>
                            @endif  

                        </div>
                    
                        <div class="checkbox">
                                  <label>
                                      <input type="checkbox"  name="is_active" id="is_active" > Hiển thị
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
$('#title').keyup(function(event) {
  var title, slug;
 
    //Lấy text từ thẻ input title 
   title = document.getElementById("title").value;
 
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

