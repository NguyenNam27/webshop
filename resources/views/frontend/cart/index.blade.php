<div class="beta-comp">
					@if (Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}
							@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							<h2 class="text-center">Thông Tin Giỏ Hàng</h2>
							
							<table id="cart" class="table table-hover table-condensed"> 
								<thead> 
								<tr> 
									<th style="width:40%">Tên sản phẩm</th> 
									<th style="width:10%">Giá</th> 
									<th style="width:7%">Số lượng</th> 
									<th style="width:6%">Màu Sắc</th>
									<th style="width:22%" class="text-center">Thành tiền</th> 
									<th style="width:10%"> Chức Năng </th> 
								</tr> 
								</thead> 
								<tbody>
									<tr> 
									@foreach($product_cart as $product)
									<td data-th="Product"> 
									<div class="row"> 
									<div class="col-sm-2 hidden-xs"><img src="{{asset($product['item']->image)}}" alt="Sản phẩm 1" class="img-responsive" width="100">
									</div> 
									<div class="col-sm-10"> 
										<h4 class="nomargin">{{$product['item']->name}}</h4> 
										 
									</div> 
									</div> 
									</td> 
									<td data-th="Price">{{number_format($product['item']->sale)}} đ </td> 
									<!-- <td data-th="Quantity">
									<div class="input-group mb-3">
                                            <input name="qty" class="quantity form-control input-number d-block item-qty" value="{{$product['qty']}}" >
                                        </div>
										</td> -->

									<td class="quantity">
                                        <div class="input-group mb-3">
                                            <input name="qty" class="quantity form-control input-number d-block item-qty text-center" value="{{$product['qty']}}" >
                                        </div>
                                        <a data-id="#" href="javascript:void(0)" class="update-qty">Cập nhật</a>
                                    </td>
									<td>
									<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									
									</select>
									</td>
									
									 
									<td data-th="Subtotal" class="text-center">{{number_format($product['qty']*($product['item']->sale))}} đ </td> 
									<td class="actions" data-th="">
									<button class="btn btn-info btn-sm" ><i class="fa fa-edit"></i>
									</button> 
									<button class="btn btn-danger btn-sm"> <a href="{{route('delete.cart',$product['item']->id)}}"><i class="fa fa-trash-o"></i></a>
									</button>
									</td> 
									</tr> 
									@endforeach
								</tbody>
								<tfoot> 
								
								
							
								<tr> 
									
									<td>
										<a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
										<a href="{{route('destroy.cart')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Huỷ Đơn Hàng</a>
									</td> 
									<td colspan="3" class="hidden-xs"> </td> 
									<td class="hidden-xs text-center "><strong >Tổng tiền: {{number_format(Session('cart')->totalPrice)}}đ</strong>
									</td> 
									<td><a href="{{route('order.product')}}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
									</td> 
								</tr> 
								</tfoot> 
								</table>

							

								

								
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
	@section('my_js')
	<script type="text/javascript">
		$(document).on('click','update-qty',function(){
			var Id = $(this).attr('data-id');

			var input = $(this).parent(.'quantity').find('item-qty');

			var so_luong = input.val();

			$.jax({
				url: "/gio-hang/cap-nhap-so-luong-sp",
				type:'get',
				data:{
					Id:id,
					qty:so_luong
				},
				datatype:'HTML',
				success:function(response){
					if(response!=false){
						$('#cart').html(response);

					}

				}
			});
		})
	</script>
	@endsection