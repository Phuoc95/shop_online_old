@extends('admin.master')
@section('content')

<div class="grid" >
 <form action="{!! route('admin.gadget.getAdd') !!}" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Thêm Phụ Kiện</h1>  
   <br />
   @include('admin.blocks.error')
   <div class="row cells12">
    <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="">Loại phụ kiện:</label>         
        <select name="sltGadgetCate">
          <option value="">----- Chọn tại đây -----</option>

          <?php   cate($gadgetcate,$select=0 )  ;?> 
          
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
    <input type="number" min="0"  name="txtTotal" id="name">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giá:</label>
    <input type="number" min="0"  name="txtPrice" id="">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giảm giá (Theo số tiền):</label>
    <input type="number" min="0"  name="txtDiscount" id="dc_id"  onchange="dc()">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>

<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for=""  >Giảm giá (Theo %):</label>
    <select name="sltDiscount" id="dc_percent_id" onchange="dc_percent()">
      <option value="0">----- Chọn % giảm giá -----</option>
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
  <button type="button" id="addImagesG" class="button primary" style="margin:5px -2px;min-width: 110px">
    Thêm ảnh</button>
    <div id="insert" name="fGadgetDetail[]" > </div>

 {{--     @for ($i=1;$i<=4;$i++)
       <div class="input-control file" data-role="input">
      <input type="file" name="fGadgetDetail[]"/>
      <button class="button"><span class="mif-folder"></span></button>
    </div>
    @endfor   

    --}}



  </div>
</div>


<div ></div>
<div class="row cells12">
  <div class="cell colspan9 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Mô tả::</label>
      <textarea name="txtDescription">
      </textarea> 
      <script type="text/javascript">ckeditor("txtDescription")</script>
    </div>
  </div>
</div>
<div ></div>

<div class="row cells12">
  <div class="cell  offset1" style="margin-top: 310px;margin-left:80px">
    <div class="input-control text full-size text info custom_ip" data-role="input">
     <button type="submit" class="button primary">Thêm</button> 
   </div>
 </div>
</div>

</form>
</div>

@endsection()
