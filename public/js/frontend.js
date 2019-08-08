$(document).ready(function(e){
  // AOS Initialisation
  AOS.init();

  $('.switch-buttons span').click(function(e){
    $btnType=$(this).data('rule');
    if($btnType=='new'){
      $('.search-form[data-type="usedv"]').animate({'left':'500px'},500);
      $('.search-form[data-type="newv"]').animate({'right':'30px'},500);
      $(this).css({
        'color':'white'
      },500);
      $('.switch-buttons span[data-rule="used"]').css({
        'color':'var(--blue)'
      },500);
      $('.se-header h1').first().text('Search for a new vehicle');
      $('.switch-buttons .layer').css({
        'transform':'translateX(0)'
      })
    }
    else{
      $('.search-form[data-type="newv"]').animate({'right':'500px'},500);
      $('.search-form[data-type="usedv"]').animate({'left':'25px'},500);
      $(this).css({
        'color':'white'
      },500);
      $('.switch-buttons span[data-rule="new"]').css({
        'color':'var(--blue)'
      },500);
      $('.se-header h1').first().text('Search for a used vehicle');
      $('.switch-buttons .layer').css({
        'transform':'translateX(47px)'
      })
    }
  })

  // Recent new vehicles slider
  $('.recent-nv').slick({
    dots: true,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
   {
     breakpoint: 1100 ,
     settings: {
       slidesToShow: 2,
       slidesToScroll: 1
     }
   },
   {
     breakpoint: 700,
     settings: {
       slidesToShow: 1,
       slidesToScroll: 1
     }
   }
   ]
  });
  $('.switch-type span').click(function(e){
     $btnType=$(this).data('rule');
     if($btnType=='new'){
       $new=$(this).parent().parent().next();
       $used=$(this).parent().parent().next().next();
       $used.animate({'opacity':'0'},500);
       $used.css({'display':'none'});
       $new.css({'display':'block'});
       $new.animate({'opacity':'1'},500);
       $new.slick("refresh");

       $(this).css({
         'color':'white'
       },500);
       $(this).next().css({
         'color':'var(--blue)'
       },500);
       $(this).next().next().css({
         'transform':'translateX(0)'
       })
     }
     else{
       $new=$(this).parent().parent().next();
       $used=$(this).parent().parent().next().next();
       $new.animate({'opacity':'0'},500);
       $new.css({'display':'none'});
       $used.css({'display':'block'});
       $used.animate({'opacity':'1'},500);
       $(this).css({
         'color':'white'
       },500);
       $(this).prev().css({
         'color':'var(--blue)'
       },500);
       $(this).next().css({
         'transform':'translateX(47px)'
       })
     }
      $used.slick("refresh");
   });

   // Recent new vehicles slider
   $('.recent-uv').slick({
     dots: true,
     arrows: true,
     infinite: true,
     slidesToShow: 3,
     slidesToScroll: 1,
     responsive: [
       {
         breakpoint: 1100 ,
         settings: {
           slidesToShow: 2,
           slidesToScroll: 1
         }
       },
       {
         breakpoint: 700,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       }
     ]
   });

   // Recent new vehicles slider
   $('.recent-nc').slick({
     dots: true,
     arrows: true,
     infinite: true,
     slidesToShow: 3,
     slidesToScroll: 1,
     responsive: [
       {
         breakpoint: 1100 ,
         settings: {
           slidesToShow: 2,
           slidesToScroll: 1
         }
       },
       {
         breakpoint: 700,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       }
     ]
   });
});

  // toggle select box arrow

  $('.form-field .selectbox').click(function(e){
    if($(this).children("ion-icon").attr('name')=='arrow-dropdown'){
      $(this).children("ion-icon").attr('name','arrow-dropup');
    }
    else{
      $(this).children("ion-icon").attr('name','arrow-dropdown');
    }
  });
