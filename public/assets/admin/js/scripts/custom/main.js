
    "use strict";
 
   // scroll redesign
   $(window).scroll(function () {


    if ($(window).scrollTop()) {


        $(".header-navbar").addClass("fixed-top").animate({
  
        }, 4000);

        $(".main-menu").addClass("menu-fixed").animate({
  
        }, 4000);

        $(".app-content").addClass("resize").animate({
  
        }, 4000);

    } 
    else {


        $(".header-navbar").removeClass("fixed-top").animate({
  
        }, 4000);
        $(".main-menu").removeClass("menu-fixed").animate({
  
        }, 4000);

        $(".app-content").removeClass("resize").animate({
  
        }, 4000);
    }
  
  });

    // active links switch
       
      let url = window.location.href,
      urlprotocol=window.location.protocol,
      urlpath1 = window.location.pathname.split( '/' )[1],
      urlpath2 = window.location.pathname.split( '/' )[2],
      urlpath3 = window.location.pathname.split( '/' )[3],
      urlpath=urlprotocol+"//"+window.location.host +"/"+urlpath1+"/"+urlpath2,
      urlsubpath1 = urlpath + "/"+urlpath3;
    $(".main-menu-content a").each(function () {
    
      let linkurl=$(this).attr("href");
     
      if(url == linkurl || urlsubpath1 == linkurl){

        $(this).parents('li').addClass('active');
     
    }
    else if( urlpath3 == "reservation"){
  
      let  urlpathchange=urlpath3.replace('reservation','reservations'),
      urlsubpath2 = urlpath + "/"+urlpathchange;
      if(urlsubpath2 == linkurl){
        $(this).parents('li').addClass('active');

      }
    }

   });
  
    if($(".menu-content").children("li:first-child").hasClass("active")){

      $(".menu-content").children("li").next().removeClass("active");
    }


  // card content collapse
  
  $('.card-content').on('hide.bs.collapse', function () {
    
    $(".pull-up").addClass("collapsed");

  });
  $('.card-content').on('show.bs.collapse', function () {
    
    $(".pull-up").removeClass("collapsed");

  })

   // auto complete
   $("input").attr("autocomplete","off");
   $("textarea").attr("autocomplete","off");
    
   // single select
   $(".js-example-placeholder-single").select2({
    placeholder:($("html").attr("lang")=="ar")?"أختر":"Select",
    allowClear: true,
    maximumSelectionLength: 2,
    "language": {
      "noResults": function(){
          return ($("html").attr("lang")=="ar")?"لا يوجد نتائج":"no results found";
      },
    }
   });

    //select2  multiple select
    $(".js-example-placeholder-multiple").select2({
      placeholder:($("html").attr("lang")=="ar")?"أختر":"Select",
      tags: true,
      tokenSeparators: [',', ' '],
      "language": {
        "noResults": function(){
            return ($("html").attr("lang")=="ar")?"لا يوجد نتائج":"no results found";
        },
      }
     });

    // custom file input

    $(document).ready(function () {
      bsCustomFileInput.init()
    })
  
    $("input[type=file]").on('change',function(event){
  
      let fileVal=event.target.value;
      
      if(fileVal){
  
        $(this).next(".custom-file-label").addClass('colored');
  
  
      }
      else{
  
        $(this).next(".custom-file-label").removeClass('colored');
  
      }
    })
    

    // alert

    setTimeout(function() {
  
      $(".alert-dismissible").fadeOut(); 
  
    }, 4000);
 
   // scroll to top
          
    $(window).scroll(function(){
          if($(this).scrollTop() > 300) {
        
            $(".auto-scroll-to-top").removeClass("non-hover");                 
             $(".auto-scroll-to-top").addClass("visible");  
           } else {
        
            $(".auto-scroll-to-top").addClass("non-hover");
            $(".auto-scroll-to-top").removeClass("visible");
           }        
    });
             

    $('.auto-scroll-to-top').on('click touchend', function(event) {
          $("html, body").animate({scrollTop: 0}, 1000);
           event.preventDefault();
     });







