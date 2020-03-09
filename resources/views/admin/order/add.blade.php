@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="{!! route('admin.product.getAdd') !!}" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-center ">Thêm Sản phẩm</h1>  
   <br />
   @include('admin.blocks.error')
   <div class="row cells12">
    <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="">Danh mục sản phẩm:</label>         
        <select name="sltCate">
          <option value="">----- Chọn danh mục -----</option>

          <?php   cate($cate,$select=0 )  ;?> 
          
        </select>
      </div>
    </div>      
  </div>
  <div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên Sản phẩm:</label>
      <input type="text" name="txtName" id="name">
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Tổng Sản phẩm:</label>
    <input type="text" name="txtTotal" id="name">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giá:</label>
    <input type="text" name="txtPrice" id="">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giảm giá (Theo số tiền):</label>
    <input type="text" name="txtDiscount" id="catename">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giảm giá (Theo %):</label>
    <select name="sltDiscount">
      <option value="">----- Chọn % giảm giá -----</option>
       <?php discount_percent($select=0) ;?>  
    </select>
  </div>  
</div>
</div>

<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Hình ảnh:</label>
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

     @for ($i=1;$i<=4;$i++)
       <div class="input-control file" data-role="input">
      <input type="file" name="fProductDetail[]"/>
      <button class="button"><span class="mif-folder"></span></button>
    </div>
    @endfor   


 


 </div>
</div>


<div ></div>
<div class="row cells12">
  <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Mô tả::</label>
      <textarea name="txtDescription">
      </textarea> 
    </div>
  </div>
</div>
<div ></div>

   <div class="row cells12">
    <div class="cell  offset1" style="margin-top: 70px;margin-left:80px">
        <div class="input-control text full-size text info custom_ip" data-role="input">
         <button type="submit" class="button primary">Thêm</button> 
       </div>
     </div>
   </div>



</form>
</div>


@endsection()
