@extends('frontend.layout.master')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>ContactToUs</h2>
					<div class="space20">&nbsp;</div>
					<p>Bạn vui lòng nhập thông tin,chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
					<div class="space20">&nbsp;</div>

					
					<form action="{{route('shop.postContact')}}" method="post" class="contact-form" enctype="multipart/form-data">
					@csrf
						
						<div class="form-block">
							<input  name="name" type="text" placeholder="Enter Name (required)">
							@if ($errors->has('name'))
								<div class="error">
									{{ $errors->first('name') }}
								</div>
							@endif
						</div>
						<div class="form-block">
							<input name="phone" type="text" placeholder="Enter phone (required)">
							
						</div>
						
						<div class="form-block">
							<input name="email" type="email" placeholder="Enter Email (required)">	
							@if ($errors->has('email'))
								<div class="error">
									{{ $errors->first('email') }}
								</div>
							@endif
						</div>
						<div class="form-block">
							<textarea  name="content" placeholder="Your Message"></textarea>
							@if ($errors->has('content'))
								<div class="error">
									{{ $errors->first('content') }}
								</div>
							@endif
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Contact Information</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Address</h6>
					<p>
						Số 121 ngõ 255 Lĩnh Nam,Vĩnh Hưng<br>
						Hoàng Mai District <br>
						Hà Nội City
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Business Enquiries</h6>
					<p>
						Doloremque laudantium, totam rem aperiam, <br>
						inventore veritatio beatae. <br>
						<a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Employment</h6>
					<p>
						We’re always looking for talented persons to <br>
						join our team. <br>
						<a href="hr@betadesign.com">hr@betadesign.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection