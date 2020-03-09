
@extends('user.master')
@section('description','Đây là trang chủ')
@section('slider')
@include('user.blocks.slider')
@endsection
@endsection    <!-- de y end 2lan -->
@section('otherdetail')
@include('user.blocks.otherdetail')
@endsection
@section('content')

<div class="grid " style="background-color:#4E778C" >
  <div class="row cells12 pr_product "  style="margin-top: 10px">
    <div class="cell colspan2 offset1 "  style="background-color: #4390df;margin-left: 5.5%;text-align: center;">
      <h4 class="tt_pr_product" >SẢN PHẨM NỔI BẬT</h4>
    </div>
   <div class="cell colspan9 "  style="background-color:darkgray;margin: 0px;">
     <h4 style="padding: 1.28%"></h4>
    </div>
  </div>

  <style type="text/css" media="screen">
  	.tile-large{
  		width: 111%;height:220px;
  		margin:0px 5% 10px -18%;
  	}
  </style>
 
  <div class="row cells12">
   <div class="cell">  	
   </div>
   @foreach ($feature_product  as $item)    
   <div class="cell colspan2 " style="margin-right: 14px">
    <div class="tile-large" >
      <div class="tile-content slide-up-2">
        <div class="slide">
          <img src="{!! asset('images/product/'.$item->image) !!}" >
        </div>
        <div class="slide-over bg-grayDarker ">
          <div class="row" style="text-align:center;">

            <h5 style="color:white" >{!! $item->name!!} </h5>
            <?php
            if( $item->discount == 0 &&  $item->discount_percent == 0 ){
              echo '<h5 style="color:white;"> Giá : <span style="color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h5> ';
            }else{ 
              echo '<h5 style="color:white;padding-left:5%;margin-bottom:-10%">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h5> ';
            }
            ?>  

            <?php 
            if ($item->discount != 0){
              echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
            }elseif ($item->discount_percent != 0) { 
             echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
             $price = $item->price;                    
             $percent = discount_percent_value($item->discount_percent);                   
             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;    
             echo '</h4>';             
           }
           ?>         
         </div>
         <hr>
         <div class="row cells12"  >
          <div class="cell colspan3 offset3 ">
            <a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-3x fg-blue"></span> </a>
          </div>

          <div class="cell colspan3 offset1 g_product">
            <a href="{!! URL('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Xem chi tiết" data-hint-position="top" class="mif-bookmark  mif-3x fg-blue "> </span> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <span style="font-size: 14px;color: white;margin:10px 0% -5px  5%">{!!  mb_strtoupper($item->name, 'UTF-8') !!}</span>


</div>
@endforeach
</div>

<div class="row cells12" >
 <div class="cell">  	
  </div>
  @foreach ($feature_gadget  as $item) 
  <div class="cell colspan2 " style="margin-right: 14px;">
    <div class="tile-large" >
      <div class="tile-content slide-down-2">
        <div class="slide">
          <img src="{!! asset('images/gadget/'.$item->image) !!}" >
        </div>
        <div class="slide-over bg-grayDarker ">
          <div class="row" style="text-align:center;">

            <h5 style="color:white" >{!! $item->name!!} </h5>
            <?php
            if( $item->discount == 0 &&  $item->discount_percent == 0 ){
              echo '<h5 style="color:white;"> Giá : <span style="color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h5> ';
            }else{ 
              echo '<h5 style="color:white;padding-left:10%;margin-bottom:-10%">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h5> ';
            }
            ?>  

            <?php 
            if ($item->discount != 0){
              echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
            }elseif ($item->discount_percent != 0) { 
             echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
             $price = $item->price;                    
             $percent = discount_percent_value($item->discount_percent);                   
             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;   
             echo '</h4>';              
           }
           ?>         
         </div>
         <hr>
         <div class="row cells12"  >
          <div class="cell colspan3 offset3 ">
            <a href="{!! url('mua-phu-kien',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-3x fg-blue"></span> </a>
          </div>

          <div class="cell colspan3 offset1 g_product">
            <a href="{!! URL('chi-tiet-phu-kien',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Xem chi tiết" data-hint-position="top" class="mif-bookmark  mif-3x fg-blue "> </span> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
 <span style="font-size: 14px;color: white;margin:10px 0% -5px  -5%">{!!  mb_strtoupper($item->name, 'UTF-8') !!}</span>
  <br>  <br>
	</div>

	@endforeach
</div>

<div class="grid">

   <div class="row cells12 pr_product ">
    <div class="cell colspan2 offset1 "  style="background-color: #4390df;margin-left: 5.5%;text-align: center;" >
      <h4 class="tt_pr_product" >SẢN PHẨM MỚI</h4>
    </div>
   <div class="cell colspan9 "  style="background-color:darkgray;margin: 0px">
      <h4 style="padding: 1.28%"></h4>
    </div>
  </div>


  <div class="row cells12">
	   <div class="cell">  	
	   </div>
	   @foreach ($latest_product  as $item)    
	   <div class="cell colspan2 " style="margin-right: 14px">
	    <div class="tile-large" >
	      <div class="tile-content slide-up-2">
	        <div class="slide">
	          <img src="{!! asset('images/product/'.$item->image) !!}" >
	        </div>
	        <div class="slide-over bg-grayDarker ">
	          <div class="row" style="text-align:center;">

	            <h5 style="color:white" >{!! $item->name!!} </h5>
	            <?php
	            if( $item->discount == 0 &&  $item->discount_percent == 0 ){
	              echo '<h5 style="color:white;"> Giá : <span style="color: lightGreen">';
	              echo  number_format($item->price,0,',','.')." VNĐ" ;
	              echo '</span></h5> ';
	            }else{ 
	              echo '<h5 style="color:white;padding-left:5%;margin-bottom:-10%">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
	              echo  number_format($item->price,0,',','.')." VNĐ" ;
	              echo '</span></h5> ';
	            }
	            ?>  

	            <?php 
	            if ($item->discount != 0){
	              echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
	              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
	            }elseif ($item->discount_percent != 0) { 
	             echo '<h4 style="color:white;font-size:18px"> Chỉ còn : <span style="color: lightGreen">';
	             $price = $item->price;                    
	             $percent = discount_percent_value($item->discount_percent);                   
	             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;    
	             echo '</h4>';             
	           }
	           ?>         
	         </div>
	         <hr>
	         <div class="row cells12"  >
	          <div class="cell colspan3 offset3 ">
	            <a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-3x fg-blue"></span> </a>
	          </div>

	          <div class="cell colspan3 offset1 g_product">
	            <a href="{!! URL('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Xem chi tiết" data-hint-position="top" class="mif-bookmark  mif-3x fg-blue "> </span> </a>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <span style="font-size: 14px;color: white;margin:10px 0% -5px  5%">{!!  mb_strtoupper($item->name, 'UTF-8') !!}</span>


	</div>
	@endforeach
</div>

  <div class="row cells12">
	 <div class="cell">  	
	 </div>
	   @foreach ($latest_gadget  as $item)    
	   <div class="cell colspan2 " style="margin-right: 14px">
	    <div class="tile-large" >
	      <div class="tile-content slide-down-2">
	        <div class="slide">
	          <img src="{!! asset('images/gadget/'.$item->image) !!}" >
	        </div>
	        <div class="slide-over bg-grayDarker ">
	          <div class="row" style="text-align:center;">

	            <h5 style="color:white" >{!! $item->name!!} </h5>
	            <?php
	            if( $item->discount == 0 &&  $item->discount_percent == 0 ){
	              echo '<h5 style="color:white;"> Giá : <span style="color: lightGreen">';
	              echo  number_format($item->price,0,',','.')." VNĐ" ;
	              echo '</span></h5> ';
	            }else{ 
	              echo '<h5 style="color:white;padding-left:5%;margin-bottom:-10%">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
	              echo  number_format($item->price,0,',','.')." VNĐ" ;
	              echo '</span></h5> ';
	            }
	            ?>  

	            <?php 
	            if ($item->discount != 0){
	              echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
	              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
	            }elseif ($item->discount_percent != 0) { 
	             echo '<h4 style="color:white;"> Chỉ còn : <span style="color: lightGreen">';
	             $price = $item->price;                    
	             $percent = discount_percent_value($item->discount_percent);                   
	             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;    
	             echo '</h4>';             
	           }
	           ?>         
	         </div>
	         <hr>
	         <div class="row cells12"  >
	          <div class="cell colspan3 offset3 ">
	            <a href="{!! url('mua-phu-kien',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-3x fg-blue"></span> </a>
	          </div>

	          <div class="cell colspan3 offset1 g_product">
	            <a href="{!! URL('chi-tiet-phu-kien',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Xem chi tiết" data-hint-position="top" class="mif-bookmark  mif-3x fg-blue "> </span> </a>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <span style="font-size: 14px;color: white;margin:10px 0% -5px -6%">{!!  mb_strtoupper($item->name, 'UTF-8') !!}</span>
	</div>
	@endforeach
</div>


</div>

@endsection()
