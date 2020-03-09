<!DOCTYPE html>
<html  lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Stores</title>
  <link rel="icon" href="{!! url('images/iconad.jpg')!!}" />
  <link href="{{ url('admin/metro/css/metro.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-icons.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/docs.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/clock.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-colors.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-rtl.css') }}" rel="stylesheet">
  <link href="{{ url('admin/metro/css/metro-schemes.css') }}" rel="stylesheet"> 
  <link href="{!!url('admin/css/cloud-zoom.css') !!}" rel="stylesheet"> 
  <link href="{{ url('css/style.css') }}" rel="stylesheet">

  <script src="{{ url('admin/metro/js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{ url('admin/metro/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('admin/metro/js/metro.js') }}"></script>
  <script src="{{ url('admin/metro/js/docs.js') }}"></script>
  <script src="{{ url('admin/metro/js/prettify/run_prettify.js') }}"></script>
  <script src="{{ url('admin/metro/js/ga.js') }}"></script>
  <script src="{{ url('admin/metro/js/select2.min.js') }}"></script> 

  {{--Nhung Ckeditor vs ckfinder --}}
  {{-- Phai Nhung vao the Head vi thuoc JSckeditor --}}
  <script src="{{ url('admin/js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ url('admin/js/ckfinder/ckfinder.js') }}"></script>

  <script type='text/javascript'>
   var  baseURL = "{!! url('/') !!}";   
 </script>
 <script src="{{ url('admin/js/func_ckfinder.js') }}"></script>
 {{-- End Nhung Ckeditor vs ckfinder --}}


 <style type="text/css" media="screen">
  .tt_lable{color:#0072c6;}  
  .custom_ip{
    padding-top:3px;
  }
  .dis_top{
    margin:20px
  }
</style>
<script type="text/javascript">
  function dc()
  {     
      // document.getElementById("dc_percent_id").setAttribute("disabled", "disabled");      
      document.getElementById("dc_percent_id").value = "0";
    }

    function dc_percent()
    {     
      // document.getElementById("dc_id").setAttribute("disabled", "disabled");    
      document.getElementById("dc_id").value = "0";
      
   }
</script>
<script>
    $(function(){
//$('#example_table').dataTable();
});
</script>

</head>
<body  style="background: #3D3D3D;font-family: Arial">
  @include('admin.blocks.nav') 


  <div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
      <div class="row" style="height: 100%">
       
        @include('admin.blocks.slidebar') 
        
        <div class="cell auto-size padding20 bg-white" id="cell-content">  

          <div class="cell auto-size " style="margin:0px 10px 10px;padding: 0px 10px 10px;font-weight: bold" >
            @if (Session::has('flash_message'))
            <div class="alert alert-{!! Session:: get('flash_level') !!}" style="color: green;margin:15px">
              {!! Session:: get('flash_message') !!}
            </div>
            @endif
          </div>

          @yield('topbutton')                

          @yield('content')


        </div>

      </div>
    </div>
  </div>



  <script src="{{ url('admin/js/myscript.js') }}"></script> 
</body>
</html>