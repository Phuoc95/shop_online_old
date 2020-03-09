  <head>
    <title>Hóa đơn</title>
    <style type="text/css" media="print" rel="stylesheet">
      body{
        background: none !important;
      }
      #dvin{
        margin-top:80px !important;
      }
      .backg{
        padding-top:50px !important;
      }
      #divin{
        display: none;
      }
    </style>
    <style type="text/css">
      .nutin{
       height:44px;
       line-height:44px;
       
       width:70px;
       background:#00BCD4;
       border:0px;
       outline:none;
       margin:3px;
       cursor:pointer;
       color:#fff;
     }
     .nutin:hover,.nuttin:active,.nutin:focus{color: black;
      font-weight:bold;
      
    }
    </style>
    <script type="text/javascript">
     function andivtop(){
      document.getElementById('menutopa').style.display = "none";
      document.getElementById('noop-top').style.display = "none";
    }
    andivtop();
  </script>
</head>
<body class="backg" style='background-image:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjNDAzYzNmIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNCA0Wk00IDBMMCA0WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxZTI5MmQiPjwvcGF0aD4KPC9zdmc+"'>
  <div style="background:#fff;width:1000px;height:650px;margin:auto;margin-top:10px;border:1px solid #000;" id="dvin">

    <div style="width:1000px;height:40px;padding:10px 0px;margin-top:20px;">
     <div style="width:500px;float:left;text-align:center;font-weight:bold;">
      <span style="font-weight:bold;">Công ty TNHH Thành An</span><br/>
      <span style="border-bottom:1px solid #333;">Chuyên kinh doanh Điện thoại di dộng</span> <br/>

    </div>
              
             </div>

             <div style="width:1000px;height:auto;padding:10px 0px;">
               <div style="width:500px;float:left;">
               	<span style="margin-left:80px;">Địa chỉ :   {!! $addr['address']!!}</span>
               </div>

             </div>
             <div style="width:1000px;height:auto;padding:10px 0px;text-align:center;margin-top:30px;font-size:20px;font-weight:bold;">
               HÓA ĐƠN MUA HÀNG
             </div>

             <div style="width:1000px;height:auto;padding:10px 0px;padding-left:50px;">
               <table style="line-height:35px;">
                 <tr>
                   <td>
                    <span style="font-weight:bold;">  HỌ TÊN KHÁCH HÀNG  </span></td>
                    <td>
                  <?php echo  ' <span style = "font-weight:bold;padding:10px"> : </span>   '.mb_strtoupper($transaction['user_name'] ,"utf8" ); ?> </td> 
                  </tr>
                    <tr>
                   <td>
                    <span style="font-weight:bold;">  ĐỊA CHỈ </span></td>
                    <td>
                      <?php echo  ' <span style = "font-weight:bold;padding:10px"> : </span>   '.mb_strtoupper( $transaction['user_address'],"utf8"); ?> </td> 
                  </tr>
                    <tr>
                   <td>
                    <span style="font-weight:bold;">  SỐ ĐIỆN THOẠI </span></td>
                    <td>  <?php echo ' <span style = "font-weight:bold;padding:10px"> : </span>   '. strtoupper( $transaction['user_phone']); ?> </td> 
                  </tr>
                  <tr>
                   <td>
                    <span style="font-weight:bold;">CHI TIẾT :</span></td>

                  </tr>
                </table>
                <table style="line-height:28px;border-collapse:collapse;border:1px solid #999;width:900px;" border="1" > 
                 <tr style="line-height:35px;">
                   <th style="padding:5px 10px;">
                    STT
                  </th>
                  <th style="padding:5px 10px;">
                   Sản phẩm
                 </th>
                 <th style="padding:5px 10px;">
                  Giá 
                </th>
                <th style="padding:5px 10px;">
                  Số lượng 
                </th>
                <th style="padding:5px 10px;">
                 Thành tiền
               </th>
             </tr>

             <?php  $stt=1 ?>
             @foreach ($data as $order)

             <tr>
               <td style="text-align: center;">
                <?php  echo $stt++ ?>
              </td>

              <td style="text-align:left;line-height:35px">
               <span style="margin-left: 10px"> {!! $order['product_name'] !!}</span>  
             </td>
             <td style="text-align:center;line-height:35px">
              {!! $order['product_price'] !!}
            </td>
            <td style="text-align:center;line-height:35px;">
              {!! $order['product_qty'] !!}
            </td>
            <td style="text-align:center;line-height:35px;">
              {!!  number_format( $order['amount'] ,0,',','.') .' VNĐ'  !!}
            </td>

          </tr>
          @endforeach
          
          <table style="margin-top: 10px">
            <thead>
              <tr>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr   >
                <td colspan="3" >
                  <span style="margin-left:650px;font-weight: bold;font-size: 20px">Tổng tiền : </span>
                </td>
                <td>
                  <span colspan="2" style="margin-left:5px ;font-weight: bold;font-size: 20px">
                    {!! number_format( $transaction['amount'],0,',','.') .' VNĐ'  !!}
                  </span>
                </td>

              </tr>
            </tbody>
          </table>

          <table>
          </div>
          <div style="width:1000px;height:auto;padding:10px 0px;margin-top: 20px">
            <div style="width: 630px;float:left;margin-left: 25px">
              <span style="font-weight: bold;font-size: 20px">Nhân viên giao hàng </span><br>
              <span style="font-size: 20px;margin-left: 40px">Ký tên</span>
              <br><br><br><br>

            {{--   <span style="font-weight: bold">Nguyễn Thành Tiến</span> --}}

            </div>
            <div style="background: blue;width: 250px;">

            </div>
            <span style="font-weight: bold;font-size: 20px;margin-left: 60px">Khách hàng </span><br>
            <span style="font-size: 20px;margin-left: 80px">Ký tên</span>
            <br><br><br><br>

            <span style="font-weight: bold"></span>

          </div>

        </div>
        <div style="height:50px;min-width:90px;position:absolute;bottom:100px;right:0px;z-index:99999;transition:all 1s;"
        id="divin">
        <button class="nutin" style="background:#00BCD4" onclick="print()"> In </button>
      </div>

      <div style="height:50px;min-width:90px;position:absolute;bottom:30px;right:0px;background:#;z-index:99999;transition:all 1s;"
      id="divin">

      <a href="{!! URL::to('admin/transaction/list') !!}"> <button type="" class="nutin"  style="background:#8BC34A;" >Quay lại</button></a>
    </div>

    <script>
      
     function andivan(){
       document.getElementById('divin').style.display = "none";
     }
     function hienda(){
       document.getElementById('menutopa').style.display = "block";
       document.getElementById('noop-top').style.display = "block";
     }       
   </script>


 </body>