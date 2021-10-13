@extends('frontend.layout.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
    </div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($categories as $cate)
								
								<li><a href="{{route('shop.category',$cate->id)}}">{{$cate->name}}</a></li>
								
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm </h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($Loaisanpham)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($Loaisanpham as $Loai_sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('shop.chitietsanpham',$Loai_sp->id)}}"><img src="{{$Loai_sp->image}}" alt=""  height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$Loai_sp->name}}</p>
											<p class="single-item-price" style = "font-size:17px">
											<span class = "flash-del">{{number_format($Loai_sp->price)}} VNĐ </span>
												<span class="flash-sale">{{number_format($Loai_sp->sale)}} VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
</div>
@endsection