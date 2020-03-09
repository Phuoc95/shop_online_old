@extends('admin.master')
@section('content')


<div class="grid" >
 <form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

   <h1 class="text-light align-left "  style="margin: -5px 0px 30px 90px">Cập nhật đơn hàng</h1>  
   <br />
   @include('admin.blocks.error')

   <div class="row cells12">
     <div class="cell colspan5 offset1">
      <div class="input-control text full-size text info custom_ip" data-role="input">
        <label for="" >ID Giao dịch:</label>
        <input type="text" name="transaction_id" id="name" disabled
        value="{!! isset($data)? $data['transaction_id']:null !!}"  />
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
      </div>
    </div>
  </div>
  <div ></div>
  <div class="row cells12">
   <div class="cell colspan5 offset1">
    <div class="input-control text full-size text info custom_ip" data-role="input">
      <label for="" >Tên:</label>
      <input type="text" name="product_name" id="name" disabled
      value="{!! isset($data)? $data['product_name']:null !!}"  />
      <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
  </div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Số lượng:</label>
    <input type="text" name="product_qty" disabled
    value="{!! isset($data)? $data['product_qty']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Giá:</label>
    <input type="text" name="product_price" id="name" disabled
    value="{!! isset($data)? $data['product_price']:null !!}"  />
    <button class="button helper-button clear"><span class="mif-cross"></span></button>
  </div>
</div>
</div>
<div ></div>
<div class="row cells12">
 <div class="cell colspan5 offset1">
  <div class="input-control text full-size text info custom_ip" data-role="input">
    <label for="" >Thành tiền:</label>
    <input type="text" name="amount" id="name" disabled
    value="{!! isset($data)? $data['amount']:null !!}"  />
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
    <option value="1"  <?php if($data['status']==1) echo 'selected';  ?> >_Chờ xác nhận...</option>
    
    <option value="2"  <?php if($data['status']==2) echo 'selected';  ?> >_Đã xác nhận , chờ nhận hàng.</option>
    <option value="4"  <?php if($data['status']==4) echo 'selected';  ?> >_Giao hàng thành công.</option> 
    <option value="5"  <?php if($data['status']==5) echo 'selected';  ?> >_Hủy giao hàng.</option>
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
