  var menuSlider = tns({
    container : '.paint-slider',
    gutter : 2,
    slideBy : 1,
    controlsPosition : 'bottom',
    nav : true,
    navPosition: true,
    mouseDrag: true,
    autoplay : true,
    autoplayButtonOutput: false,
    controlsContainer : '#paint-slider-control',
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