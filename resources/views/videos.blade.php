@extends('layouts.app')
@section('content')
      <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div>
     <!-- <div class="col-sm-9 clearfix">  -->
         <div class="multi_video row clearfix"> 
            @foreach($blogs as $video)
            <div class="col-sm-4 col">
               <div class="single_video">
                  <div class="ifm">
                     <iframe src="{{asset('videos/'.$video->bannerfile)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay></iframe>
                  </div>
                  <div class="con">
                  	<h4 class="m-0">{{Str::limit($video->title,30)}}</h4>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         {{$videos->links()}}      
@endsection