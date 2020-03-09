@extends('admin.master')
@section('topbutton')

<div class="dis_top"> </div>

<h2 class="text-light align-center " style="margin-top:-20px">Danh Sách Đơn Hàng </h2>  
{{-- <a href="{!! URL::route('admin.product.getAdd')!!}" class="bg-lightBlue" style="padding: 10px;color: black">
  <span class="mif-plus fg-white"></span> Thêm mới</a>
  <div class="dis_top"> </div> --}}

  @endsection
  @section('content')

  <table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false" style="font-size: 13.5px">
    <thead>
      <tr class="align-center">
        <th style="width: 6%">STT</th>
        <th style="width: 11%">ID Giao dịch</th> 
        <th style="width: 15%">Sản phẩm</th>
        <th >Hình ảnh</th>
        <th style="width: 8%">Số lượng</th>
        <th style="width: 8%">Giá</th>
        <th style="width: 10%">Thành tiền</th>
        <th style="width: 10%">Trạng thái</th>  

        <th  style="min-width: 12%" >Xử lý</th>           
      </tr>
    </thead>

    <tfoot>
      <tr class="align-center">
        <th style="width: 4%">STT</th>
        <th style="width: 11%">ID Giao dịch</th> 
        <th >Tên</th>
        <th style="width: 10%">Hình ảnh</th>
        <th style="width: 8%">Số lượng</th>
        <th style="width: 12%">Giá</th>
        <th style="width: 13%">Thành tiền</th>
        <th style="width: 14%">Trạng thái</th>

        <th  style="width: 10%" >Xử lý</th>       
      </tr>
    </tfoot>

    <tbody>
      <?php $stt = 1 ;
          // echo "<pre>";
          // print_r ($data);
          // echo "</pre>";
          // die();
      ?>

      @foreach ($data as $item) 
      <tr>
       <td>{!! $stt++ !!}</td>
       <td>{!! $item['transaction_id'] !!}</td>  
       
       <td>{!! $item["product_name"] !!}</td>        
       <td>  <img src="{{ asset('images/gadget/'.$item['product_image'])  }}" width="65px"  onerror='this.style.display = "none"'>
        <img src="{{ asset('images/product/'.$item['product_image'])  }}" width="65px" onerror='this.style.display = "none"'>   </td>
        <td>{!! $item["product_qty"] !!}</td>
        <td>{!! number_format( $item['product_price'],0,",","." ) !!} VNĐ</td>   
        <td>{!! number_format( $item['amount'],0,",","." ) !!} VNĐ </td>

        <td>
         @if ($item["status"] == 1) {!! 'Chờ xác nhận' !!}        
         @elseif ($item["status"] == 2) {!! 'Đã xác nhận-chờ giao hàng' !!}
         @elseif ($item["status"] == 4) {!! 'Giao hàng thành công ! ' !!}
         @else {!! 'Hủy giao hàng' !!}
         @endif </td>  

         <td>

          <span data-role="hint" data-hint="Cập nhật" style="margin:0px 1px">  
            <a href="{!! URL::route('admin.order.getEdit' ,$item['id'])!!}"> <span class="mif-pencil fg-black"></span>  </a>
          </span>

          <span data-role="hint" data-hint="Xóa">  
            <a href="{!! URL::route('admin.order.getDelete' ,$item['id'])!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "> <span class="mif-cancel fg-red"></span>  </a>
          </span>

          

        </td>
      </tr>
      @endforeach

    </tbody>
  </table>





  @endsection()
