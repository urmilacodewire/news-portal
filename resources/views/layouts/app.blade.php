<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    @include('layouts.topbar')
        @include('layouts.menus')
            <!-- <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div> -->
            <div class="main_padding">
                 <div class="highlighted_banner">
                     <div class="container"> 
                         <div class="row main_row">  
                         @include('layouts.rightbar')
                            <div class="col-sm-9 clearfix">
                                @yield('content')
                             </div>  
                         </div>  
                     </div>  
                 </div>        
            </div>   
    @include('layouts.footer')
    @include('layouts.script')
        
</body>
</html>
