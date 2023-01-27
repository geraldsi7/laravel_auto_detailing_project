@extends('layouts.app', [
'namePage' => 'Detailing Services',
'class' => 'login-page sidebar-mini ',
'activePage' => 'services',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')
<div class="bg-skewed bg-services">
    <div class="content">
        <p class="h2 text-white font-weight-bold text-capitalize">Detailing Services</p>
        <p class="text-white">Discover the wide range of automotive detailing services from {{ config('app.name') }}.</p>
    </div>
</div>
<div class="container mt-5">
    <div class="mt-3 d-flex justify-content-center">
        <p class="font-weight-bold">
            <span style="font-size: 1.2em">PLEASE NOTE THE FOLLOWING!</span>
            <br>
            + All dark colors; black, red and others will incur additional ${{ number_format('50', 2) }}.
            <br>
            + Service typically requires 4 - 6 hours for completion.
            <br>
            + Vehicles that are excessively dirty or contain pet hair are subject to extra ${{ number_format(50,2) }} or more.
            <br>
            + Price may change due to the nature of your vehicle.
        </p>
    </div>
    <p class="text-uppercase">clean & detailed</p>
    <p class="my-4 h2">Detailing Services</p>
    <p class="mb-4 col-md-9 col-lg-4 p-0">Get your car cleaned and detailed at your home, office, or work location.</p>
</div>

<div class="container">
    <div class="mb-4">
        <p class="font-weight-bold text-uppercase text-primary pb-1">view our most popular detailing services</p>
    </div>

    <div class="container">

        <div class="row">
            <!-- car wash -->
            <div class="col-12 col-md-6 col-lg-4 my-2" id="car-wash">
                <div>
                    <div style="height: 250px;">
                        <img class="image-fill" src="{{ asset('assets') }}/img/services/image/ad1.jpg" alt="Card image cap">
                    </div>
                    <div class="w-100 mt-4">
                        <div class="d-flex justify-content-between">
                            <p class="h5 text-primary text-capitalize">car wash</p>
                            <ul class="navbar-nav text-right">
                                <li>Cars: ${{ number_format(100,2) }} & up</li>
                                <li>SUVs(2 rows): ${{ number_format(120,2) }} & up</li>
                                <li>XL(3 rows): ${{ number_format(150,2) }} & up</li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <ul>
                                <li>Hand wash</li>
                                <li>Wax/Paste wax + ${{ number_format(50,2) }}</li>
                                <li>Clean tires, rims & wheel walls</li>
                                <li>Dress tires</li>
                                <li>Vacuum interior & trunk</li>
                                <li>Clean windows & mirrors</li>
                                <li>Wipe dashboard </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <p class="text-uppercase">watch our</p>
                <p class="h3 text-capitalize">car wash process</p>
            </div>

            <!-- end of car wash -->

            <!-- full interior detailing -->
            <div class="col-12 col-md-6 col-lg-4 my-2" id="full-interior-detailing">
                <div>
                    <div style="height: 250px;">
                        <img class="image-fill" src="{{ asset('assets') }}/img/services/image/ad2.jpg" alt="Card image cap">
                    </div>
                    <div class="w-100 mt-4">
                        <div class="d-flex justify-content-between">
                            <p class="h5 text-primary text-capitalize">full interior detailing</p>
                            <ul class="navbar-nav text-right">
                                <li>Cars: ${{ number_format(150,2) }} & up</li>
                                <li>SUVs(2 rows): ${{ number_format(170,2) }} & up</li>
                                <li>XL(3 rows): ${{ number_format(200,2) }} & up</li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <ul>
                                <li>Vacuum in interior and trunk</li>
                                <li>Wipe door jams</li>
                                <li>Shampoo upholstery. Carpets, seats and floor mats</li>
                                <li>Clean vinyl and condition leather</li>
                                <li>Clean upholders</li>
                                <li>Clean ashtray and vents</li>
                                <li>Clean dashboard</li>
                                <li>Clean window and mirror</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end of  full interior detailing -->

            <!-- standard detailing-->
            <div class="col-12 col-md-6 col-lg-4 my-2" id="standard-detailing">
                <div>
                    <div style="height: 250px;">
                        <img class="image-fill" src="{{ asset('assets') }}/img/services/image/ad3.jpg" alt="Card image cap">
                    </div>
                    <div class="w-100 mt-4">
                        <div class="d-flex justify-content-between">
                            <p class="h5 text-primary text-capitalize">standard detailing</p>
                            <ul class="navbar-nav text-right">
                                <li>Cars: ${{ number_format(250,2) }} & up</li>
                                <li>SUVs(2 rows): ${{ number_format(270,2) }} & up</li>
                                <li>XL(3 rows): ${{ number_format(300,2) }} & up</li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <ul>
                                <li>Wash and dry with microfiber towel</li>
                                <li>Degrease and dress the wheel walls</li>
                                <li>Remove road tar from rocker panels</li>
                                <li>Clean outside/face of wheels</li>
                                <li>Wax paint and clean windows</li>
                                <li>Complete vacuum</li>
                                <li>Shampoo all seats/floor mats</li>
                                <li>Wipe down of all door panels</li>
                                <li>Wipe down and dusting of all dash gauges, vents, center console</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of standard detailing -->

            <!-- full detailing -->
            <div class="col-12 my-2" id="full-detailing">
                <div class="row">
                    <div class="col-12 col-lg-5 ">
                        <!-- info -->
                    <div>
                    <div style="height: 300px;">
                        <img class="image-fill" src="{{ asset('assets') }}/img/services/image/ad4.jpg" alt="Card image cap">
                    </div>
                    <div class="w-100 mt-4">
                        <div class="d-flex justify-content-between">
                            <p class="h5 text-primary text-capitalize">full detailing</p>
                            <ul class="navbar-nav text-right">
                                <li>Cars: ${{ number_format(499,2) }} & up</li>
                                <li>SUVs(2 rows): ${{ number_format(575,2) }} & up</li>
                                <li>XL(3 rows): ${{ number_format(625,2) }} & up</li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <ul>
                                <li>Deep clean complete interior</li>
                                <li>Advanced clay bar treatment</li>
                                <li>Engine cleaning and shine</li>
                                <li>Light machine polish</li>
                                <li>High silica paint sealant</li>
                            </ul>
                        </div>
                    </div>
            </div>
            <!-- end of info -->
                    </div>
                    <div class="col-12 col-lg-7 ">
                    <!-- video -->
                    <div class="pt-2 px-2">
                <p class="text-uppercase">watch our</p>
                <p class="h3 text-capitalize">full detailing process</p>
                <span>Watch our overview video to see the quality service we render when you bring your vehicle to {{ config('app.name') }}.</span>
                <video style="height: 50vh; width: 100%;" controls>
                    <source src="{{ asset('assets') }}/img/services/video/full-detailing.mp4" type="video/mp4">
                </video>
                </div>
                    <!-- end of video -->
                    </div>
                </div>    
                    </div>
        <!-- end of full detailing -->
    </div>
</div>

<!-- window tint -->
<div class="container mt-5 bg-white" id="window-tint">
    <div class="mb-3 col-12">
        <div class="row g-0">
            <div class="col-md-6 pl-0">
                <div class="mt-5 py-5">
                    <p class="text-uppercase">comfort & style</p>
                    <p class="my-4 h2">Window Tint Services</p>
                    <p class="mb-4 col-md-10 col-lg-7 p-0">
                        When a vehicle is being detailed at Amazing Car Wash & Detailing, window tint installation is a frequently requested service. Apart from improving appearance and privacy, tint's UV protection and heat rejection properties make it a must-have for car enthusiasts.
                        <br>
                        <br>
                        You can choose any level of darkness from 5% (dark) to 90% (light). The UV and infrared protection remains constant regardless of tint darkness level.
                    </p>

                    <a href="{{ route('contact.index') }}" class="btn col-md-10 col-lg-6 btn-primary text-uppercase py-3 rounded-0"><span class="pull-left">book now</span><i class="now-ui-icons arrows-1_minimal-right pull-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 mr-auto pl-3">
                <div style="height: 550px;">
                    <img class="image-fill rounded-0" src="{{ asset('assets') }}/img/services/image/window-tint.png" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="skewed-bg" style="margin-top: 7em; background: #e5e5e5">
    <div class="content">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="card rounded-0">
                    <h5 class="card-header rounded-0 text-white text-center" style="background: #000;">4-Door Vehicle</h5>
                    <div class="card-body">
                        <p class="card-text">All sides, rear and back glass.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card rounded-0 ">
                    <h5 class="card-header rounded-0 text-white text-center" style="background: #000;">2-Door Vehicle</h5>
                    <div class="card-body">
                        <p class="card-text">Side 2 and rear windows.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card rounded-0">
                    <h5 class="card-header rounded-0 text-white text-center" style="background: #000;">Windshield</h5>
                    <div class="card-body">
                        <p class="card-text">The largest piece of glass is the most important! Reject heat and UV rays with full windshield tint. Light options don’t obstruct your view.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="card rounded-0">
                    <h5 class="card-header rounded-0 text-white text-center" style="background: #000;">Front 2 Windows</h5>
                    <div class="card-body">
                        <p class="card-text">Match the front two windows on an SUV to the rear factory tint.</p>
                    </div>
                </div>
            </div>
        </div>


        <p class="text-muted font-italic mt-5 text-center">All tint services include a complimentary hand wash (with a blow dry & jamb wipe down) and light interior wipe-down where applicable.</p>

        <p class="text-muted font-italic text-center">Tint for a 2-door vehicle begins at ${{ number_format(500,2) }}.</p>
    </div>
</div>

<!-- PPF -->
<div class="container mt-5" id="ppf">
    <div class="text-center my-2 py-5">
        <p class="h2">Paint Protection Film</p>
        <div style="padding: 0 9em;">
            <p>We use the clearest, best-performing film in the industry, with unrivalled instal quality. We can tailor a protection package to your specific needs, from front-end protection to vehicle wrapping.</p>
        </div>
    </div>

    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">

        <li class="nav-item">
            <a class="nav-link h5 active rounded-0 text-uppercase" id="pills-partial-frontal-tab" data-toggle="pill" href="#pills-partial-frontal" role="tab" aria-controls="pills-partial-frontal" aria-selected="false">partial frontal</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h5 rounded-0 text-uppercase" id="pills-full-frontal-tab" data-toggle="pill" href="#pills-full-frontal" role="tab" aria-controls="pills-full-frontal" aria-selected="false">full frontal</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h5 rounded-0 text-uppercase" id="pills-track-pack-tab" data-toggle="pill" href="#pills-track-pack" role="tab" aria-controls="pills-track-pack" aria-selected="false">track pack</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h5 rounded-0 text-uppercase" id="pills-full-wrap-tab" data-toggle="pill" href="#pills-full-wrap" role="tab" aria-controls="pills-full-wrap" aria-selected="false">full wrap</a>
        </li>
    </ul>
    <hr>


    <div class="tab-content" id="pills-tabContent">
        <!-- partial frontal tabpanel -->
        <div class="tab-pane fade show active" id="pills-partial-frontal" role="tabpanel" aria-labelledby="pills-partial-frontal-tab">
            <div class="d-md-flex">
                <img src="https://img1.wsimg.com/isteam/ip/0f223c23-73e3-44c6-8099-a0d934cabf31/151EBC44-5DFE-4D62-BF80-F8262AA89E4D.png/:/cr=t:2.28%25,l:15.14%25,w:76.92%25,h:65.46%25/rs=w:360,h:180,cg:true,m">
                <div>
                    <p style="font-size: 1.2em">Starting at ${{ number_format('950' ,2) }}</p>
                    <ul style="font-size: 1.1em;">
                        <li>Front bumper</li>
                        <li>Mirrors</li>
                        <li>Partial hood</li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- end of partial frontal tabpanel -->

        <!-- full frontal tabpanel -->
        <div class="tab-pane fade" id="pills-full-frontal" role="tabpanel" aria-labelledby="pills-full-frontal-tab">
            <div class="d-md-flex">
                <img src="https://img1.wsimg.com/isteam/ip/0f223c23-73e3-44c6-8099-a0d934cabf31/729A8510-039F-480D-BF13-7B489E549A4B.png/:/cr=t:4%25,l:13.89%25,w:80.65%25,h:64.27%25/rs=w:360,h:180,cg:true,m">
                <div>
                    <p style="font-size: 1.2em">Starting at ${{ number_format('1750' ,2) }}</p>
                    <ul style="font-size: 1.1em;">
                        <li>Full hood</li>
                        <li>Full bumper</li>
                        <li>Mirrors</li>
                        <li>Front fenders</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of full frontal tabpanel -->

        <!-- track pack -->
        <div class="tab-pane fade" id="pills-track-pack" role="tabpanel" aria-labelledby="pills-track-pack-tab">
            <div class="d-md-flex">
                <img src="https://img1.wsimg.com/isteam/ip/0f223c23-73e3-44c6-8099-a0d934cabf31/587FE7CA-1584-427A-BBD7-AF9548093358.png/:/cr=t:1.66%25,l:10.05%25,w:80.65%25,h:65.49%25/rs=w:360,h:180,cg:true,m">
                <div>
                    <p style="font-size: 1.2em">Starting at ${{ number_format('2300' ,2) }}</p>
                    <ul style="font-size: 1.1em;">
                        <li>Full frontal</li>
                        <li>A pillars</li>
                        <li>Rocker panels</li>
                        <li>Headlights</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  end of track pack -->

        <!-- full wrap tabpanel -->
        <div class="tab-pane fade" id="pills-full-wrap" role="tabpanel" aria-labelledby="pills-full-wrap-tab">
            <div class="d-md-flex">
                <img src="https://img1.wsimg.com/isteam/ip/0f223c23-73e3-44c6-8099-a0d934cabf31/31121E50-3F1B-4D99-A753-39AC244E6B46.png/:/cr=t:0%25,l:14.07%25,w:80.24%25,h:100%25/rs=w:360,h:271,cg:true">
                <div>
                    <p style="font-size: 1.2em">Call for details</p>
                    <p style="font-size: 1.1em;">Full body wrap. Call for detail. 703-864-8281</p>
                </div>
            </div>

        </div>
        <!-- end of full wrap tabpanel -->

    </div>
</div>
<!-- end of PPF -->

<!-- paint correction -->
<div class="my-5 bg-skewed bg-paint-correction" id="paint-correction">
    <div class="content">
        <p class="h2 text-white font-weight-bold text-capitalize">paint correction</p>
        <p class="text-white">The best paint polishing and swirl-removal services.</p>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center my-2 py-5">
        <p class="h2">Paint Correction</p>
        <div style="padding: 0 9em;">
            <p>Paint polishing, also known as paint correction, is the most effective way to improve the gloss and clarity of your vehicle's paint. Amazing Car Wash & Detailing is the industry leader in high-level paint correction that is both effective and non-invasive to the integrity of your paint.</p>
        </div>
    </div>

    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">

        <li class="nav-item">
            <a class="nav-link h5 active rounded-0 text-uppercase" id="pills-lmp-tab" data-toggle="pill" href="#pills-lmp" role="tab" aria-controls="pills-lmp" aria-selected="false">light machine polish</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h5 rounded-0 text-uppercase" id="pills-ss-tab" data-toggle="pill" href="#pills-ss" role="tab" aria-controls="pills-ss" aria-selected="false">single-stage</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h5 rounded-0 text-uppercase" id="pills-ms-tab" data-toggle="pill" href="#pills-ms" role="tab" aria-controls="pills-ms" aria-selected="false">multi-stage</a>
        </li>
    </ul>
    <hr>


    <div class="tab-content" id="pills-tabContent">
        <!-- lmp tabpanel -->
        <div class="tab-pane fade show active" id="pills-lmp" role="tabpanel" aria-labelledby="pills-lmp-tab">
            <div class="d-md-flex justify-content-md-start">
                <a href="{{ asset('assets') }}/img/services/image/ad6a.jpg">
                    <img src="{{ asset('assets') }}/img/services/image/ad6a.jpg" width="400">
                </a>
                <div class="ml-md-4 col-md-7">
                    <p style="font-size: 1.1em">Improve the appearance and gloss of your paint with a light machine polish service.</p>
                    <ul style="font-size: 1.1em;">
                        <li>Light polish on all panels to remove minor marring</li>
                        <li>4-hour service</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of lmp tabpanel -->

        <!-- ss tabpanel -->
        <div class="tab-pane fade" id="pills-ss" role="tabpanel" aria-labelledby="pills-ss-tab">
            <div class="d-md-flex justify-content-md-start">
                <a href="{{ asset('assets') }}/img/services/image/ad6b.jpg">
                    <img src="{{ asset('assets') }}/img/services/image/ad6b.jpg" width="400">
                </a>
                <div class="ml-md-4 col-md-7">
                    <p style="font-size: 1.1em">One stage of machine polishing (also referred to as one-step polishing). While not considered a "perfection detail" due to the single-stage process, a significant improvement in the condition of the paint can be achieved. On softer paints, we can usually remove 50-80% of all swirls, haze, and light defects, whereas on harder paints, we can only remove 40-60%. There is no one system or product that works for all vehicles, and we are well-versed in all modern polishes and techniques so that each vehicle can be tailored accordingly.</p>
                    <ul style="font-size: 1.1em;">
                        <li>Single Stage Paint Correction is performed using a dual-action (D/A) random orbital and polish. Extensive testing goes into each car to identify the optimal combination that will deliver the highest-quality results</li>
                        <li>8-10 hours of polishing</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of ss tabpanel -->

        <!-- ms -->
        <div class="tab-pane fade" id="pills-ms" role="tabpanel" aria-labelledby="pills-ms-tab">
            <div class="d-md-flex justify-content-md-start">
                <a href="{{ asset('assets') }}/img/services/image/ad6c.jpg">
                    <img src="{{ asset('assets') }}/img/services/image/ad6c.jpg" width="400">
                </a>
                <div class="ml-md-4 col-md-7">
                    <p style="font-size: 1.1em">When you step up to the realm of multi-stage paint correction, you’re significantly improving the finish by removing all of the swirls, and all but the heaviest of scratches and defects. This process starts with a heavy compounding machine polishing stage to remove the defects and then followed by a secondary polishing stage to refine the finish and increase gloss and clarity. Given the differences in paint types, condition, and size of vehicles, the rate for the Multi-Stage Paint Correction varies, but we will consult with each vehicle owner to provide a more precise pricing structure. The paint type and condition will also dictate the level of correction, but typically this process on most cars will get rid of 85-95% of all defects. And at this level of correction, you’re getting very close to that of a brand new vehicle without the expense of a re-paint!</p>
                    <ul style="font-size: 1.1em;">
                        <li>Multi-Stage Paint Correction is performed using a D/A random orbital, compound, and polish. Extensive testing goes into each car to identify the optimal combination that will deliver the highest-quality results. All painted surfaces will be metered for depth to ensure adequate and safe thicknesses prior to polishing</li>
                        <li>15+ hours of polishing</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  end of ms -->

    </div>
</div>
<!-- end of paint correction -->


<!-- ceramic coating -->
<div class="my-5" id="ceramic-coating">
    <div class="bg-skewed bg-ceramic-coating">
        <div class="content">
            <p class="h2 text-white font-weight-bold text-capitalize">ceramic coating</p>
            <p class="text-white">Protect and enhance your car’s paint with coatings.</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="text-center my-2 py-5">
            <p class="h2">Ceramic Coating</p>
            <div style="padding: 0 9em;">
                <p>What exactly is Ceramic Coating? Ceramic coating is a liquid that when applied to your vehicle hardens to form a semi-permanent barrier. Coatings, in addition to increasing gloss and shine, also add depth and richness to colours. Blacks will be darker, reds will be deeper, and so on. Coatings will have the same effect on coloured or satin wheels. It will not make satin wheels shiny, but it will darken and richen them.</p>
            </div>
        </div>

        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link h5 active rounded-0 text-uppercase" id="pills-body-coating-tab" data-toggle="pill" href="#pills-body-coating" role="tab" aria-controls="pills-body-coating" aria-selected="false">body coating</a>
            </li>

            <li class="nav-item">
                <a class="nav-link h5 rounded-0 text-uppercase" id="pills-wheel-coating-tab" data-toggle="pill" href="#pills-wheel-coating" role="tab" aria-controls="pills-wheel-coating" aria-selected="false">wheel coating</a>
            </li>

            <li class="nav-item">
                <a class="nav-link h5 rounded-0 text-uppercase" id="pills-a-la-carte-tab" data-toggle="pill" href="#pills-a-la-carte" role="tab" aria-controls="pills-a-la-carte" aria-selected="false">a la carte</a>
            </li>
        </ul>
        <hr>


        <div class="tab-content" id="pills-tabContent">
            <!-- body coating tabpanel -->
            <div class="tab-pane fade show active" id="pills-body-coating" role="tabpanel" aria-labelledby="pills-body-coating-tab">
                <div class="d-md-flex align-items-md-start justify-content-md-start">
                    <img src="{{ asset('assets') }}/img/services/image/ad7a.jpg" width="350">
                    <div class="ml-md-4">
                        <div class="card rounded-0 col-lg-10" style="background: #000;">
                            <div class="card-body">
                                <p class="h5 text-uppercase text-white">2 year coating</p>
                                <p class="card-text text-white">24 Month Durability</p>
                            </div>
                        </div>

                        <div class="card rounded-0 col-lg-10" style="background: #000;">
                            <div class="card-body">
                                <p class="h5 text-uppercase text-white">3 year coating</p>
                                <p class="card-text text-white">36 Month Durability</p>
                            </div>
                        </div>

                        <div class="card rounded-0 col-lg-10" style="background: #000;">
                            <div class="card-body">
                                <p class="h5 text-uppercase text-white">infinite warrantied coating</p>
                                <p class="card-text text-white">Infinite warranty with {{ config('app.name') }} maintaining the car bi-annually. This coating package carries a 5-year warranty if properly self-maintained.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of body coating tabpanel -->

            <!-- wheel coating tabpanel -->
            <div class="tab-pane fade" id="pills-wheel-coating" role="tabpanel" aria-labelledby="pills-wheel-coating-tab">
                <div class="d-md-flex align-items-md-start justify-content-md-start">
                    <img src="{{ asset('assets') }}/img/services/image/ad7b.jpg" width="350">
                    <div class="ml-md-4">
                        <div class="card rounded-0 col-lg-10" style="background: #000;">
                            <div class="card-body">
                                <p class="h5 text-uppercase text-white">1 layer</p>
                                <p class="card-text text-white">9-12 Months Durability</p>
                            </div>
                        </div>

                        <div class="card rounded-0 col-lg-10" style="background: #000;">
                            <div class="card-body">
                                <p class="h5 text-uppercase text-white">2 layer</p>
                                <p class="card-text text-white">18+ Months Durability</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of wheel coating tabpanel -->

            <!-- a la carte  -->
            <div class="tab-pane fade" id="pills-a-la-carte" role="tabpanel" aria-labelledby="pills-a-la-carte-tab">
                <div class="d-md-flex align-items-md-start justify-content-md-start">
                    <img src="{{ asset('assets') }}/img/services/image/ad7c.jpg" width="350">
                    <div>
                        <ul style="font-size: 1.1em;">
                            <li>Windshield</li>
                            <li>Fabric</li>
                            <li>Leather Coat</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--  end of a la carte tabpanel -->

        </div>
    </div>
</div>
<!-- end of ceramic coating -->

<!-- paint enhancement-->
<div class="container mt-5" id="paint">
    <div class="text-center my-2 py-5">
        <p class="h2">Paint Enhancement</p>
        <div style="padding: 0 9em;">
            <p style="font-size: medium">
                Have you ever looked at your paint in the sunlight and noticed a web of swirls and scratches? These are known as micro-scratches, and they prevent your car from shining.
                <br>
                <br>
                What causes this? This occurs as a result of poor washing and drying techniques, which cause scratches and swirls over time. Using stiff brushes, for example, causes swirls, and using automatic car washes causes imperfections.
                <br>
                <br>
                This service removes approximately 40 to 60% of the imperfections to reveal the paint's shine and clarity.
            </p>
        </div>
    </div>
    <div class="control d-none" id="paint-slider-control">
        <div class="pull-right prev">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
        </div>

        <div class="pull-right next">
            <i class="now-ui-icons arrows-1_minimal-right"></i>
        </div>
    </div>

    <div class="paint-slider">
        <div>
            <div class="card" style="height: 600px;">
                <img src="{{ asset('assets') }}/img/services/image/ad8a.jpg" class="image-fill rounded-0" alt="...">

                <div class="card-img-overlay">
                    <div class="d-flex justify-content-center">
                        <div class="bg-white py-5 px-4 w-100 ">
                            <p class="h4">Small</p>
                            <p style="font-size: medium;">Coupe/Sedan</p>
                            <p class="h4">${{ number_format('475', 2) }} </p>
                            <small><a href="{{ route('contact.index') }}" class="font-weight-bold text-uppercase text-primary-bottom-dark pb-1">book now</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card" style="height: 600px;">
                <img src="{{ asset('assets') }}/img/services/image/ad8b.jpeg" class="image-fill rounded-0" alt="...">
                <div class="card-img-overlay">
                    <div class="d-flex justify-content-center">
                        <div class="bg-white py-5 px-4 w-100">
                            <p class="h4">Medium</p>
                            <p style="font-size: medium;">SUV/Truck</p>
                            <p class="h4">${{ number_format('650', 2) }} </p>
                            <small><a href="{{ route('contact.index') }}" class="font-weight-bold text-uppercase text-primary-bottom-dark pb-1">book now</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card" style="height: 600px;">
                <img src="{{ asset('assets') }}/img/services/image/ad8c.jpeg" class="image-fill rounded-0" alt="...">
                <div class="card-img-overlay">
                    <div class="d-flex justify-content-center">
                        <div class="bg-white py-5 px-4 w-100 ">
                            <p class="h4">Large</p>
                            <p style="font-size: medium;">Mini Van/Van</p>
                            <p class="h4">${{ number_format('850', 2) }} </p>
                            <small><a href="{{ route('contact.index') }}" class="font-weight-bold text-uppercase text-primary-bottom-dark pb-1">book now</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of paint enhancement -->
<div class="container mt-5">
    <div class="text-center my-2 py-5">
        <p class="h5">Extra Services</p>
        <div style="padding: 0 9em;">
            <p>Services below can be added onto packages.</p>
        </div>
    </div>
    <div class="col-md-9 m-auto">
        <!-- vomit removal -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Vomit removal</p>
            </div>
            <div>
                <p style="font-size: medium;">${{ number_format('350', 2) }} & up</p>
            </div>
        </div>
        <!-- end of vomit removal -->

        <!-- decal/vinyl removal -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Decal/Vinyl removal</p>
            </div>
            <div>
                <p style="font-size: medium;">Call for estimate</p>
            </div>
        </div>
        <!-- end of decal/vinyl removal -->

        <!-- Headlight restoration -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Headlight restoration</p>
            </div>
            <div>
                <p style="font-size: medium;">${{ number_format('60', 2) }} per lens & up</p>
            </div>
        </div>
        <!-- end of Headlight restoration -->

        <!-- Scratch removal -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Scratch removal</p>
            </div>
            <div>
                <p style="font-size: medium;">Call for estimate</p>
            </div>
        </div>
        <!-- end of Scratch removal -->

        <!-- Alloy wheel restoration -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Alloy wheel restoration</p>
            </div>
            <div>
                <p style="font-size: medium;">Call for estimate</p>
            </div>
        </div>
        <!-- end of Alloy wheel restoration -->

        <!-- Smoke smell removal -->
        <div class="d-md-flex justify-content-md-between align-items-md-start">
            <div>
                <p class="h5">Smoke smell removal</p>
            </div>
            <div>
                <p style="font-size: medium;">${{ number_format('350', 2) }} & up</p>
            </div>
        </div>
        <!-- end of Smoke smell removal -->

    </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/itemSlider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/paintSlider.js"></script>

@endpush