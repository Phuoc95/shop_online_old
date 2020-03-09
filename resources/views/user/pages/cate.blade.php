  @extends('user.master');
  @section('slider')
  @include('user.blocks.slider')
  @endsection
  @endsection    <!-- de y end 2 -->
  @section('otherdetail')
  @include('user.blocks.otherdetail')
  @endsection
  @section('content')
  <div class="grid bg-white">
    <div class="row cells12 bg-olive ">
      <ul class="breadcrumbs dark">
        <?php 
        $cate = DB::table('cates')->where('id',$id)->first();       
        ?>
        <li><a href="#"><span class="icon mif-home fg-blue"></span></a></li>
        <li><a href="javascript:void(0)">Điện thoại</a></li>
        <li><a href="{!! URL('loai-san-pham',[$cate->id,$cate->alias])!!}">{!! $cate->name!!}</a></li>
      </ul>
    </div>

    <div class="row cells12" bg-white>
     <div class="cell colspan2" style="margin:0px 10px 10px 50px">

       <div class="panel">
        <div class="heading">
          <span class="icon mif-users"></span>
          <span class="title">Thương hiệu</span>
        </div>
        <div class="content">
         <ul class="simple-list square-marker">
          <?php 
          $slidebar_cate   = DB::table('cates')->skip(0)->take(10)->get();  


          $sale_latest     = DB::table('products')
          ->where('discount', '<>',0)
          ->orWhere('discount_percent','<>',0)
          ->select()->orderBy('id','DESC')->skip(0)->take(2)->get(); 
          ?>            
          @foreach($slidebar_cate as $item)
          <li class="nn">           
            <a class="animate_cate"
            href="{!! URL('loai-san-pham',[$item->id,$item->alias])!!}"> {!! strtoupper("$item->name"); !!}</a>
          </li>
          @endforeach 

          <style type="text/css" media="screen">
           .nn{
                 transition: width 2s;  
            }

            .nn:hover {
              background-color: lightblue;
              width:100%;
            }
        
          </style>


          
        </ul>
      </div>
    </div> 
    <div class="panel">
      <div class="heading">
        <span class="icon mif-mobile"></span>
        <span class="title"> Sale Mới nhất</span>
      </div>
      @foreach ($sale_latest  as $item)
      <div class="content">
       <div class="tile-square" style="margin-left: 15px;">
        <div class="tile-content slide-left"  >         
          <div class="slide" >
            <img src="{!! asset('images/product/'.$item->image) !!}">
          </div>
          <div class="slide-over bg-steel">
            <div class="row align-center">

              <p  style="color:white;font-size: 12px"> {!!  $item->name!!}</p>            
              <span style="text-decoration:line-through;color: lightGreen">
               <?php   echo  number_format($item->price,0,',','.')." VNĐ" ; ?>
             </span>

             <?php 
             if ($item->discount != 0){
              echo '<h6 style="color:white;"> Nay chỉ còn  : <span style="color: lightGreen">';
              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
              echo '</span></h6> ';
            }elseif ($item->discount_percent != 0) { 
             echo '<h6 style="color:white;"> Nay chỉ còn  : <span style="color: lightGreen">';
             $price = $item->price;                    
             $percent = discount_percent_value($item->discount_percent);                   
             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ;
             echo '</h6> ';               
           }
           ?>

         </div>

         <div class="row cells12"  >
          <div class="cell colspan3 offset3 ">
            <a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Thêm vào giỏ hàng" data-hint-position="top" class="mif-cart  mif-2x fg-blue"></span> </a>

          </div>
          <div class="cell colspan3 offset1 g_product">
           <a href="{!! URL('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"> <span  data-role="hint" data-hint="Xem chi tiết" data-hint-position="top" class="mif-bookmark  mif-2x fg-blue "> </span> </a>
         </div>
       </div>
     </div>
   </div>        
 </div> 
</div>
@endforeach 

</div>
</div>

{{-- main co --}}
<div class="cell colspan9">
 <div class="row cells12 ">
  <div class="cell colspan5">
    <span class="icon mif-mobile fg-dark mif-2x"></span><strong> Có <abbr> {!! $rows!!} </abbr> sản phẩm với thương hiệu 
    <abbr class="uppercase">
      <?php 
      $cate = DB::table('cates')->where('id',$id)->first();
      echo $cate->name; 
      ?>

    </abbr>  </strong>

  </div>
</div>
<div class="row cells12">
  @foreach ($product_cate as $item)
  <div class="cell colspan3 " style="max-height: 212px ;margin:20px 7px;border: 1px solid gray" >
    <div class="tile-wide-y" style="max-height: 220px" >
      <div class="tile-content slide-up-2" style="max-height: 210px">
        <div class="slide">
          <img src=" {!! asset('images/product/'.$item->image) !!} ">
        </div>
        <div class="slide-over bg-brown ">
          <div class="row" style="text-align:center;">
            <h5 style="color:white" >{!! $item->name!!} </h5>
            <?php
            if( $item->discount == 0 &&  $item->discount_percent == 0 ){
              echo '<h4 style="color:white;"> Giá : <span style="color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h4> ';
            }else{ 
              echo '<h5 style="color:white;margin-left:10%">Giá :  <span style="text-decoration:line-through;color: lightGreen">';
              echo  number_format($item->price,0,',','.')." VNĐ" ;
              echo '</span></h5> ';
            }
            ?>  

            <?php 
            if ($item->discount != 0){
              echo '<p style="color:white;font-size:18px"> Chỉ còn : <span style="color: lightGreen">';
              echo number_format($item->price - $item->discount ,0,',','.')." VNĐ" ;
              echo '</p>';
            }elseif ($item->discount_percent != 0) { 
             echo '<p style="color:white;font-size:18px"> Chỉ còn : <span style="color: lightGreen">';
             $price = $item->price;                    
             $percent = discount_percent_value($item->discount_percent);                   
             echo number_format($price-($price/100 * $percent) ,0,',','.')." VNĐ" ; 
             echo '</p>';              
           }
           ?>         

         </div>
         <hr class="ms_hr_cate">
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
<div class="clear">
  <span style="font-size: 15px;margin:5px 0%  5px 10%; color: black;">{!!  mb_strtoupper($item->name, 'UTF-8') !!}</span>
</div>

</div>

@endforeach
</div>

<div class="clear">

</div>
{{-- phan trang --}}
<div class="row cells12" style="margin-top: 40px">
  <div class="cell colspan9 offset2">
   <div class="pagination">

    @if ($product_cate->currentPage() != 1)
    <li class="item" ><a href="{!! str_replace('/?','?',$product_cate-> url($product_cate -> currentPage()-1)) !!}">&lt;</a></li>
    @endif
    @for ($i = 1; $i<=$product_cate->lastPage(); $i++) {{-- De y Dau () --}}
    <li  class="{!! ($product_cate -> currentPage() == $i)? 'item current' :'item' !!}" >
      <a href="{!! str_replace('/?','?',$product_cate-> url($i)) !!}">{!! $i !!}</a> {{-- De y Dau $ --}}
    </li> 
    @endfor

    @if ($product_cate->currentPage() != $product_cate->lastPage())
    <li  class="item" ><a href="{!! str_replace('/?','?',$product_cate-> url($product_cate -> currentPage()+1)) !!}">&gt;</a></li>
    @endif 


  </div> 
</div>
</div>

</div>
</div>

</div>


<script>
  $(function(){
    $("#rating").rating();
  });
</script>


@endsection()

