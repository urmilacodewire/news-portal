@extends('layouts.app')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<!-- <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Delhi Crime Press</title>
      <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/custom.css">
      <link rel="stylesheet" href="assets/css/responsive.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
   </head>
   <body class="">
    <div class="top_bar" id="on_top">
        <div class="container">
            <div class="adds pull_right">
               <a href="#">
               <img src="assets/images/Delhi_Crime_Banner_Ad1.png" alt="Tunin Header Ad1">
               </a>
            </div>
            <div class="logo pull_left">
               
               <a class="navbar-brand" href="index.html">
               <img src="assets/images/delhicrimepress_logo.png"/>
               </a>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.html">
                     <i class="fa fa-home"></i> <span class="mob_show">Home</span>
                     </a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="videos.html">
                     Videos
                     </a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="pdf.html">
                     PDF
                     </a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="blogs.html">Blogs </a>
                  </li>
               </ul>
            </div>
            <ul class="navbar-nav own_right pull_right">
               <li class="nav-item dropdown search_bar">
                  <a class="nav-link search_by_this dropdown-toggle" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown"><i class="fas fa-search"></i></a>
                  <div class="dropdown-menu">
                     <form action="">
                        <div class="input-group">
                           <input type="text" class="form-control" id="searchNews" name="searchNews" placeholder="Search" />
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
      </nav> -->
      <div class="cutom_sidebar_menu_icon"><span class="click_show"><i class="fa fa-times"></i></span><span class="click_hide"><i class="fa fa-bars"></i></span></div>
      <!-- <section class="banner_innerPage">
         <img src="assets/images/banner.png">
      </section> -->
     <!--  <div class="main_padding">
         <div class="highlighted_banner">
            <div class="container">
               <div class="row main_row">
                  <div class="col-sm-3 main_cols pull_right">
                     <div class="small_right">
                        <div class="small_cols">
                           <div class="image_news">
                              <a href="#">
                              <img src="assets/images/IMG-20210927-WA0000.jpg" class="img-responsive" alt="" />
                              </a>
                           </div>
                           <div class="content_news">
                              <h4>
                                 <a href="#">
                                 श्री पार्श्वनाथ दिगम्बर जैन मंदिर बलराम नगर लोन...								</a>
                              </h4>
                           </div>
                        </div>
                        <div class="small_cols">
                           <div class="image_news">
                              <a href="#">
                              <img src="assets/images/IMG-20210924-WA0000.jpg" class="img-responsive" alt="" />
                              </a>
                           </div>
                           <div class="content_news">
                              <h4>
                                 <a href="#">
                                 दिल्ली की रोहिणी कोर्ट में हुई ताबड़तोड़ फायरिं...								</a>
                              </h4>
                           </div>
                        </div>
                        <div class="small_cols">
                           <div class="image_news">
                              <a href="#">
                              <img src="assets/images/IMG_20210921_225314_640.jpg" class="img-responsive" alt="" />
                              </a>
                           </div>
                           <div class="content_news">
                              <h4>
                                 <a href="#">
                                 ट्यूनिन एप्लीकेशन से 4 लाख से अधिक रुपये की कमा...								</a>
                              </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-9 clearfix"> -->
                     <div class="news_name category_name text-center clearfix">
                        <h2>{{$news['0']->title}}
                           <!-- दिल्ली क्राइम प्रेस की टीम ने फतेहगंज पूर्वी के प्रभारी निरीक्षक को किया सम्मानित -->
                        </h2>
                        <div class="small_news_all mt-4">
                           <div class="single_news">  
                              <div class="single_news_image">
                                 <img src="{{asset('/images/'.$news['0']->image)}}" class="img-responsive" title="">
                              </div>
                              <div class="content_main_single">
                                 {!!$news['0']->description!!}
                                 <!-- <p><b>दिल्ली क्राइम प्रेस की टीम ने फतेहगंज पूर्वी के प्रभारी निरीक्षक को किया सम्मानित</b></p><p><br></p><p>बरेली जिला के अंतर्गत थाना फतेहगंज पूर्वी के प्रभारी निरीक्षक धर्मेंद्र कुमार के अच्छे कार्यों के लिए दिल्ली क्राइम प्रेस की टीम ने फूल माला पहनाकर व दिल्ली क्राइम प्रेस की डायरी देकर&nbsp; सम्मानित किया&nbsp; हालांकि प्रभारी निरीक्षक धर्मेंदर कुमार ने जब से थाना फतेहगंज पूर्वी की कमान संभाली है तब से क्षेत्र में अमन और शांति का वातावरण बना हुआ है। क्षेत्रवासियों का कहना है कि इंस्पेक्टर धर्मेंद्र कुमार के आने से सभी क्षेत्रवासी शांतिपूर्वक चैन की जिंदगी व्यतीत कर रहे हैं और अपराधियों के अंदर एक खौफ&nbsp; बना हुआ है। कई घटनाओं का खुलासा करके अपराधियों को कानूनी प्रक्रिया के तहत जेल भेजा गया।&nbsp; प्रभारी निरीक्षक धर्मेंद्र कुमार का जनता के प्रति स्नेह और कुशल कार्य&nbsp; &nbsp;को देखते हुए दिल्ली क्राइम प्रेस की टीम ने फतेहगंज पूर्वी प्रभारी निरीक्षक को फूल मालाओं से सम्मानित किया। मौके पर बरेली से राकेश कोली राजेश कुमार और शहजानपुर से हितेश सिंह अंशु सिंह बहोरन लाल आदि पदाधिकारी उपस्थित रहे।</p><p><br></p><p>दिल्ली क्राइम प्रेस</p><p>संवाददाता राकेश कोली बरेली उत्तर प्रदेश</p> --></div>
                           </div>
                        </div>
                     </div>
                  </div>
             <!--   </div>
            </div>
         </div>
      </div> -->
      <!-- <footer>
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
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         	
         
         	$(".cutom_sidebar_menu_icon").click(function(){
         	  $(".cutom_sidebar_menu_icon").toggleClass("open_slidebar");
         	  $(".small_right").toggleClass("open_slidebar");
         	});
         	var base_url = 'https://delhicrimepress.in/';
         	
         	var s = $("body");
           	var pos = s.position();
           	$(window).scroll(function() {
             	var windowpos = $(window).scrollTop();
         		if (windowpos >= pos.top & windowpos >=300) {
         			s.addClass("footer_stick");
         		} else {
         			s.removeClass("footer_stick");
         		}
           	});
         
         	var s = $("#back-top");
         	var pos = s.position();
         	$(window).scroll(function() {
         		var windowpos = $(window).scrollTop();
         		if (windowpos >= pos.top & windowpos >=250) {
         			s.addClass("active");
         		} else {
         			s.removeClass("active");
         		}
         	});
         
         	$("#searchNews").on('keyup', function(){
         		var searchNews = $("#searchNews").val();
         
         		if(searchNews != undefined && searchNews != "undefined" && searchNews != "" && searchNews != " "){
         			$.ajax({
         				type: "post",
         				url: 'https://delhicrimepress.in/welcome/search',
         				data: { searchNews: searchNews },
         				dataType: 'json',
         				success: function(response){
         
         					$("#searchNewsResult").addClass('display');
         					if(response.status && parseInt(response.count) > 0){
         						var _searchResultHtml = '<ul>';
         						for(i=0; i < response.data.length; i++){
         							_searchResultHtml += '<li>';
         								_searchResultHtml += '<a href="'+ base_url + response.data[i].slug +'">';
         									_searchResultHtml += response.data[i].title;
         								_searchResultHtml += '</a>';
         							_searchResultHtml += '</li>';
         						}
         						_searchResultHtml += '</ul>';
         					}
         					else{
         						var _searchResultHtml = 'No Results';
         					}
         					$("#searchNewsResult").html(_searchResultHtml);
         				}
         			})
         		}
         		else{
         			$("#searchNewsResult").html('');
         			$("#searchNewsResult").removeClass('display');
         		}
         	});
         });
          	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
             anchor.addEventListener('click', function (e) {
                 e.preventDefault();
         
                 document.querySelector(this.getAttribute('href')).scrollIntoView({
                     behavior: 'smooth'
                 });
             });
         });
      </script>
   </body>
</html> -->
@endsection