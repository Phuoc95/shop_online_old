@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="{!! route('admin.slide.getAdd') !!}" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Thêm Ảnh Slide</h1>  
   <br />
   @include('admin.blocks.error')

   <div class="row cells12">
     <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="" >Tên Slide:</label>
        <input type="text" name="txtName" id="name">
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
      </div>
    </div>
  </div>

 {{--  <div class="row cells12">
   <div class="cell colspan11 offset1">

     <label for="" >Thêm ảnh:</label> <br>

   </div>
 </div>
 <div class="row cells12">
  <div class="cell"></div>
  <button type="button" id="addImages" class="button primary" style="margin:5px 10px;min-width: 110px">
    Thêm ảnh</button>
    <div id="insert_slide" name="fSlide[]" > </div>
  </div>
 --}}
 <div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Thêm ảnh:</label>
    <div class="input-control file" data-role="input">
      <input type="file" name="fImages" id="">
      <button class="button"><span class="mif-folder"></span></button>
    </div>
  </div>  
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






