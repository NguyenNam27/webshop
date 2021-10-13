@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
            Quản Lý Sản Phẩm <a href="{{ route('admin.product.create') }}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm Sản Phẩm</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Quản Lý Sản Phẩm</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh Sách Sản Phẩm </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th> Category</th>
                                <th>Slug</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Sale</th>
                                <th>Ngày Cấp</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>

                            </tr>

                            @foreach($product as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key +1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" width="50" height="75" /></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ @$item->category->name }}</td>
                                      
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->sale }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->is_active == 1 ? 'Show' : 'Hide' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.edit',['id'=> $item -> id])}}" class="btn btn-flat bg-purple"><i class="fa fa-pencil"></i></a>
                                        <button data-id="{{$item->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $product->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

@section('my_js')
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
                        url: '/admin/product/'+id, // http://webthucpham.local:8888/user/8
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
                            window.location.href = '/admin/product/';
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e);
                        }
                    });
                }

            });

            /*$( ".btn-delete" ).click(function() {
                alert( "Handler for .click() called." );
            });*/

        });
    </script>
@endsection


