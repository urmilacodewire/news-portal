@extends('layouts.app')
@section('content')
@inject('carbon', 'Carbon\Carbon')
      <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div>
      <!-- <div class="col-sm-9 clearfix"> -->
                     
         <div class="multi_video row clearfix">
         
            @foreach($blogs as $blog)
            <div class="col-sm-6 small_cols">
               <div class="pdf_col">
                  <a href="{{route('blog-detail',$blog->slug ?? 0)}}" target="_blank">
                     <div class="image_news">
                        <img src="{{ asset('images/'.$blog->e_file) }}" class="img-responsive">
                     </div>
                     <div class="content_news">
                        <h6 class="clearfix">
                           <em class="pull_left">
                              {{ $carbon::parse($blog->created_at)->format('d/m/Y h:i A')  }}</em>
                        </h6>
                        <h4>{{ $blog->title }}</h4>

                     </div>
                  </a>
                  <a href="{{ route('generate-pdf',$blog->slug) }}" target="_blank">Download</a>
               </div>
            </div>
            @endforeach
            
         </div>
         {{$epaper->links()}}
@endsection
