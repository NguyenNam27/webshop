@extends('frontend.layout.master')
@section('content')
<div>
    <div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$chitietsanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('shop.index')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div	 class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{$chitietsanpham->image}}" alt="" >
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$chitietsanpham->name}}</p>
								<p class="single-item-price">
								<span class = "flash-del">{{number_format($chitietsanpham->price)}} VNĐ </span>
								<span class="flash-sale">{{number_format($chitietsanpham->sale)}} VNĐ</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							
							

							<p>Options:</p>
							<div class="single-item-options">
								
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								
								<a class="add-to-cart" href="{{route('cart.addcart',$chitietsanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Nổi Bật</h3>
						@foreach($dongho as $dong)
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset($dong->image)}}" alt=""></a>
									<div class="media-body">
									{{$dong->name}}
								<span class = "flash-del">{{number_format($dong->price)}} VNĐ </span>
								<span class="flash-sale">{{number_format($dong->sale)}} VNĐ</span>
									</div>
								</div>
								
							</div>
						</div>
						@endforeach
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						@foreach($Laptop as $Lap)
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="{{asset($Lap->image)}}" alt=""></a>
									<div class="media-body">
										{{$Lap->name}}
										<span class = "flash-del">{{number_format($Lap->price)}} VNĐ </span>
										<span class="flash-sale">{{number_format($Lap->sale)}} VNĐ</span>
									</div>
								</div>
								
							</div>
						</div>
						@endforeach
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
@endsection