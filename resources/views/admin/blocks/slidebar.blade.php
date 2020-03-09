<div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
	<ul class="sidebar2 dark" style="border: none;">
		<li class="title active" ><h4>Admin Metro</h4></li>
		<li class=""><a href="{!! URL::to('/')!!}"><span class="mif-home icon"></span>Trang chủ</a></li> 
		<li class="stick bg-green">
			<a class="dropdown-toggle" href="#"><span class="mif-users fg-blue icon"></span>Tài khoản</a>
			<ul class="d-menu" data-role="dropdown">
				<li><a href="{!! URL::to('admin/admin/list') !!}">Thành viên</a></li>
				<li><a href="{!! URL::to('admin/user/list') !!}">Khách hàng</a></li>
			</ul>
		</li>	
	
	  @if (Auth::user()->level == 4)
			<li class="disabled "  >		
				<a ><span class="mif-paypal fg-blue icon"></span>Giao dịch</a>
			</li>

			@else 
			<li class="stick bg-green"  >		
				<a class="" href="{!! URL::to('admin/transaction/list') !!}"><span class="mif-paypal fg-blue icon"></span></span>Giao dịch</a>
			</li>

		@endif
	
	   @if (Auth::user()->level == 4)
			<li class="disabled "  >		
				<a ><span class="mif-calendar fg-blue icon"></span>Đơn hàng</a>
			</li>

			@else 
			<li class="stick bg-green"  >		
				<a class="" href="{!! URL::to('admin/order/list') !!}"><span class="mif-calendar fg-blue icon"></span>Đơn hàng</a>
			</li>

		@endif
		
		<li <?php if(Auth::user()->level == 3) echo 'class="disabled"';
			else echo 'class="stick bg-green"';  ?>             >
			<a class="dropdown-toggle" href="#"><span class="mif-mobile fg-blue icon"></span>Điện thoại</a>
			<ul class="d-menu" 
			<?php if(Auth::user()->level == 3) echo '';else echo 'data-role="dropdown"';?>
				>
				
				<li><a href="{!! URL::to('admin/cate/list') !!}">Danh Mục</a></li> 
				<li><a href="{!! URL::to('admin/product/list') !!}">Dòng sản phẩm</a></li> 		
			</ul>
		</li>
		<li <?php if(Auth::user()->level == 3) echo 'class="disabled"';
			else echo 'class="stick bg-green"';  ?> >
			<a class="dropdown-toggle" href="#"><span class="mif-headphones fg-blue icon"></span>Phụ kiện</a>
			<ul class="d-menu"
			<?php if(Auth::user()->level == 3) echo '';else echo 'data-role="dropdown"';?>>
				<li><a href="{!! URL::to('admin/gadgetcate/list') !!}">Danh Mục</a></li>
				<li><a href="{!! URL::to('admin/gadget/list') !!}">Loại Phụ kiện</a></li>
			</ul>
		</li>
		@if (Auth::user()->level == 4)
		<li class="disabled "  >		
			<a ><span class="mif-file-image fg-blue icon"></span>Slide</a>
		</li>

		@else 
		<li class="stick bg-green"  >		
			<a class="" href="{!! URL::to('admin/slide/list') !!}"><span class="mif-file-image fg-blue icon"></span>Slide</a>
		</li>
		@endif

		@if (Auth::user()->level != 2)
		<li class="disabled "  >		
			<a ><span class="mif-perm-phone-msg fg-blue icon"></span>Liên hệ</a>
		</li>

		@else 
		<li class="stick bg-green"  >		
			<a class="" href="{!! URL::to('admin/contact/list') !!}"><span class="mif-perm-phone-msg fg-blue icon"></span>Liên hệ</a>
		</li>

		@endif


		<li class="stick " style="background-color: #3D3D3D">
			<a class=""  !!}"><span class="mif-info icon fg-amber"> </span> Hướng dẫn</a>
			<img  src="{!! asset('images/com.png')!!}" 
			style="position: relative;top:-15px;max-width:170px">
		</li>

{{-- 
	<li class="disabled"><a href="">Ko co quyen</a></li>  --}}


</ul>
</div>
