@extends('admin.master')
@section('topbutton')

<div class="dis_top"> </div>
 <h1 class="text-light align-center ">Danh sách Slide</h1>  
<a href="{!! route('admin.slide.getAdd')!!}" class="bg-lightBlue" style="padding: 10px;color: black">
  <span class="mif-plus fg-white"></span> Thêm mới</a>
  <div class="dis_top"> </div>

  @endsection
  @section('content')

  <table id="example_table" class="dataTable striped border bordered" data-role="datatable" data-searching="true" data-auto-width="false">
    <thead>
      <tr class="align-center">
        <th>STT</th>
        <th >Tên</th>
        <th style="width: 14%">Hình ảnh</th>
        <th >Mô tả</th> 
        <th >Xử lý</th>           
      </tr>
    </thead>

    <tfoot>
      <tr class="align-center">
        <th>STT</th>
        <th >Tên</th>
        <th style="width: 14%">Hình ảnh</th>
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
       <td>  <img src="{{ asset('images/slide/'.$item['image'])  }}" width="90px" height="90px" alt="">
       </td>
       <td>{!! $item["description"] !!}</td>    
       <td>

        <span data-role="hint" data-hint="Sửa" style="margin:0px 1px">  
          <a href="{!! URL::route('admin.slide.getEdit' ,$item['id'])!!}"> <span class="mif-pencil fg-black"></span>  </a>
        </span>

        <span data-role="hint" data-hint="Xóa">  
          <a href="{!! URL::route('admin.slide.getDelete' ,$item['id'])!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không ?') "> <span class="mif-cancel fg-red"></span>  </a>
        </span>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>





@endsection()
