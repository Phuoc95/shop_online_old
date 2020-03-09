<!DOCTYPE html>
<html  lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ShopOnline</title>
  <link rel="stylesheet" href="">

  <link href="{{ url('user/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/clock.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/docs.css') }}" rel="stylesheet"> 
  <link href="{{ url('user/metro/css/docs_New.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-colors.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-icons.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-rtl.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-schemes.css') }}" rel="stylesheet"> 


  <link href="{{ url('user/metro/css/style.css') }}" rel="stylesheet">


  <script src="{{ url('user/metro/js/moment.js') }}"></script> 
  <script src="{{ url('user/metro/js/docs.js') }}"></script>
  <script src="{{ url('user/metro/js/ga.js') }}"></script>
  <script src="{{ url('user/metro/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('user/metro/js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{ url('user/metro/js/metro.js') }}"></script>
  <script src="{{ url('user/metro/js/select2.min.js') }}"></script>  
  <script src="{{ url('user/metro/js/prettify/run_prettify.js') }}"></script>
{{--   <script src="{!!url('admin/js/myscript.js') !!}"></script> --}}


</head>



 <div id="content">

   @yield('content')

 </div>  <!--content End -->



</html>