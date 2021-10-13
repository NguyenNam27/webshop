@extends('frontend.layout.master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('shop.postRegister')}}" method="post" class="beta-form-checkout" enctype="multipart/form-data">
			@csrf
			
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>
						@if(count($errors) > 0)
						<div class=" alert alert-danger"> 
						@foreach($errors->all() as $err)
						{{$err}}
						@endforeach
						</div>
						@endif
						
						
						@if(Session::has('thanhcong'))
								<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
						@endif
						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="name" required>
						</div>

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>
						<!-- <div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re_password" required>
						</div> -->

						<div class="form-block">
						<label for="Avatar">Avatar</label>
						<input type="file" id="avatar" name="avatar" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>

						

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> 
	</div> 



@endsection