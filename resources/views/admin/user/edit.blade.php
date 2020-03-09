@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data" name="frmEdituser">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%">Sửa Khách Hàng</h1>  
   <br />
   @include('admin.blocks.error')


  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Họ tên:</label>
      <input type="text" name="txtName" id="name" 
      value="{!! isset($user)? $user['name']:null !!}"  />
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên đăng nhập :</label>
      <input type="text" name="txtUsername" id="name"
      value="{!! isset($user)? $user['username']:null !!}" >
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Mật khẩu:</label>
    <input type="password" name="txtPassword" id="name">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Xác nhận mật khẩu:</label>
    <input type="password" name="txtRePass" id="name">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Email :</label>
      <input type="email" name="txtEmail" id="name"
      value="{!!isset($user)? $user['email']:null !!}" >
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Địa chỉ :</label>
    <input type="" name="txtAddress" id="name"
      value="{!! isset($user)? $user['address']:null !!}">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
  <label for="" >Số điện thoại :</label>
    <input type="" name="phone" id="name"
      value="{!! isset($user)? $user['phone']:null !!}">
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>

</div>
   <div class="row cells12">
    <div class="cell  offset1" style="margin-left:71px">
        <div class="input-control text full-size text info custom_ip" data-role="input">
         <button type="submit" class="button primary">Sửa</button> 
       </div>
     </div>
   </div>



</form>
</div>


@endsection()
