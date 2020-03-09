@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%" >Sửa Sản phẩm</h1>  
   <br />
   @include('admin.blocks.error')
   <div class="row cells12">
    <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="">Danh mục sản phẩm:</label>         
        <select name="sltCate">
          <option value="0">----- Chọn danh mục -----</option>
          <?php   cate($cate,$select= $product["cate_id"] )  ;?> 

        </select>
      </div>
    </div>      
  </div>
  <div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên Sản phẩm:</label>
      <input type="text" name="txtName" id="name" 
      value="{!! isset($product)? $product['name']:null !!}"  />
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Tổng Sản phẩm:</label>
    <input type="number" min="0"  name="txtTotal" id="name"
    value="{!! isset($product)? $product['total']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giá:</label>
    <input type="number" min="0"  name="txtPrice" id=""
    value="{!!isset($product)? $product['price']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giảm giá (Theo số tiền):</label>
    <input type="number" min="0"  name="txtDiscount" id="dc_id"  onchange="dc()"
    value="{!! isset($product)? $product['discount']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giảm giá (Theo %):</label>
    <select name="sltDiscount" id="dc_percent_id"  onchange="dc_percent()">
      <option value="">----- Chọn % giảm giá -----</option>
      <?php discount_percent($select=$product['discount_percent'] )  ;?>     
    </select>
  </div>  
</div>
</div>
<div class="row cells12">
 <div class="cell colspan5 offset1">

   <label for="" >Ảnh hiện tại:</label>
   <img src="{{ asset('images/product/'.$product['image'])  }}" width="90px" height="90px" alt="">
   <input type="hidden" name="img_current" value="{!!$product['image']!!}">


 </div>
</div>
<div class="row cells12">
 <div class="cell colspan5 offset1">

  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Chọn ảnh khác:</label>
    <div class="input-control file" data-role="input">
      <input type="file" name="fImages" id="">
      <button class="button"><span class="mif-folder"></span></button>
    </div>
  </div>  
</div>
</div>
<div class="row cells12">
 <div class="cell colspan11 offset1">

   <label for="" >Ảnh chi tiết:</label> <br>

 </div>
</div>

<div class="row cells12">
  <div class="cell"></div>
  @foreach ($product_image as $key => $item)
  <div class="cell" id="{!! $key !!}"  >
    <div class="image-container" data-format="square" > 
     <div class="frame">
       <img src="{{ asset('images/product/detail/'.$item['image'])  }}" class="img_detail" idHinh="{!! $item['id'] !!}" id="{!! $key !!}" style="max-width: 100px"/>
     </div>
   </div>

   
   <span data-role="hint" data-hint="Xóa">  
    <a href="javascript:void(0)" type="button" id="del_img_demo" > <span class="mif-cancel fg-red"></span>  </a>
  </span></a>
</div> 
@endforeach

<button type="button" id="addImages" class="button primary" style="margin:5px 10px;min-width: 110px">
Thêm ảnh</button>
<div id="insert" name="fProductDetail[]" > </div>
</div>


<div ></div>
<div class="row cells12">
  <div class="cell colspan9 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Mô tả::</label>
      <textarea name="txtDescription">
        {!! isset($product)? $product['description']:null !!}
      </textarea> 
      <script type="text/javascript">ckeditor("txtDescription")</script>
    </div>
  </div>
</div>
<div ></div>

</div>
   <div class="row cells12">
    <div class="cell  offset1" style="margin-top: 320px;margin-left:80px">
        <div class="input-control text full-size text info custom_ip" data-role="input">
         <button type="submit" class="button primary">Sửa</button> 
       </div>
     </div>
   </div>



</form>
</div>


@endsection()
