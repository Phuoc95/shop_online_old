@extends('admin.master')
@section('topbutton')

<div class="dis_top"> </div>
 <h1 class="text-light align-center ">Danh sách Khách Hàng</h1>  
<a href="{!! URL::route('admin.user.getAdd')!!}" class="bg-lightBlue" style="padding: 10px;color: black">
  <span class="mif-plus fg-white"></span> Thêm mới</a>
  <div class="dis_top"> </div>

  @endsection
  @section('content')

  <table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false">
    <thead>
      <tr class="align-center">
        <th>STT</th>
        <th >Họ tên</th>
        <th style="width: 12%">Tên đăng nhập</th>
        <th style="width: 10%">Email</th>
        <th style="width: 20%">Địa chỉ</th> 
        <th style="width: 12%">Số điện thoại</th>        
        <th style="width: 10%">Xử lý</th>           
      </tr>
    </thead>

    <tfoot>
      <tr class="align-center">
       <th>STT</th>
        <th >Họ tên</th>
        <th style="width: 12%">Tên đăng nhập</th>
        <th style="width: 10%">Email</th>
        <th style="width: 20%">Địa chỉ</th> 
        <th style="width: 12%">Số điện thoại</th>        
        <th style="width: 10%">Xử lý</th>        
      </tr>
    </tfoot>

    <tbody>
      <?php $stt = 1 ?>
      @foreach ($user as $item)
      <tr>
        <td>{!! $stt++ !!}</td>
        <td>{!! $item["name"] !!}</td>
        <td>{!! $item["username"] !!}</td> 
        <td>{!! $item["email"] !!}</td>
        <td>{!! $item["address"] !!}</td>
        <td>{!! $item["phone"] !!}</td>

        <td>

          <span data-role="hint" data-hint="Sửa" style="margin:0px 1px">  
            <a href="{!! URL::route('admin.user.getEdit' ,$item['id'])!!}"> <span class="mif-pencil fg-black"></span>  </a>
          </span>

          <span data-role="hint" data-hint="Xóa">  
            <a href="{!! URL::route('admin.user.getDelete' ,$item['id'])!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "> <span class="mif-cancel fg-red"></span>  </a>
          </span>

        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

  @endsection()
