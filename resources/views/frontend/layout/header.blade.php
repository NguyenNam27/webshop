<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 255 Lĩnh Nam - Hoàng Mai -  Hà Nội</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">

						<li><a href="{{route('shop.register')}}">Đăng kí</a></li>

						<li><a href="{{route('shop.Login')}}">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>

					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('shop.timkiem')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>



					@include('frontend.cart.index')

				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('shop.index')}}">Trang chủ</a></li>
						<li><a href="{{route('shop.index')}}">Loại sản phẩm</a>
							<ul class="sub-menu">
							@foreach($categories as $cate)

								<li><a href="{{route('shop.category',$cate->id)}}">{{$cate->name}}</a></li>

							@endforeach
							</ul>
						</li>
						<li><a href="{{route('shop.article')}}">Giới thiệu</a></li>
						<li><a href="{{route('shop.contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
