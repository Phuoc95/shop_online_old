<div class="app-bar fixed-top" data-role="appbar">
    <a style="margin: 0px 34px;background-color:#0072C6 " class="app-bar-element branding" 
    href="{!! URL::to('/')!!}">Online Stores </a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li style="padding: 0px 5px" ><a href=""> Chào {!! Auth::user()->name!!} </a></li> 
        <span class="app-bar-divider"></span>
        <li  style="padding: 0px 10px"><a href="">Giới thiệu thêm </a></li> 
        <span class="app-bar-divider"></span>  



    </ul>

    <div class="app-bar-element place-right">
        <span class="dropdown-toggle"><span class="mif-cog"></span> Hệ thống</span>
        <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 145px">

            <ul class="unstyled-list fg-dark">              
                <li><a href="" class="fg-white2 fg-hover-yellow">Trợ giúp</a></li>
                <li><a href="{!!URL::to('auth/logout')!!}" class="fg-white3 fg-hover-yellow">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</div>


<style type="text/css" media="screen">
    .app-bar .app-bar-element.branding {
        padding-left: 0.5rem;
        padding-right: 1rem;
    }
</style>
