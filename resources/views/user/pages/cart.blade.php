
@extends('user.master')

@section('content')

<div class="grid bg-white" style="margin: 10px 0px 5px 0px">
	<div class="row cells12">
		<div class="cell colspan5 offset1" style="margin-top: 15px">
			<span  data-role="hint"  class="mif-cart  mif-2x fg-olive">
				Giỏ hàng của bạn
			</span>

		</div>
	</div>

	<div class="row cells12">
		<div class="cell colspan10 offset1">
			<table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false">
				<thead  >
					<tr>
						<th class="align-center">Sản phẩm</th>
						<th class="sortable-column ">Ảnh</th>
						<th class="sortable-column">Giá</th>
						<th class="sortable-column">Số lượng</th>
						<th class="sortable-column">Tùy chọn</th>
						<th class="sortable-column">Thành tiền</th>

					</tr>
				</thead>
				<tbody>
					@foreach ($content as $item)					

					<tr>
						<td >{!! $item->name!!}</td>
						<td >
							<div class="image-container ">
								<div class="frame" style="max-height: 110px;max-width: 100px">
						{{--@if ($item->attributes->has('image'))
						$image=$item->attributes->has('image')
						@endif --}}
						<img src="{!! asset('images/product/'.$item->attributes->image) !!}" 
						onerror='this.style.display = "none"'>
						<img src="{!! asset('images/gadget/'.$item->attributes->image) !!}" 
						onerror='this.style.display = "none"'>
					</div>
				</div>

			</td>

			<td >
				<?php  echo number_format($item->price,0,',','.')." VNĐ" ;		 ?>

			</td>
			<td >
				<form action="" method="GET" enctype="multipart/form-data" name="frmUpdateQty" class="input-control text">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}"> 			  
					<input type="number" name="quantity" min="1" value="{!! (int)$item->quantity !!}" 
					style="max-width: 100px" id="qty" > 
				</form>


			</td>
			<td >

				<span data-role="hint" data-hint="Cập nhật" style="margin:0px 15px">  
					<a href="javascript:void(0)" class="updatecart" id="{!! $item['id'] !!}"> <span  class="mif-loop2 mif-2x fg-blue " ></span>  </a>
				</span>
				<span data-role="hint" data-hint="Xóa" >  
					<a 	href="{!! url('xoa-san-pham',['id'=>$item['id']]) !!}" 
						onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "
						> <span  class="mif-cancel mif-2x fg-red " ></span>   </a>
					</span>
				</td>
				<td >
					<?php 
					echo number_format($item->price*$item->quantity,0,',','.')." VNĐ" ;
					?>
				</td>

				

			</tr>

			@endforeach	
		</tbody>
	</table>
</div>
</div>


<div class="row cells12">
	<div class="cell colspan3 offset1">
		<a href="{!!url('/')!!}" title=""><button class="button loading-pulse lighten primary" 
			style="padding: 0px 10px 0px 20px">Tiếp tục mua hàng</button></a>

		</div>
		<div class="cell colspan3 offset4 ">
			<table class="table border bordered align-center" style="margin-left: 25px">
				<thead >
					<tr >
						<th class="align-center" style="color:darkRed">Tổng tiền </th>
						<th class="sortable-column">
							<?php  echo number_format(Cart::getTotal() ,0,',','.')." VNĐ"?>
						</th>				
					</tr>
				</thead>

			</table>
		</div>
	</div>



<div  class="row cells12" style="margin-bottom: 30px">

<div class="cell colspan8 offset2">
	<div class="frame bg-white" id="frame_ed">        
		<div class="frame bg-white" id="frame_ed">        
			<div class="frame bg-white" id="frame_ed">        
				<div class="login-form padding20 block-shadow">
					<form action="{!! route('dathang') !!}" method="POST" enctype="multipart/form-data">		
						<input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
						<?php 	
						if (Auth::check()) {
						$data = DB::table('users')->where('id',Auth::user()->id)->first();
						}else
						// $data =  array('name' =>'','phone'=>'','email'=>'','address'=>'' );
						$data = (object) array('name' =>'','phone'=>'','email'=>'','address'=>'' );
							
								
						$Tamount =  Cart::getTotal() ; ?>
						<input type="hidden" name="Tamount" value="{!! $Tamount !!}"> 

						<h1 class="text-light align-center">Thông tin thanh toán</h1>
						<hr class="thin"/>
						<br />
						@include('user.blocks.error')
						<div class="input-control text full-size" data-role="input">
							<label >Họ tên:</label>
							<input type="text" name="user_name" value="{!! $data->name !!}">
							<button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
						<br />
						<br />
						<div class="input-control text full-size" data-role="input">
							<label for="user_login">Số điện thoại:</label>
							<input type="text" name="user_phone" value="{!!$data->phone !!}">
							<button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
						<br />
						<br />
						<div class="input-control text full-size" data-role="input">
							<label for="user_login">Email:</label>
							<input type="email" name="user_email" value="{!! $data->email !!}" >
							<button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
						<br />
						<br />
						<div class="input-control text full-size" data-role="input">
							<label for="user_login">Địa chỉ:</label>
							<input type="text" name="user_address" value="{!!$data->address !!}">
							<button class="button helper-button clear"><span class="mif-cross"></span></button>
						</div>
						<br />
						<br />
						<div>
							<label for="user_login" >Hình thức thanh toán :</label>
							<br />

							<label class="input-control radio">
								<input type="radio" name="payment" checked value="1">
								<span class="check"></span>
								<span class="caption">Nhận hàng-giao tiền</span>                    
							</label>
							<label class="input-control radio">
								<input type="radio" name="payment"  value="2">
								<span class="check"></span>
								<span class="caption">Chuyển khoản</span>                    
							</label>
						</div>
						<br />
						
						<button type="submit" class="button lighten primary">Đặt hàng</button>
					</form>
				</div>

			</div>
		</div>

	</div>

</div>

</div>
</div>

@endsection()
