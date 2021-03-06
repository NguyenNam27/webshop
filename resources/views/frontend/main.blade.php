@extends('frontend.layout.master')

@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
							<ul>
							@foreach($banner as $sl)
										<!-- THE FIRST SLIDE -->
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide" 
											style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
									<div class="slotholder" 
											style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" 
											data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" 
											data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" 
											data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" 
											data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
										<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" 
											data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" 
											src="{{asset($sl->image)}}" data-src="{{asset($sl->image)}}" 
											style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset($sl->image)}}');
											 background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
									</div>

										</li>
									@endforeach
							</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4> Sản Phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row"  >
								@foreach($products as $new )
								<div class="col-sm-3">
									<div class="single-item">
									@if($new->sale!=0)
											<div class=" ribbon-wrapper">
											<div class=" ribbon sale">Sales</div>
											</div>
										@endif
										<div class="single-item-header">
											<a href="{{route('shop.chitietsanpham',$new->id)}}"><img src="{{$new->image}}" alt="" height="250px"  ></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" >{{$new->name}}</p>
											<p class="single-item-price" style = "font-size:17px">
											
												<span class = "flash-del">{{number_format($new->price)}} VNĐ </span>
												<span class="flash-sale">{{number_format($new->sale)}} VNĐ</span>
											
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('cart.addcart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('shop.chitietsanpham',$new->id)}}"> Chi Tiết <i class="fa fa-chevron-right"></i></a>
											
										</div>
									</div>
									
								</div>
								@endforeach 
								
							</div>
							<div class = "row">{{$products->links()}}</div>
							
							
						</div> 
					
					</div>
				</div> 


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
@endsection