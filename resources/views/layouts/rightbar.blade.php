
<div class="col-sm-3 main_cols pull_right">
    @if(request()->is('home') || request()->is('/'))
    <div class="footer-icons smallboxes wow  fadeIn" data-wow-duration="200" data-wow-delay="600ms">
        <a href="https://www.facebook.com/DelhiCrime.ofcl" title="Facebook" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
        <a href="https://t.me/DelhiCrime_ofcl" title="Telegram" target="_blank">
                        <i class="fab fa-telegram"></i>
                    </a>
        <a href="http://tunin.me/DelhiCrimePress" title="Tunin" target="_blank">
                        <i class="fab fa-pinterest"></i>        
       <!--  <img src="https://delhicrimepress.in/assets/frontend/images/tunin.png" alt="Tunin"> -->
                    </a>
        <a href="https://twitter.com/delhiCrime_ofcl" title="Twitter" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
        <a href=" https://www.youtube.com/c/DelhiCrimePress_ofcl " title="You Tube" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
    </div>
    <div class="weather smallboxes">
        <a class="weatherwidget-io" href="https://forecast7.com/en/20d5978d96/india/" data-label_1="INDIA" data-label_2="WEATHER" data-font="Verdana" data-icons="Climacons Animated" data-mode="Forecast" data-days="3" data-theme="blue-mountains" style="display: block; position: relative; height: 200px; padding: 0px; overflow: hidden; text-align: left; text-indent: -299rem;">INDIA WEATHER<iframe id="weatherwidget-io-0" class="weatherwidget-io-frame" title="Weather Widget" scrolling="no" frameborder="0" width="100%" src="https://weatherwidget.io/w/" style="display: block; position: absolute; top: 0px; height: 200px;"></iframe></a>
        <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
        </script>
    </div>                              
    @endif
    <div class="small_right">
        @if(request()->is('home') || request()->is('/'))
        <div class="small_cols">
            <img src="{{url('assets/images/4107527340971280002.jpeg')}}" class="img-fluid" />
        </div>
        @endif
        <!-- categories -->
@php
$category  = DB::table('categories')->Where('status',1)
                                    ->get();
@endphp

@foreach($category as $urls)
        <!-- records -->

        @if(request()->is('blogs/'.$urls->name) )
 @php
       $banner = DB::table('posts')
                ->where('type','Banner') 
                ->where('category',$urls->id)
                ->where('position','Right Side')      
                ->orderBy('id','desc')->limit(3)
                ->get();
               // dd($banner);
    @endphp

        @foreach($banner as $paper) 
        <div class="small_cols">
            <div class="image_news">
                <a href="{{$blog->link ?? 0}}">
                <img src="{{asset('/images')}}/{{$paper->bannerfile ?? ''}}" class="img-responsive" alt="" />
                </a>
            </div>
            <div class="content_news">
                <h4>
                    <a href="{{$blog->link ?? 0}}">{{ Str::limit($paper->title,30)}}</a>
                </h4>
            </div>
        </div>
        @endforeach
    @endif
@endforeach

       @php

        $indexbanner = DB::table('posts')    
                ->where('type','Banner') 
                ->where('position','Right Side') 
                ->orderBy('id','desc')->limit(3)
                ->get();

        @endphp
        @if(request()->is('/') || request()->is('blog-detail/'))

        @foreach($indexbanner as $blog)
        
        <div class="small_cols">
            <div class="image_news">
                <a href="{{$blog->link ?? 0}}">
                <img src="{{asset('images/'.$blog->bannerfile ?? '')}}" class="img-responsive" alt="" />
                </a>
            </div>
            <div class="content_news">
                <h4>
                    <a href="{{$blog->link ?? 0 }}">{{ Str::limit($blog->title,30)}}</a>
                </h4>
            </div>
        </div>
        @endforeach
        @endif
        
    
     </div>
</div>
