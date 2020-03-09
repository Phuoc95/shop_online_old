@extends('admin.master')
@section('topbutton')
<?php function _substr($str, $length, $minword = 3)
{$sub = '';$len = 0;
foreach (explode(' ', $str) as $word)
{
    $part = (($sub != '') ? ' ' : '') . $word;
    $sub .= $part;
    $len += strlen($part);
    if (strlen($word) > $minword && strlen($sub) >= $length)
    {
      break;
    }
 }
    return $sub . (($len < strlen($str)) ? '...' : '');
} ?>


 <h2 class="text-light align-center " style="margin-top:-20px">Danh sách Phụ Kiện</h2>  
<a href="{!! URL::route('admin.gadget.getAdd')!!}" class="bg-lightBlue" style="padding: 10px;color: black">
  <span class="mif-plus fg-white"></span> Thêm mới</a>
  <div class="dis_top"> </div>

  @endsection
  @section('content')

  <table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false">
    <thead>
      <tr class="align-center">
        <th style="width: 6%">STT</th>
        <th style="width: 10%">Tên</th>
        <th style="width: 14%">Thuộc loại</th>
        <th style="width: 12%">Giá</th>
        <th style="width: 11%">Giảm giá</th> 
        <th style="width: 9%">Hình ảnh</th>           
        <th style="width: 8.5%">Tổng SP</th>
        <th style="width: 8%">Đã bán</th>
        <th >Mô tả</th> 
        <th  style="width: 6%" >Xử lý</th>           
      </tr>
    </thead>

    <tfoot>
      <tr class="align-center">
        <th>STT</th>
        <th style="width: 10%">Tên</th>
        <th style="width: 14%">Thuộc loại</th>
        <th style="width: 12%">Giá</th>
        <th style="width: 9%">Hình ảnh</th>
        <th style="width: 11%">Giảm giá</th>      
        <th style="width: 8%">Tổng SP</th>
        <th style="width: 8%">Đã bán</th>
        <th >Mô tả</th> 
        <th >Xử lý</th>      
      </tr>
    </tfoot>

    <tbody>
      <?php $stt = 1 ?>
      @foreach ($data as $item)
      <tr>
       <td>{!! $stt++ !!}</td>
       <td>{!! $item["name"] !!}</td> 
       <td>
         <?php $gadgetcate =DB::table('gadget_cates')->where('id',$item["gadgetcate_id"])->first() ;?> 
         @if (!empty($gadgetcate->name))
         {!! $gadgetcate->name !!}
         @endif
       </td>
       <td>{!! number_format( $item['price'],0,",","." ) !!} VNĐ</td>
       <td><?php
         if( $item["discount"]  != NULL )
          echo   number_format( $item["discount"],0,",","." ).' VNĐ' ;
        elseif ( $item["discount_percent"]  != NULL )
         list_discount_percent($item["discount_percent"]);
       else
         echo "Không";
       ?>  </td>
       <td>  <img src="{{ asset('images/gadget/'.$item['image'])  }}" width="70px" style="margin: -2px 6%">
       </td>

       <td>{!! $item["total"] !!}</td>
       <td>{!! $item["buyed"] !!}</td>
       <td style="font-size: 13.5px">

         @if ((int)strlen($item["description"]) > 60 )
         {!! _substr($item["description"],60) !!}
          <br>
         <button onclick="showDialog('#{!!$item["id"]!!}')" class="button" 
         style="height: 25px;margin-bottom: -5px">Xem thêm</button>

          <div id="{!! $item["id"]!!}" data-role="dialog" class="Dialog" data-close-button="true" data-width="60%" 
        style="padding: 15px ;overflow: scroll;"  data-height="60%">
         {!! $item['description']!!}
       </div>
        
         @else {!! $item["description"] !!}
         @endif

       </td>    
       <td>

        <span data-role="hint" data-hint="Sửa" style="margin:0px 1px">  
          <a href="{!! URL::route('admin.gadget.getEdit' ,$item['id'])!!}"> <span class="mif-pencil fg-black"></span>  </a>
        </span>

        <span data-role="hint" data-hint="Xóa">  
          <a href="{!! URL::route('admin.gadget.getDelete' ,$item['id'])!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "> <span class="mif-cancel fg-red"></span>  </a>
        </span>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>

<script>
function showDialog(id){
    var dialog = $(id).data('dialog');
    dialog.open();
}
</script>



@endsection()
