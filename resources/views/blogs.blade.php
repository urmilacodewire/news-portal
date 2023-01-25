@extends('layouts.app')

@section('content')
@inject('carbon', 'Carbon\Carbon')


      <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div>
      <!-- <div class="main_padding">
         <div class="highlighted_banner">
            <div class="container"> -->
              <!--  <div class="row main_row">   
                  <div class="col-sm-9 clearfix"> -->
                     <div class="multi_video row clearfix">
                        @foreach($blogs as $blog)
                           <div class="col-sm-3 col-md-2 small_cols">
                              <div class="pdf_col">
                                 <a href="{{ route('blog-detail',$blog->slug) }}">
                                    <div class="image_news">
                                       @if($blog->type == 'PDF')
                                       <img src="{{ asset('images/'.$blog->e_file
                                       ) }}" class="img-responsive">
                                       @elseif($blog->type == 'Videos')
                                         <h4 class="p-3">{{$blog->videofile}}</h4>
                                         @else
                                          <img src="{{ asset('images/'.$blog->image) }}" class="img-responsive">
                                       @endif
                                    </div>
                                    <div class="content_news">
                                       <h6 class="clearfix">
                                          <em class="pull_left">
                                            {{ $carbon::parse($blog->created_at)->format('d/m/Y h:i A')  }} 
                                          </em>
                                       </h6>
                                       <h4>{!! Str::limit($blog->title,30)!!}</h4>
                                    </div>
                                 </a>
                              </div>
                              <!-- <a href="{{ route('generate-pdf',$blog->slug) }}" target="_blank">Download</a> -->
                           </div>
                        @endforeach  
                     </div>                  
@endsection 