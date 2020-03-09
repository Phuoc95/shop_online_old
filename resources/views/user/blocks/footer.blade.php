
<div class="grid bg-white" style="margin:-4px 0px -2px 0px" >
  <div class="row cells12">
    <div class="cell colspan3 offset1">
      <h5>THEO DÕI CHÚNG TÔI</h5>
      <div class="fb-page" data-href="https://www.facebook.com/FanpageTest-1906362872980355" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/FanpageTest-1906362872980355" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FanpageTest-1906362872980355">FanpageTest</a></blockquote></div>
    </div>
    <div class="cell colspan3 offset1">
      <h5 >THÔNG TIN CHUNG</h5>   
      <div>
        <ul class="simple-list" style="font-weight: bold;color: black">
          <li><a href="#" title="">Giới thiệu</a></li>
          <li><a href="#" title="">Chính sách - Quy định chung</a></li>
          <li><a href="#" title="">Chính sách bảo mật thông tin</a></li>
          <li><a href="#" title="">Chính sách Bảo hành - Đổi trả</a></li>
        </ul>       
      </div>     
    </div>
    <div class="cell colspan3 offset1">
      <?php
      $data = DB::table('contacts')->OrderBy('id','DESC')->first();
      ?>
      <h5 >THÔNG TIN LIÊN HỆ</h5>   
      <div data-text="addr">        
        <address>
          <strong>Địa chỉ</strong> :  {!! $data->address!!}
          <p><strong>Email</strong> : <a href="mailto: {!! $data->email!!} ">lienhe@gmail.com</a></p> 
          <abbr title="Phone">Hotline:</abbr> {!! $data->hotline!!}                        
        </address>
      </div>
    </div>
  </div>
</div>
<div class="grid" style="padding:5px;text-align: center;color:white" >
  <div class="row">
    <p>Copyright © 2017 by Duy Phước . All rights reserved </p>    
  </div>
</div>
