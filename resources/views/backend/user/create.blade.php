@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
           Quản lý User <a href="{{route('admin.user.create')}}" class="btn btn-primary"> Thêm </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Thêm Thông Tin User </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{Route('admin.user.store')}}" method="post" enctype="multipart/form-data">
              @csrf 
              <div class="box-body"> 

              <div class="col-md-6">
              <div class="form-group" name="role_id" id ="role_id"> 
                            <label> Chọn Quyền</label>
                            <select class="form-control">
                              <option>ADMIN</option>
                              <option>MANAGER</option>
                              <option>MEMBER</option>
                              
                            </select>
                          </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ Tên</label>
                    <input  type="Text" class="form-control" id="name" name="name" placeholder="Enter Phone">
                    @if($errors->has('name'))
                        <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                              <i class="fa fa-info"></i>{{$errors->first('name')}}
                        </label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input  type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    @if($errors->has('email'))
                        <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                              <i class="fa fa-info"></i>{{$errors->first('email')}}
                        </label>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input  type="password" class="form-control" id="password" name="password" placeholder="Enter Phone">
                    @if($errors->has('password'))
                        <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px" >
                              <i class="fa fa-info"></i>{{$errors->first('password')}}
                        </label>
                    @endif
                </div>

                
                <div class="form-group">
                    <label for="exampleInputFile">Avatar</label>
                    <input type="file" id="avatar" name="avatar" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" name="is_active"> Check me out
                  </label>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </div>

       
              </div>
         
            </form>
          </div>
        
        </div>
        
    </section>
@endsection