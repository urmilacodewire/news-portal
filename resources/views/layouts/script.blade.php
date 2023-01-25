<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
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
     