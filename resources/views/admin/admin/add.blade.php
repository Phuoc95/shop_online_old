@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="{!! route('admin.admin.getAdd') !!}" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%" >Thêm thành Viên</h1>  
   <br />
   @include('admin.blocks.error')

   <div class="row cells12">
     <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="" > Họ tên :</label>
        <input type="text" name="txtName" id="name">
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
      </div>
    </div>
  </div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên đăng nhập :</label>
      <input type="text" name="txtUsername" id="name">
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
      <input type="email" name="txtEmail" id="name">
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
  <div class="row cells12">
    <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="">Cấp độ:</label>         
        <select name="sltLevel"
        @if (Auth::user()->id != 1)
           disabled="disabled" 
        @endif >
          <option value="">----- Chọn cấp độ -----</option> 
          <option value="2"> Supper Admin </option>
          <option value="3"> Nhân viên kinh doanh </option>
          <option value="4"> Nhân viên kho</option>
          <option value="5"> Nhân viên giao hàng</option>
        </select>
      </div>
    </div>      
  </div>
  <div ></div>

<div class="row cells12">
<div class="cell  offset1" style="margin-left: 80px" >
    <div class="input-control text full-size text info custom_ip" data-role="input">
     <button type="submit" class="button primary">Thêm</button> 
   </div>
 </div>
</div>



</form>
</div>

  <script type="text/javascript">
  $("div.alert").delay(4500).slideUp();
  </script>
  
@endsection()
