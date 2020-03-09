@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left "  style="margin: -5px 0px 30px 90px">Cập Nhật Giao Dịch</h1>  
   <br />
   @include('admin.blocks.error')

   <div class="row cells12">
     <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="" >Khách hàng:</label>
        <input type="text" name="user_name" id="name" 
          value="{!! isset($data)? $data['user_name']:null !!}"  />
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
      </div>
    </div>
  </div>
  <div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Email:</label>
      <input type="text" name="user_email" id="name" 
      value="{!! isset($data)? $data['user_email']:null !!}"  />
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Số điện thoại:</label>
    <input type="text" name="user_phone" 
    value="{!! isset($data)? $data['user_phone']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Địa chỉ:</label>
    <input type="text" name="user_address" id="name" 
    value="{!! isset($data)? $data['user_address']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Hình thức:</label>
    <label class="input-control radio" style="margin-top: 15px">
      <input type="radio" name="payment" value="1"  disabled
      <?php if($data['payment']==1) echo 'checked';  ?> >
      <span class="check"></span>
      <span class="caption" style="font-weight: bold;color: black">Nhận hàng-giao tiền</span>                    
    </label>
     
       <label class="input-control radio" style="margin:50px 0px">
      <input type="radio" name="payment" value="2" disabled
      <?php if($data['payment']==2) echo 'checked';  ?> >
      <span class="check"></span>
      <span class="caption" style="font-weight:bold;color: black">Chuyển khoản</span>                    
    </label>   
  </div>
</div>
</div>
<div ></div> 
<div class="row cells12"  style="margin:50px 0px 20px">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label >Số tiền:</label>
    <input type="text" name="amount" id="name" disabled
    value="{!! old('amount'),isset($data)? $data['amount']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>  
<div class="row cells12">
  <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="">Trạng thái:</label>         
      <select name="status">
     
        <option value="1"  <?php if($data['status']==1) echo 'selected';  ?> >_Chờ xác nhận thanh toán.</option>
        <option value="2"  <?php if($data['status']==2) echo 'selected';  ?> >_Đã xác nhận thanh toán.</option> 
      </select>
    </div>
  </div>      
</div>
<div ></div>



</div>
<div class="row cells12">
 <div class="cell colspan2 " style="margin-top: 20px;margin-left:15px">
    <div class="input-control text full-size text info custom_ip" data-role="input">
     <button type="submit" class="button primary">Cập nhật</button> 
   </div>
 </div>
</div>



</form>
</div>


@endsection()
