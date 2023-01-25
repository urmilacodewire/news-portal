<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
				
                  <li class="nav-item">
                     <a class="nav-link" href="{{url('/')}}">
                     <i class="fa fa-home"></i> <span class="mob_show">Home</span>
                     </a>
                  </li>
				  
                     @php
                        $category  = DB::table('categories')->Where('status',1)
                                                            ->get();
                     @endphp

				        @foreach($category as $menu)
                     <li class="nav-item ">     
                        <a class="nav-link" href="{{URL::to('blogs',$menu->name)}}">
                        {{$menu->name}}
                        </a>
                     </li>
				        @endforeach
				  
               </ul>
            </div>
            <ul class="navbar-nav own_right pull_right d-flex align-items-center">
            	<!-- <li class="nav-item text-white">
            		<a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
            	</li> -->
               <li class="nav-item dropdown search_bar">
                  <a class="nav-link search_by_this dropdown-toggle" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown"><i class="fas fa-search"></i></a>
                  <div class="dropdown-menu">
                     <form action="{{route('autosearch')}}" method="">
                        
                        <div class="input-group">
                           <input type="text" class="typeahead form-control " id="searchNews" name="searchNews" placeholder="Search" />
                           <div class="input-group-append">
                              <button class="input-group-text"><i class="fas fa-search"></i></button>
                           </div>
                        </div>
                     </form>
                     <div id="searchNewsResult"></div>
                  </div>
               </li>
            </ul>
         </div>
    </nav>
