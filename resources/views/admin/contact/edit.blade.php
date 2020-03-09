@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Sửa Liên Hệ</h1>  
   <br />
   @include('admin.blocks.error')

   <div class="row cells12">
     <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="" >Địa chỉ:</label>
        <input type="text" name="txtAddress"
        value="{!! old('txtAddress') ,isset($contact)? $contact['address']:null !!}">
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
      </div>
    </div>
  </div>

  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Email:</label>
      <input type="email" name="txtEmail"
      value="{!! isset($contact)? $contact['email']:null !!}">
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>

<div ></div> 

<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Hotline:</label>
    <input type="text" name="txtHotline" value="{!! isset($contact)? $contact['hotline']:null !!}">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>

<div class="row cells12">
  <div class="cell  offset1" style="margin-top: 10px;margin-left:80px">
    <div class="input-control text full-size text info custom_ip" data-role="input">
     <button type="submit" class="button primary">Sửa</button> 
   </div>
 </div>
</div>



</form>
</div>


@endsection()






