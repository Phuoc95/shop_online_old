
<div class="grid" style="margin-top: 0px" >
	<div class="app-bar darcula" data-role="appbar">

		<span class="app-bar-element branding" id="logo"> 
		<a  href="{!!URL::to('/')!!}">
			<img  class="app-bar-element branding" src="{!! asset('images/logo.jpg')!!}" > </a> 
		</span>
		{{-- 	<a class="app-bar-element branding">SHOP ONLINE</a> --}}
		{{--  <span class="app-bar-divider"></span>   
		--}}
		<ul class="app-bar-menu">
			<li data-flexorderorigin="0" data-flexorder="1"><a href="{!! URL::to('/')!!}">
				<span class="mif-home fg-blue"></span> Trang chủ</a></li>
				<li data-flexorderorigin="1" data-flexorder="2">
					<a href="" class="dropdown-toggle"><span class="mif-mobile fg-blue"></span> Sản phẩm</a>
					<ul class="d-menu" data-role="dropdown">
						<?php 
						$menu_product_5 = DB::table('cates')->skip(0)->take(5)->get();
						$menu_product   = DB::table('cates')->skip(5)->take(10)->get();
						$menu_gadget    = DB::table('gadget_cates')->get();
						?>            
						@foreach($menu_product_5 as $item)
						<li>
							<a href="{!! URL('loai-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a>
						</li>
						@endforeach 

						<li><a href="" class="dropdown-toggle">Thêm</a>
							<ul class="d-menu" data-role="dropdown">
								@foreach($menu_product as $item)
								<li>
									<a href="{!! URL('loai-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a>
								</li>
								@endforeach 
							</ul>
						</li>

					</ul>
				</li>

				<li data-flexorderorigin="1" data-flexorder="2">
					<a href="" class="dropdown-toggle"><span class="mif-headphones fg-blue"></span> Phụ kiện</a>
					<ul class="d-menu" data-role="dropdown">
						@foreach($menu_gadget as $item)
						<li>
							<a href="{!! URL('loai-phu-kien',[$item->id,$item->alias])!!}">{!!$item->name!!}</a>
						</li>
						@endforeach

					</ul>
				</li>
		     
				<li data-flexorderorigin="3" data-flexorder="4"><a href="{!!URL::to('gio-hang')!!}"> <span class="mif-cart fg-blue"></span> Giỏ hàng</a></li> 

				@if(!Auth::check())
				<li data-flexorderorigin="3" data-flexorder="4"><a href="{!!URL::to('register')!!}"> <span class="mif-user fg-blue"></span> Đăng ký</a></li> 
				<li data-flexorderorigin="3" data-flexorder="4"><a href="{!!URL::to('auth/login')!!}"> <span class="mif-enter fg-blue"></span> Đăng nhập</a></li>
				{{-- @elseif(Auth::user()->level ==1  )

				<li data-flexorderorigin="3" data-flexorder="4"> <a href="{!!URL::to('thanh-vien')!!}"> <span class="mif-user fg-blue"></span  style="margin-top: -4px"> Chào {!! Auth::user()->username !!} </a></li> 

				<li data-flexorderorigin="3" data-flexorder="4"><a href="{!!URL::to('auth/logout')!!}"> <span class="mif-switch fg-red" style="margin-top: -2px"></span> Đăng xuất</a></li> --}}
				@else 
				<li data-flexorderorigin="3" data-flexorder="4"> <a href="{!!URL::to('admin/admin/list')!!}"> <span class="mif-user fg-blue"></span  style="margin-top: -4px"> Chào {!! Auth::user()->name !!} </a></li> 

				<li data-flexorderorigin="3" data-flexorder="4"><a href="{!!URL::to('auth/logout')!!}"> <span class="mif-switch fg-red" style="margin-top: -2px"></span> Đăng xuất</a></li>
				@endif



				{{-- <span class="app-bar-divider"></span> --}}


			</ul>

			<div class="app-bar-element place-right active-container " style="background-color:#3C3F41  " >
				{{-- {!! route('admin.admin.getAdd') !!} --}}
				<form action="{!! route('timkiem') !!}" method="POST" enctype="multipart/form-data">
					<div class="input-control text" style="width: 210px; margin:10 20px 5px;position: relative;bottom: 2px;" >
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<input  type="text" placeholder="Tìm kiếm" id="search" name="txtsearch"
						style="	font-family:Segoe UI Light, Open Sans Light, serif;">


						<button class="button" type="submit"><span class="mif-search"></button>
					</div>
				</form>  



			</div>
			<div class="app-bar-pullbutton automatic" style="display: none;"></div>
			<div class="clearfix" style="width: 0;"></div><nav class="app-bar-pullmenu hidden flexstyle-app-bar-menu" style="display: none;"><ul class="app-bar-pullmenubar hidden app-bar-menu"></ul></nav>
		</div>     

	</div>  <!--End -->

<style type="text/css" media="screen">
    .app-bar .app-bar-element.branding {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
</style>
