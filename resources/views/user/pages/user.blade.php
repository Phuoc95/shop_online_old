@extends('user.master');
<div style="margin-bottom:-15px">

</div>
@section('content')
<div style="margin-top:12px">

</div>
<div class="grid bg-white">

  <?php
  $data  = DB::table('users')->find(Auth::user()->id);
            
  ?>
  <div class="cell auto-size " style="margin:20px 10px 0px 200px;padding: 0px 10px 10px;font-weight: bold" >
    @if (Session::has('flash_message'))
    <div class="alert alert-{!! Session:: get('flash_level') !!}" style="color: green;margin:15px">
      {!! Session:: get('flash_message') !!}
    </div>
    @endif
  </div>
  <div class="row cells12 " style="margin-top: 20px">
    <div class="cell colspan8 offset2" >
     <div class="tabcontrol"  data-role="tabcontrol">
      <ul class="tabs">
       <li><a href="#frame_cp">Thay đổi mật khẩu</a></li>
       <li><a href="#frame_ed">Thay đổi liên hệ</a></li>
       <li><a href="#frame_ct">Tài khoản</a></li>
       <li><a href="#frame_st">Tình trạng đơn hàng</a></li>
     </ul>
     <div class="frames">
      {{-- Doi pass--}}
      <div class="frame bg-white" id="frame_cp"> 
        <div class="login-form padding20 block-shadow">
          <form action="{!! route('doimatkhau') !!}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
           <h1 class="text-light align-center ">Thay đổi mật khẩu</h1>            
           <hr class="thin"/>
           <br />
           @include('admin.blocks.error')

           <div class="input-control password full-size" data-role="input">
            <label class="lblInfo">Mật khẩu cũ:</label>
            <input type="password" name="txtOldPassword1">
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
          </div>
          <br />
          <br />
          <div class="input-control password full-size" data-role="input">
            <label class="lblInfo">Mật khẩu mới:</label>
            <input type="password" name="txtNewPassword1">
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
          </div>
          <br />
          <br />
          <div class="input-control password full-size" data-role="input">
            <label class="lblInfo">Xác nhận mật khẩu:</label>
            <input type="password" name="txtRePass1" >
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
          </div>
          <br />
          <br /> 
          <br />
          <button type="submit" class="button primary" > Cập nhật</button>
        </form>
      </div>
    </div>
    {{-- Doi info --}}
    <div class="frame bg-white" id="frame_ed"> 
      <div class="login-form padding20 block-shadow">
       <form action="{!! route('doithongtin') !!}" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
         <h1 class="text-light align-center ">Thay đổi thông tin liên hệ</h1>            
         <hr class="thin"/>
         <br />
         @include('admin.blocks.error')
         <div class="input-control text full-size" data-role="input">
          <label  class="lblInfo">Họ tên:</label>
          <input type="text" name="txtName" value="{!! old('txtName'),isset($data) ? $data->name:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br /><br />

        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Email:</label>
          <input type="email" name="txtEmail" value="{!! old('txtEmail'),isset($data) ? $data->email:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br /><br />        
        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo" >Địa chỉ:</label>
          <input type="text" name="txtAddress"  value="{!! old('txtAddress'),isset($data) ? $data->address:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div> <br /><br />
        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Số điện thoại:</label>
          <input type="text" name="phone" value="{!! old('phone'),isset($data) ? $data->phone:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br /><br />
        <button type="submit" class="button primary" > Cập nhật</button>
      </form>
    </div>
  </div>
  {{-- tai khoan --}}
  <div class="frame bg-white" id="frame_ct"> 
    <div class="for">
      <div class="login-form padding20 block-shadow">
        <form action="" name="frmInfo">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
         <h1 class="text-light align-center">Thông tin tài khoản của bạn</h1>
         <hr class="thin"/>
         <br />
         <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Tên đăng nhập:</label>
          <input type="text" name="txtName" value="{!! isset($data) ? $data->username:null!!}">
          {{-- value="{!! old('transaction_id'),isset($data)? $data['transaction_id']:null !!}" --}}
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />
        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Họ tên:</label>
          <input type="text" name="txtName" value="{!! isset($data) ? $data->name:null!!}">
          {{-- value="{!! old('transaction_id'),isset($data)? $data['transaction_id']:null !!}" --}}
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />
        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Email:</label>
          <input type="text" name="txtEmail" id="" value="{!! isset($data) ? $data->email:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />
        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Địa chỉ:</label>
          <input type="text" name="txtAddress" value="{!! isset($data) ? $data->address:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />

        <div class="input-control text full-size" data-role="input">
          <label class="lblInfo">Số điện thoại:</label>
          <input type="text" name="txtPhone" value="{!! isset($data) ? $data->phone:null!!}">
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
        <br />
        <br />
        <br />

      </form>
    </div>
  </div>
</div>
{{-- Don hang --}}
 <?php
    $transaction = DB::table('transactions')->where('user_id',Auth::user()->id)->get();  
    
        
 ?>

<div  class="frame bg-white" id="frame_st" style="position: relative;left: -100px">
 <div class="row cells12"> 
  <div class="cell colspan12">
   @if (!empty($transaction))
   <table class="table border bordered align-center" style="width: 125%;font-size: 14px;font-family: arial">
    <thead  >
      <tr>
        <th class="align-center">ID Giao dịch</th>      
        {{--   <th class="sortable-column ">Ngày đặt hàng</th> --}}
        <th class="align-center" style="width: 15%">Sản phẩm  </th>
        <th class="sortable-column ">Hình ảnh</th>
        <th class="sortable-column " style="width: 12%">Giá</th>
        <th class="sortable-column " style="width: 10%">Số lượng</th>              
        <th class="sortable-column" style="width: 13%">Thành tiền</th>
        <th class="sortable-column" style="width: 14%">Hình thức</th>
        <th class="sortable-column"  style="width: 12%">Tình trạng</th>  

      </tr>
    </thead>
 
    <tbody>
     @foreach ($transaction as $trans)
     <?php       

     $transaction_id=$trans->id;
     $amount=$trans->amount;
     $payment=$trans->payment;
     $order = DB::table('orders')->where('transaction_id',$transaction_id)->get();
          // echo "<pre>";
          // print_r ($order);
          // echo "</pre>";
          // die();
      // $stt = 1;
     ?>  
     @foreach ($order as $item)
     <tr>
       <td  style="width: 12%">{!! $item->transaction_id!!}</td>
       {{-- <td >{!! $stt++ !!}</td>  --}}   
       <td >{!! $item->product_name!!}</td>          
       <td  style="width: 12%">
         <img src="{{ asset('images/product/'.$item->product_image)  }}" width="90px" height="90px" 
         onerror='this.style.display = "none"'   >
         <img src="{{ asset('images/gadget/'.$item->product_image)  }}" width="90px" height="90px" alt=""
         onerror='this.style.display = "none"'   >           
       </td>
       <td>{!! number_format($item->product_price,0,",","." ) !!} VNĐ</td> 
       <td >{!! $item->product_qty!!}</td> 
       <td>{!! number_format($item->amount*$item->product_qty,0,",","." ) !!} VNĐ</td> 
       <td >
         @if ($payment == 1)
         {!! "Nhận hàng-giao tiền" !!}
         @else {!! "Chuyển khoản" !!}
         @endif
       </td> 

       <td>
         <?php 
               // $Tamount2=$item->product_price;
               // $transaction_id=$transaction->id;
               
                
                   

         if ($payment == 1)
           if($item->status==1)
             echo 'Chờ xác nhận...' ;
           elseif($item->status==2)  echo  'Đã xác nhận-chờ giao hàng' ;
           elseif($item->status==4)  echo  'Giao hàng thành công' ;
           else  echo 'Đơn hàng đã hủy' ;
           elseif ($payment == 2)            
               if($item->status==1)  { ?>
           Chưa thanh toán 
           <?php }
              
           elseif($item->status==2)  echo  'Đã thanh toán -chờ giao hàng' ;
           elseif($item->status==4)  echo  'Giao hàng thành công' ;
           else  echo 'Đơn hàng đã hủy' ;
           ?>

         </td>  
       </tr>

       @endforeach
       <tr>
        <th class="align-center"  colspan="6" > </th> 
        <th class="align-right" style="color: red;font-size: 18px;padding-right: 3%"  colspan="2" >Tổng tiền : 
          {!! number_format($amount,0,",","." ) !!} VNĐ</th> 

        </tr>
        @endforeach
      </tbody>


    </table>
  </div>
</div>


@else 
<span class="tag alert" style="padding:10px 30px;font-size:15px;position: relative;left: 10%"> Không có đơn hàng nào ! </span>;

@endif

</div>


</div>
</div>
</div>
</div>
</div>

@endsection()
