@extends('admin.master')
@section('content')

<div class="grid" >
  <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

    <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Thêm Danh Mục Sản phẩm</h1>  
    <br />
    @include('admin.blocks.error')

    <div class="row cells12">
      <div class="cell colspan5 offset1">
        <div class="input-control text full-size text info custom_ip" data-role="input">
          <label for="" >Tên Danh Mục:</label>
          <input type="text" name="txtCateName" id="catename">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
      </div>
    </div>
    <div></div>
    <div class="row cells12">
      <div class="cell colspan5 offset1">
        <div class="input-control text full-size text info custom_ip" data-role="input">
          <label for="" >Mô tả::</label>
          <textarea name="txtDescription">
          </textarea> 
        </div>
      </div>
    </div>

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
