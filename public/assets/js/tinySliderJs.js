  let a = tns({
    container : '.item-img-slider',
    gutter : 10,
    edgePadding : 20,
    slideBy : 1,
    controlsPosition : 'bottom',
    nav : true,
    navPosition: true,
    mouseDrag: true,
    autoplay : true,
    autoplayButtonOutput: false,
    controlsContainer : '#item-img-slider-control',
    touch: true,
    items: 1
  });



  const menuSlider = tns({
    container : '.menu-slider',
    gutter : 10,
    edgePadding : 20,
    slideBy : 1,
    controlsPosition : 'bottom',
    nav : true,
    navPosition: true,
    mouseDrag: true,
    autoplay : true,
    autoplayButtonOutput: false,
    controlsContainer : '#menu-slider-control',
    touch: true,
    responsive:{
      0:{
        items: 1,
      },
      768:{
        items: 2
      },
      1440:{ 
        items: 3
      }
    }
  });


  let teamSlider = tns({
    container : '.team-slider',
   // gutter : 20,
    // edgePadding : 20,
    slideBy : 1,
    controlsPosition : 'bottom',
    nav : false,
    mouseDrag: true,
    autoplay : true,
    autoplayButtonOutput: false,
    controlsContainer : '#team-slide-control',
    touch: true,
    responsive:{
      0:{
        items: 2,
      },
      768:{
        items: 3
      },
      1440:{
        items: 5
      }
    }
  });
