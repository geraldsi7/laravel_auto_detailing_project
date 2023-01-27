<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8" />
  <meta name="description" content="Upgrade Your Space. Master-grade artwork for every space." />
  <meta name="keywords" content="decraft,decraft designs,metal company,ghanaian owned company,decraftdesign">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/favicon.jpg">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    @yield('title', config('app.name'))
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Montserrat:wght@800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- CSS Files -->
  <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />

  <link href="{{ asset('assets') }}/toastr/toastr.min.css" rel="stylesheet" />

  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://kit.fontawesome.com/80bed6d9a8.js" crossorigin="anonymous"></script>

<script defer src="{{ asset('assets') }}/js/jquery.PrintArea.js"></script>

<!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-578KGGDNSS">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-578KGGDNSS');
</script>

</head>

<body class="{{ $class ?? '' }}">


  <style type="text/css">

   #search {
    width: 50px;
    border: 0;
    background-image: url("{{ asset('assets') }}/img/search.png");
    background-position: 10px 10px; 
    background-size: 16px ;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }

  #search:focus {
    width: 100%;
    border: 1px #000 solid;
  }

  .centered-content {
    z-index: 2;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  .image-fill{
    width: 100%;
    height: 100%;
    object-fit: cover;
  }


  .pb-30{
    padding-bottom: 30px;
  }

  .pt-45{
    padding-top: 45px;
  }

  .menu-item-height{
    height: 250px;
  }

  .control div{
    top: 45%;
    z-index: 99;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    padding: 12px 20px;
    border-radius: 50%;
    cursor: pointer;
  }

  .control .prev{
    left: 5px;
  }

  .control .next{
    right: 5px;
  }

  .control div:hover{
    background: #000;
  }

  

  .xs:after{
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    content: "";
    background: rgba(249, 99, 50, 0.9);
  }

  .tns-nav{
    text-align: center;
    margin: 15px 0 15px 0;
  }

  .tns-nav button{
    height: 12px;
    width: 12px;
    background: gray;
    border: none;
    margin-left: 7px;
    border-radius: 50%
  }

  .tns-nav .tns-nav-active{
    background: #000;
  }

  .grid-container{
    display: grid;
    grid-template-columns: repeat(1, 100%);
    grid-auto-rows: minmax(100px, auto);
    grid-gap: 20px;
  }

  .mt-10{
    margin-top: 6rem;
  }

  .ml-6{
    margin-left: 4.5rem;
  }

  @media(max-width: 700px){
   .grid-container{
    display: grid;
    grid-template-columns: repeat(1, 100%);
    grid-auto-rows: minmax(150px, auto);
    grid-gap: 20px;
  }
}

@media(max-width: 700px){
  .counters{
    grid-template-columns: repeat(1, 1fr);
  }
}
@media(min-width: 991px){
 .grid-container{
  display: grid;
  grid-template-columns: repeat(2, 50%);
  grid-auto-rows: minmax(150px, auto);
  grid-gap: 20px;
}
}

</style>
<div class="wrapper">
  @auth
  @if(
  $activePage == 'home' || 
  $activePage == 'history' || 
  $activePage == 'orders'  || 
  $activePage == 'budgets' || 
  $activePage == 'manage-category'|| 
  $activePage == 'manage-item' ||
  $activePage == 'manage-customer' ||
  $activePage == 'manage-user' ||
  $activePage == 'manage-gallery' ||
  (auth()->user()->role == 'Admin' && $activePage == 'profile')
  )
  @include('layouts.page_template.auth')
  @else
  @include('layouts.page_template.guest')
  @endif
  @endauth
  @guest
  @include('layouts.page_template.guest')
  @endguest
</div>

<!--   Core JS Files   -->


<script>

 $("#printContent").click(function(){
  var mode = 'iframe';
  var close = mode == "popup";
  var options = { mode: mode , popClose: close };
  $("div.print-here").printArea(options);
});

</script>


<script src="{{ asset('assets') }}/js/counter.js"></script>
<script src="{{ asset('assets') }}/js/addup.js"></script>

<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>

<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets') }}/demo/demo.js"></script>
<script src="{{ asset('assets') }}/toastr/toastr.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>

@stack('js')
</body>

</html>

