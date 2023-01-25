
@php
$category  = DB::table('categories')->Where('status',1)
                                    ->get();
@endphp

 
<div class="top_bar" id="on_top">
    <div class="container">
@foreach($category as $urls)
    @if(request()->is('blogs/'.$urls->name) )
        @php
           $banners = DB::table('posts')
                ->where('type','Banner') 
                ->where('category',$urls->id)
                ->where('position','Header')
                ->first();  
               //dd($banners);
        @endphp
        <div class="adds pull_right">
            <a href="{{$banners->link ?? ''}}">  
                @if(isset($banners))
            <img src="{{ asset('images') }}/{{$banners->bannerfile ?? ''}}" alt="Tunin Header Ad1">
            @endif
            </a>
        </div>
    @endif
@endforeach
@if(request()->is('blog-detail/{slug}') || request()->is('/'))
        @php
           $banners = DB::table('posts')
                ->where('type','Banner') 
                ->where('position','Header')        
                ->first();  
               // dd($banners);
        @endphp
        <div class="adds pull_right">
            <a href="{{$banners->link ?? ''}}">  
            <img src="{{ asset('images/'.$banners->bannerfile ?? '') }}" alt="Tunin Header Ad1">
            </a>
        </div>
    @endif
        <div class="logo pull_left">
            <!-- Brand -->
            <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{url('assets/images/delhicrimepress_logo.png')}}"/>
            </a>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>