
  var itemSlider = tns({
    container : '.item-slider',
    gutter : 10,
    edgePadding : 20,
    slideBy : 1,
    controlsPosition : 'bottom',
    nav : true,
    navPosition: true,
    mouseDrag: true,
    autoplay : true,
    autoplayButtonOutput: false,
    controlsContainer : '#item-slider-control',
    touch: true,
    responsive:{
      0:{
        items: 2,
      },
      768:{
        items: 3
      },
      1440:{
        items: 4
      }
    }
  });