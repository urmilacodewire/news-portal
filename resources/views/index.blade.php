@extends('layouts.app')
@section('content')
@inject('carbon', 'Carbon\Carbon')

   
      <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div>
      <!-- <div class="main_padding">
         <div class="highlighted_banner">
            <div class="container">
                <div class="row main_row clearfix"> -->
				<!-- <div class="col-sm-9 clearfix"> -->
                    <div class="banner_inner bg-white">    
						<div class="row">
							<div class="col-md-8">
								<img src="{{asset('/images/'.$news->image ?? '')}}" class="img-responsive" alt="" width="100%" height="100%" />
							</div>
							<div class="col-md-4">
								<div class="content_here">
									<h2><a href="{{route('blog-detail',$news->slug ?? '')}}" class="text-dark">{{$news->title ?? ''}}</a></h2>
									<h6><a href="{{route('blog-detail',$news->slug ?? '')}}" class="category_name">General </a> {{ $carbon::parse($news->created_at ?? '')->format('d/m/Y h:i A')  }}  </h6>
									<div id="content_here">{!! Str::limit($news->description ?? '',250)!!}
											</div>
									<div class="read_more">
										<a href="{{route('blog-detail',$news->slug ?? '')}}">Read more</a>
									</div>
								</div>
							</div>
						</div>
					</div>
	                  	<div class="banner_small_here clearfix pt-4">
	                   		 <!--  <h3 class="font-weight-bold">लेटेस्ट न्यूज़</h3>
	                     	<hr> -->
	                        <div class="row top_new">
	                        	@php

	                        	$popular = DB::table('posts')->where('popular','on')
	                        					->latest()->limit(15)->get();

	                        	@endphp
	                        	
	                        	@foreach($popular as $populars)
	                        	<div class="col-md-2 py-2">
	                        		<div class="card_sec">
	                        			<div class="image_news">
			                                 <a href="{{route('blog-detail',$populars->slug ?? 0)}}">
			                                 @if($populars->type == 'PDF')
                                       <img src="{{asset('/images/'.$populars->e_file)}}" class="img-responsive" title="">
                                       @else
			                                 <img src="{{asset('/images/'.$populars->image)}}" class="img-responsive" alt="" />
			                                 @endif
			                                 </a>
			                              </div>
			                              <div class="content_news">
			                                 <h4 class="text-center">
			                                    <a href="{{route('blog-detail',$populars->slug ?? 0)}}">
			                                    {{ Str::limit($populars->title,30)}}														</a>
			                                 </h4>
			                              </div>
	                        		</div>
	                        	</div>
	                        	@endforeach
	                        	
	                        </div>
	                   
	                    <div class="banner_small_here clearfix pt-3">
	                     	<h3 class="font-weight-bold">लेटेस्ट न्यूज़</h3>
	                     	<hr>
	                     	<div class="row latest_new">
	                     		
								@foreach($posts as $post)
	                     		<div class="col-md-4">
	                     			<div class="col_sec my-2">
	                        			<div class="col_img">
	                                 	<a href="{{route('blog-detail',$post->slug ?? 0)}}">
	                                 		<img src="{{ asset('images/'.$post->image) }}" class="img-responsive" alt="" />
	                                 	</a>
	                                 </div>
	                                 <div class="content_news">
	                                 	<h4 class="text-center">
	                                    	<a href="{{route('blog-detail',$post->slug ?? 0)}}">{{Str::limit($post->title, 40)}}</a>	
	                                    	<!-- <p class="m-0 pt-2">{!! Str::limit($post->description, 20)!!}</p> -->
	                                  	</h4>
	                                 </div>
	                        		</div>
	                     		</div>
								@endforeach
	                     	</div>
	                    </div>
                    </div>
                <!-- </div> -->
           
@endsection