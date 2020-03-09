@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data" name="frmEditGadget">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Sửa Phụ Kiện</h1>  
   <br />
   @include('admin.blocks.error')
   <div class="row cells12">
    <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="">Loại phụ kiện:</label>         
        <select name="sltGadgetCate">
          <option value="">----- Chọn tại đây -----</option>        
          <?php   cate($gadgetcate,$select= $gadget["gadgetcate_id"] )  ;?>           
        </select>
      </div>
    </div>      
  </div>
  <div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên phụ kiện:</label>
      <input type="text" name="txtName" id="name" 
        value="{!! isset($gadget)? $gadget['name']:null !!}">
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Tổng Sản phẩm:</label>
    <input type="number" min="0"  name="txtTotal" id="name"
     value="{!! isset($gadget)? $gadget['total']:null !!}">
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
     value="{!! isset($gadget)? $gadget['price']:null !!}">
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
     value="{!! isset($gadget)? $gadget['discount']:null !!}">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>  
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label >Giảm giá (Theo %):</label>
    <select name="sltDiscount"  id="dc_percent_id"  onchange="dc_percent()" >
      <option value="0">----- Chọn % giảm giá -----</option>
       <?php discount_percent($select=$gadget['discount_percent']) ;?>  
    </select>
  </div>  
</div>
</div>

<div class="row cells12">
 <div class="cell colspan5 offset1">

   <label for="" >Ảnh hiện tại:</label>
   <img src="{{ asset('images/gadget/'.$gadget['image'])  }}" width="90px" height="90px" alt="">
   <input type="hidden" name="img_current" value="{!!$gadget['image']!!}">


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
  @foreach ($gadget_image as $key => $item)
  <div class="cell" id="{!! $key !!}"  >
    <div class="image-container" data-format="square" > 
     <div class="frame">
       <img src="{{ asset('images/gadget/detail/'.$item['image'])  }}" class="img_detail" idHinh="{!! $item['id'] !!}" id="{!! $key !!}" style="max-width: 100px"/>
     </div>
   </div>

   
   <span data-role="hint" data-hint="Xóa">  
    <a href="javascript:void(0)" type="button" id="del_img_gadget" > <span class="mif-cancel fg-red asd"></span>  </a>
  </span></a>
</div> 
@endforeach

<button type="button" id="addImages" class="button primary" style="margin:5px 10px;min-width: 110px">
Thêm ảnh</button>
<div id="insert" name="fGadgetDetail[]" > </div>
</div>


<div ></div>

<div ></div>
<div class="row cells12">
  <div class="cell colspan9 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Mô tả::</label>
      <textarea name="txtDescription">
         {!! isset($gadget)? $gadget['description']:null !!}
      </textarea> 
        <script type="text/javascript">ckeditor("txtDescription")</script>
    </div>
  </div>
</div>
<div ></div>

   <div class="row cells12">
    <div class="cell  offset1" style="margin-top: 310px;margin-left:80px">
        <div class="input-control text full-size text info custom_ip" data-role="input">
         <button type="submit" class="button primary">Sửa</button> 
       </div>
     </div>
   </div>



</form>
</div>


@endsection()
