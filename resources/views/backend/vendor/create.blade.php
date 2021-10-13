@extends('backend.layout.main')

@section('content')
    <section class="content-header">
        <h1>
           QL Nhà Cung Cấp
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
              <h3 class="box-title"> Thêm Thông Tin Nhà Cung Cấp </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body"> 

              <div class="col-md-6">
              <div class="form-group">
                    <label for="exampleInputEmail1">TNCC</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter TNCC">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input  type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input required type="Text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                </div>

                
                <div class="form-group">
                    <label for="exampleInputFile">Avatar</label>
                    <input type="file" id="image" name="image" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter Website">
                </div>
                
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter ..."></textarea>
                </div>
                              
                <div class="checkbox">
                    <label>
                        <input type="checkbox"  name="is_active" id="is_active" > Hiển thị
                  </label>
                </div>
              </div>



               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          

          

         

        </div>
        <!--/.col (left) -->
        
      
      <!-- /.row -->
    </section>
@endsection