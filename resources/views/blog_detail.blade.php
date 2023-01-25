@extends('layouts.app')
@section('meta-title',$blog->meta_title ?? '')
@section('meta-keywords',$blog->meta_title ?? '')
@section('meta-description',$blog->meta_title ?? '')
@section('style')
<style>
.wrapper .icon{
  position: relative;
  background-color: #ffffff;
  border-radius: 50%;
  margin: 10px;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 22px;
  display: inline-block;
  align-items: center;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  color: #333;
  text-decoration: none;
  
}
.wrapper .tooltip {
  position: absolute;
  top: 0;
  line-height: 1.5;
  font-size: 14px;
  background-color: #ffffff;
  color: #ffffff;
  padding: 5px 8px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.wrapper .tooltip::before {
  position: absolute;
  content: "";
  height: 8px;
  width: 8px;
  background-color: #ffffff;
  bottom: -3px;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.wrapper .icon:hover .tooltip {
  top: -45px;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
.wrapper .icon:hover span,
.wrapper .icon:hover .tooltip {
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}
.wrapper .facebook:hover,
.wrapper .facebook:hover .tooltip,
.wrapper .facebook:hover .tooltip::before {
  background-color: #3b5999;
  color: #ffffff;
}
.wrapper .twitter:hover,
.wrapper .twitter:hover .tooltip,
.wrapper .twitter:hover .tooltip::before {
  background-color: #46c1f6;
  color: #ffffff;
}
.wrapper .instagram:hover,
.wrapper .instagram:hover .tooltip,
.wrapper .instagram:hover .tooltip::before {
  background-color: #e1306c;
  color: #ffffff;
}
.wrapper .linkedin:hover,
.wrapper .linkedin:hover .tooltip,
.wrapper .linkedin:hover .tooltip::before {
  background-color: #007bff;
  color: #ffffff;
}
.wrapper .whatsapp:hover,
.wrapper .whatsapp:hover .tooltip,
.wrapper .whatsapp:hover .tooltip::before {
  background-color: #4bff00;
  color: #ffffff;
}
.wrapper {
   width: 10px;
    right: 40px;
    margin-right: 0px;
    top: 170px;
    position: fixed;
}

.fab, .far {
    padding: 8px 14px;
}

  .col-sm-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 100% !important;
}
</style>
@endsection
@section('content')  
@inject('carbon', 'Carbon\Carbon')
    
<div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span>   <span class="click_hide"><i class="fa fa-bars"></i></span></div>
<!-- <section class="banner_innerPage">
<img src="assets/images/banner.png">
</section> -->
<!-- <div class="main_padding">
<div class="highlighted_banner">
<div class="container"> -->          
<div class="container mx-5" text-center >
  <div class="row main_row mx-5">
    <div class="col-sm-6 col-md-12">
       <div class="row main_row">
          <!-- <div class="col-sm-9 clearfix"> -->
             <div class="news_name category_name text-center clearfix">
                <h2>{{$blog->title ?? ''}}</h2>
                <div class="content_news single_page_time">
                   <h6>
                      <em class="pull_left">
                         <!-- <span class="category_name text-left">
                            <a href="#">{{$blog->title}}</a>
                         </span> -->
                         <span class="category_name text-left"> 
                            <a href="#">Category : {{$blog->name}}</a>
                         </span>
                         {{ $carbon::parse($blog->created_at)->format('d/m/Y h:i A')  }}           <span class="view_eyes"><i class="far fa-eye"></i> 143</span>
                      </em>
                   </h6>
                </div>
                <div class="small_news_all mt-4">
                   <div class="single_news">
                      <div class="single_news_image">
                        @if($blog->type == 'PDF')
                         <img src="{{asset('/images/'.$blog->e_file)}}" class="img-responsive" title="">
                         @else
                         <img src="{{asset('/images/'.$blog->image)}}" class="img-responsive" title="">
                          @endif
                      </div>
                      <div class="content_main_single"><p>{!!$blog->description!!}</p></div>
                      @if($blog->type == 'PDF')
                       <a href="{{ route('generate-pdf',$blog->slug) }}" target="_blank">Download</a>
                       @endif
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
  </div>     
</div>
<!--social link -->
<div class="wrapper">
  <a href="https://www.facebook.com/share.php?u={{route('blog-detail',$blog->slug)}}" class="icon facebook">
    <div class="tooltip">Facebook</div>
    <span><i class="fab fa-facebook-f"></i></span>
  </a>
  <a href="https://twitter.com/share.php?url={{route('blog-detail',$blog->slug)}}" class="icon twitter">
    <div class="tooltip">Twitter</div>
    <span><i class="fab fa-twitter"></i></span>
  </a>
  <a href="https://www.instagram.com/?url={{route('blog-detail',$blog->slug)}}" class="icon instagram">
    <div class="tooltip">Instagram</div>
    <span><i class="fab fa-instagram"></i></span>
  </a>
  <a href="https://in.linkedin.com/shareArticle?url={{route('blog-detail',$blog->slug)}}" class="icon linkedin">
    <div class="tooltip">Linkedin</div>
    <span><i class="fab fa-linkedin"></i></span>
  </a>
  <a href="https://www.whatsapp.com/{{route('blog-detail',$blog->slug)}}" class="icon whatsapp">
    <div class="tooltip">Whatsapp</div>
    <span><i class="fab fa-whatsapp"></i></span>
  </a>
</div>
    <!-- end social link -->  
           
@endsection