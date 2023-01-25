 <!-- @php
$category  = DB::table('categories')->Where('status',1)
                                    ->get();
@endphp     

<div class="bottom">
   <div class="row p-4 text-center">
      @foreach($category as $urls)
    @if(request()->is('blogs/'.$urls->name) )
        @php
           $banners = DB::table('posts')
                ->where('type','Banner') 
                ->where('category',$urls->id)
                ->where('position','Bottom')
                ->first();  
               //dd($banners);
        @endphp

      <div class="col-md-12">
         <a href="{{$banners->link ?? ''}}">  
            <img src="{{ asset('images/',$banners->bannerfile ?? '') }}" alt="Tunin Header Ad1">
         </a>
      </div>
   </div>
 </div>
 </div>
    @endif
@endforeach  -->
<footer>
   <ul id="menu-extra-pages" class="menu">
      <li><a href="#">About</a></li>
      <li><a href="#">Disclaimer</a></li>
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Terms & Condition</a></li>
   </ul>
   <div class="footer-coypright clearfix">
      <p class="text-center">2022 © Delhi Crime Press, All Rights Reserved.</p>
   </div>
   <div class="top_up">
      <a href="#on_top">
         <div id="back-top" class="">
            <i class="fas fa-chevron-up"></i>
         </div>
      </a>
   </div>
</footer>
