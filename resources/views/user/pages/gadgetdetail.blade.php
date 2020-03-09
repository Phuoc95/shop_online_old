@extends('user.master');

@section('fanc')
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
@endsection
@section('slider')
@include('user.blocks.slider')
@endsection
@endsection
@section('otherdetail')
@include('user.blocks.otherdetail')
@endsection
@section('content')
<div class="grid bg-white">
	<div class="row cells12 bg-olive ">
		<ul class="breadcrumbs dark">
			<li><a href="#"><span class="icon mif-home fg-blue"></span></a></li>
			<li><a href="#">Điện thoại</a></li>
			<li><a href="#">
				<?php 
				$data = DB::table('cates')->where('id',$gadget_detail->gadgetcate_id)->first();   
				echo  $data->name;    
				?>
			</a></li>
			<li><a href="#" class="capital"> {!! $gadget_detail->name; !!}
			</a></li>
		</ul>
	</div>

	<div class="row cells12" bg-white>

		<div class="cell  offset1">
			@foreach($image as $item_image)
			<div class="row">
				<div class="image-container" data-format="square" style="margin-bottom: 15px"  > 
					<div class="frame" style="max-height: 70px">
						<a  rel="example_group" href="{!! asset('images/gadget/detail/'.$item_image->image) !!}" title="Lorem ipsum dolor sit amet"><img src="{!! asset('images/gadget/detail/'.$item_image->image) !!}"	style="border: 1px solid gray;"></a>
					</div>
				</div> 
			</div>  
			@endforeach

		</div>

		<div class="cell colspan3">
			<div class="row">
				<div class="image-container" data-format="square" > 
					 <div class="frame" style="max-height: 320px ; border: 1px solid gray;box-sizing:initial" > 
						<a id="example2" href="{!! asset('images/gadget/'.$gadget_detail->image) !!}" title="">
							<img src="{!! asset('images/gadget/'.$gadget_detail->image) !!}"> 
						</a>

					</div> 
				</div>
			</div>
		</div>

		<div class="cell colspan3 bg-white ">
			<div class="row" style="padding:10px" >
				<p class="detail_gadget">Sản phẩm : <span style="color:brown"> {!! $gadget_detail->name!!}</span>  </p>
				<?php
				if( $gadget_detail->discount == 0 &&  $gadget_detail->discount_percent == 0 ){
					echo '<p class="detail_gadget">Giá : <span style="color:brown"> ';
					echo  number_format($gadget_detail->price,0,',','.')." VNĐ" ;
					echo '</span> </p> ';
				}else{ 
					echo '<p class="detail_gadget">Giá : <span style="text-decoration:line-through;color: brown"> ';
					echo  number_format($gadget_detail->price,0,',','.')." VNĐ" ;
					echo '</span> </p> ';
        /*    echo '<h5 style="color:white;">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
            echo  number_format($gadget_detail->price,0,',','.')." VNĐ" ;
            echo '</span></h5> ';*/
        }
        ?>  

        <?php 
        if ($gadget_detail->discount != 0){
        	echo '<p style ="font-weight:bold"> Chỉ còn : <span style="color: red">';
        	echo number_format($gadget_detail->price - $gadget_detail->discount ,0,',','.')." VNĐ" ;
        	echo '</p>';
        }elseif ($gadget_detail->discount_percent != 0) { 
        	echo '<p style="font-size:18px;font-weight:bold"> Chỉ còn : <span style="color: red">';
        	$price = $gadget_detail->price;                    
        	$percent = discount_percent_value($gadget_detail->discount_percent);                   
        	echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ; 
        	echo '</p>';              
        }
        ?>  
        <p class="detail_gadget">Đã bán : <span style="color:brown"> {!! $gadget_detail->buyed!!} sản phẩm</span>  </p>       

        <p class="detail_gadget"">Tình trạng : <span style="color: green">
        	@if ($gadget_detail->total - $gadget_detail->buyed > 0 )
        	{!! 'Còn hàng'!!}
        	@else 
        	{!! 'Hết hàng'!!}
        	@endif

        </span>  </p>

        <div>
        	<ul class="numeric-list large-bullet dark-bullet align-justify"  >         
        		<li>Bảo hành chính hãng </li>
        		<li>Giao hàng tận nơi.</li>
        	</ul>       
        </div>  


    </div>     
    <div class="row">       
    	<div class="row cells12"  >
    		<div class="cell colspan4 ">
    			{{-- <span style="font-weight: bold ;font-size: 15px" > Mua ngay</span> --}}
    			<a href="{!! url('mua-phu-kien',[$gadget_detail->id,$gadget_detail->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-2x fg-blue"></span></a> 
    		</div>

    	</div>
    </div>

</div>
<div class="cell colspan4 "  style="margin-left:-7%">
	<div class="row lq">
		<p class="align-left tag info" style="margin-left:25%;padding:15px 14% 15px 14% ;font-size: 15px" >Sản phẩm liên quan</p>
		@foreach($gadget_cate as $item)
		<div class="row cells12" style="margin-left:25%">
			<div class="cell colspan4">
				<div class="image-container" data-format="square"  > 
					<div class="frame" style="max-height: 100px;min-width: 100px;margin-bottom: 50px">
						<a href="{!! URL('chi-tiet-phu-kien',[$item->id,$item->alias]) !!}" title="">
							<img src="{!! asset('images/gadget/'.$item->image) !!} " style="border: 1px solid gray">
						</a>    
					</div>
				</div>       
			</div>  
			<div class="cell colspan8">     
				<a href="{!! URL('chi-tiet-phu-kien',[$item->id,$item->alias]) !!}">
					<h6  style="margin-top:5px"> {!! $item->name !!}</h6>
				</a>   
				@if ($item->discount == 0 && $item->discount_percent == 0)<span style="font-weight: bold"> Giá: </span>
				 {!!  number_format($price = $item->price,'0',',','.').' VNĐ'  !!} 
				<p style=" margin-top:5px"> 
					<a href="{!! url('mua-phu-kien',[$item->id,$item->alias]) !!}" > <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-2x fg-blue"></span> </a>
				</p>
				@elseif ($item->discount != 0)   
				<span  style="font-weight: bold" >Giá gốc:</span> <span style="text-decoration:line-through;color: brown">
				{!! number_format( $item->price ,0,',','.').' VNĐ' !!} </span> 
				<p> </p>
				<span  style="font-weight: bold" >Chỉ còn:</span> <span style="color: red">  {!!  number_format($item->price - $item->discount,0,',','.')." VNĐ" ;      !!} </span> 
				<p style=" margin-top:5px"> 
					<a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" > <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-2x fg-blue"></span> </a>
				</p>
				@elseif ($item->discount_percent != 0)   
				<span  style="font-weight: bold" >Giá gốc:</span> <span style="text-decoration:line-through;color: brown">  {!! $item->price !!} </span> 
				<p> </p>
				<?php    $price = $item->price;                    
				$percent = discount_percent_value($item->discount_percent);  ?> 
				<span  style="font-weight: bold" >Chỉ còn:</span> <span style="color: red">  {!!                
					number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;
					!!} </span> 
					<p style=" margin-top:5px"> 
						<a href="{!! url('mua-phu-kien',[$item->id,$item->alias]) !!}" > <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-2x fg-blue"></span> </a>
					</p>
					@endif
				</div>  
			</div>
			@endforeach

			<p> </p>


		</div>
	</div>
	<div class="clear">

	</div>
	<div class="row cells12"  style="margin: 5px">
		<div class="cell colspan10 offset1">
			<div class="tabcontrol"  data-role="tabcontrol">
				<ul class="tabs">
					<li><a href="#frame_ct">Chi tiết</a></li>
					<li><a href="#frame_nx">Nhận xét - đánh giá</a></li>
					

				</ul>
				<div class="frames">
					<div class="frame bg-white" id="frame_ct" style="background-color: #F6EDED  !important"> 
						<p style="font-weight: bold;font-size: 15px"> 
							{!! $gadget_detail->description!!}  </p></div>
							<div class="frame bg-white" id="frame_nx" style="background-color: #F6EDED  !important">        
								<div class="fb-comments" data-href="http://localhost:8000/" data-numposts="1"></div>
							</div>

						</div>
					</div>
				</div>
			</div>   

		</div>

	</div>

	<script>
		$(function(){
			$("#tab-control").tabcontrol();
		});
	</script>
	<script>
		$(function(){
			$("#rating").rating();
		});
	</script>


	@endsection()
{{--   <div class="image-container " >
<div class="frame"><img data-format="sd" src="{!!URL::to('images/gadget/4.jpg')!!}"></div>
</div> --}} 

