@extends('admin.master')
@section('content')

<div class="grid" >
  <form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">    

    <h1 class="text-light align-left" style="margin-bottom:30px;position: relative;left: 8%" >Sửa Loại Phụ Kiện </h1>  
    <br />
    @include('admin.blocks.error')

    <div class="row cells12">
      <div class="cell colspan5 offset1">
        <div class="input-control text full-size text info custom_ip" data-role="input">
          <label for="" >Loại phụ kiện </label>
          <input type="text" name="txtGadgetCateName" id="catename"
          value="{!! isset($data)? $data['name'] :null !!}">       
          <button class="button helper-button clear"><span class="mif-cross"></span></button>
        </div>
      </div>
    </div>
    <div></div>
    <div class="row cells12">
      <div class="cell colspan5 offset1">
        <div class="input-control text full-size text info custom_ip" data-role="input">
          <label for="" >Mô tả::</label>
          <textarea name="txtDescription">
          {!! isset($data)? $data['description'] :null !!}
          </textarea> 
           {{--  <script type="text/javascript">ckeditor("txtDescription")</script> --}}
        </div>
      </div>
    </div>

    <div class="row cells12">
    <div class="cell  offset1" style="margin-top:50px;margin-left:70px">
        <div class="input-control text full-size text info custom_ip" data-role="input">
         <button type="submit" class="button primary">Sửa</button> 
       </div>
     </div>
   </div>
   


 </form>
</div>


@endsection()
