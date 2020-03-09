@extends('admin.master')
@section('topbutton')

<div class="dis_top"> </div>
<h2 class="text-light align-center " style="margin-top: -20px">Danh Sách Giao Dịch</h2>  
{{-- <a href="{!! URL::route('admin.product.getAdd')!!}" class="bg-lightBlue" style="padding: 10px;color: black">
  <span class="mif-plus fg-white"></span> Thêm mới</a> 
  <div class="dis_top"> </div> --}}

  @endsection
  @section('content')

  <table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false" style="font-size: 13px">
    <thead>
      <tr class="align-center" >
        <th style="width: 7%">STT</th>
        <th style="width: 14%;font-size: 13px">ID Giao dịch</th> 
        <th>Khách hàng</th>
        <th style="width: 5%">Email</th>
        <th style="width: 10%">Điện thoại</th>  
        <th style="width: 11%">Địa chỉ</th>  
        <th style="width: 14%">Hình thức</th>
        <th style="width: 12%">Số tiền</th> 
        <th style="width: 15%;">Trạng thái</th> 
        <th  style="width: 12%" >Xử lý</th>           
      </tr>
    </thead>

    <tfoot>
      <tr class="align-center">
        <th style="width: 7%">STT</th>
        <th style="width: 13%;font-size: 14px">ID Giao dịch</th> 
        <th>Khách hàng</th>
        <th style="width: 5%">Email</th>
        <th style="width: 10%">Điện thoại</th>  
        <th style="width: 11%">Địa chỉ</th>  
        <th style="width: 14%">Hình thức</th>
        <th style="width: 12%">Số tiền</th> 
        <th style="width: 15%">Trạng thái</th> 
        <th  style="width: 12%" >Xử lý</th>           
      </tr>
    </tfoot> 

    <tbody>
      <?php $stt = 1 ?>
      @foreach ($data as $item)
      <tr>
       <td>{!! $stt++ !!}</td>
       <td>{!! $item["id"] !!}</td> 
       <td>{!! $item["user_name"] !!}</td> 
       <td>{!! $item["user_email"] !!}</td>
       <td>{!! $item["user_phone"] !!}</td>
       <td>{!! $item["user_address"] !!}</td> 
       <td > @if ($item["payment"] == 1)
         {!! 'Nhận hàng-giao tiền' !!}
         @else {!! 'Chuyển khoản' !!}
         @endif
       </td> 
       <td >{!! number_format( $item['amount'],0,",","." ) !!} VNĐ</td>
       <td style="font-size: 13.5px"> 
         @if ($item["status"] == 1)
         {!! 'Chờ xác nhận thanh toán' !!}
         @else {!! 'Đã xác nhận thanh toán' !!}
         @endif
       </td>

       <td> 
        <span data-role="hint" data-hint="Cập nhật" style="margin:0px 1px">  
          <a href="{!! URL::route('admin.transaction.getEdit' ,$item['id'])!!}"> <span class="mif-pencil fg-black"></span>  </a>
        </span>

        <span data-role="hint" data-hint="Xóa">  
          <a href="{!! URL::route('admin.transaction.getDelete' ,$item['id'])!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "> <span class="mif-cancel fg-red"></span>  </a>
        </span>

        <span data-role="hint" data-hint="Xuất hóa đơn " style="padding: 0px 2px">  
          <a href="{!! URL::route('admin.transaction.receipt' ,$item['id'])!!}" > <span class="mif-map fg-blue"></span>  </a>
        </span>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>





@endsection()
