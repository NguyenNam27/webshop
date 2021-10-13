@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
           Quản Lý Banner <a href="{{route('admin.banner.create')}}" class="btn btn-primary"> Thêm Banner </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            
            <li class="active">Quản lý Banner</li>
        </ol>
    </section>
    <section class="content">
    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Danh Sách Banner</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">STT</th>
                  <th> Image </th>
                  <th> Title </th>
                  <th>Slug</th>
                  <th>Ngày cấp</th>
                  <th> Trạng thái </th>
                  <th> Chức năng</th>
                </tr>

                @foreach($banner as $key => $row)
                    <tr >
                        <td>{{$key +1 }}</td>
                        <td> <img src="{{ asset($row->image) }}" height="50"></td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->slug}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{ $row->is_active == 1 ? 'Show' : 'Hide' }}</td>
                        <td class="text-center">
                            <a href="{{route('admin.banner.edit',['id'=>$row->id])}}" class="btn btn-flat bg-purple"><i class="fa fa-pencil"></i></a>
                            <button data-id="{{$row->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                         </td>
                    
                    </tr>


                @endforeach
             </table>

            </div>
            <div class="box-footer clearfix">
                        {{ $banner->links() }}
                    </div>
            
            </div>
    </div>
        
       
    </section>
@endsection

@section('category_js')

<script type="text/javascript">
        $(document).ready(function() {
            // Thiết lập csrf => chổng giả mạo
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('.btn-delete').on('click',function () {

                let id = $(this).data('id');

                let result = confirm("Bạn có chắc chắn muốn xóa ?");

                if (result) { // neu nhấn == ok , sẽ send request ajax

                    $.ajax({
                        url: '/admin/banner/'+id, // http://webthucpham.local:8888/user/8
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {
                            // dữ liệu truyền sang nếu có
                            name : 'dung'
                        },
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {
                            //  PHP : $user->name
                            //  JS: res.name

                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                $('.item-'+id).remove();
                            }
                            window.location.href = '/admin/banner';
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e);
                        }
                    });
                }

            });

           
        });
    </script>

@endsection