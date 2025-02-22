@extends('Site.layouts.app')
@section('title', 'Welcome')

@section('contents')
<style>
    :root {
        --hero-bg: url('{{ asset("Site/assets/images/herobg.jpg") }}');
    }
</style>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container ">
        <div>
            <div class="hero-text1">

                {{__('messages.hero1')}}
            </div>
            <div class="hero-text2">
                {{__('messages.hero2')}}
            </div>

        </div>
        <!-- Box Container with Tabs inside the hero section -->
        <div class="box-container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link no-shadow active" id="tab1" data-bs-toggle="tab" href="#option1" role="tab"
                        aria-controls="option1" aria-selected="true"> {{__('messages.Calculate-volumetric-weight')}}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link no-shadow" id="tab2" data-bs-toggle="tab" href="#option2" role="tab" aria-controls="option2"
                        aria-selected="false"> {{__('messages.Trackhipment')}}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link no-shadow" id="tab3" data-bs-toggle="tab" href="#option3" role="tab" aria-controls="option3"
                        aria-selected="false"> {{__('messages.CBMCalculator')}}</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Option 1 Content -->
                <div class="tab-pane fade show active" id="option1" role="tabpanel" aria-labelledby="tab1">
                    <div class="input-group">
                        <div class="row">
                            <!-- Unit Select -->
                            <div class="col-12 col-sm-12 col-md-12 col-lg-10 row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-2 ">
                                    <select name style="border-radius: 10px;" class="custom-input w-100">
                                        <option value="val"> {{__('messages.Unit')}}</option>
                                    </select>
                                </div>
                                <!-- Length -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder="  {{__('messages.Length')}}" class="custom-input w-100">
                                </div>
                                <!-- Width -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Width')}}" class="custom-input w-100">
                                </div>
                                <!-- Height -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder="  {{__('messages.Height')}}" class="custom-input w-100">
                                </div>
                                <!-- Box Count -->
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Box-Count')}}" class="custom-input w-100"
                                        id="custom-input-boxcount">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                <button class="calculate-btn w-100" onclick="showVolumetricModal()" style="border-radius: 30px;width: 200px;"> {{__('messages.Calculate')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Option 2 Content -->
                <div class="tab-pane fade" id="option2" role="tabpanel" aria-labelledby="tab2">
                    <div class="input-group">
                        <div class="col-12 row">
                            <!-- Unit Select -->
                            <div class="col-12 col-sm-12 col-md-12 col-lg-10 ">
                                <!--   Shipment Number -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Enter-your-Shipmen-Number')}}"
                                        class="custom-input w-100" id="custom-input-Shipment-Number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                <button class="calculate-btn" style="border-radius: 30px;width: 100%;text-align: center;" onclick="showTrackShipmentModal()"> {{__('messages.Track')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Option 3 Content -->
                <div class="tab-pane fade" id="option3" role="tabpanel" aria-labelledby="tab3">
                    <div class="input-group">
                        <div class="row">
                            <!-- Unit Select -->
                            <div class="col-12 col-sm-12 col-md-12 col-lg-10 row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-2 ">
                                    <select name style="border-radius: 10px;" class="custom-input w-100">
                                        <option value="val">{{__('messages.Unit')}}</option>
                                    </select>
                                </div>
                                <!-- Length -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Length')}}" class="custom-input w-100">
                                </div>
                                <!-- Width -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Width')}}" class="custom-input w-100">
                                </div>
                                <!-- Height -->
                                <div class="col-2 col-sm-4 col-md-4 col-lg-2 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder=" {{__('messages.Height')}}" class="custom-input w-100">
                                </div>
                                <!-- Box Count -->
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-2">
                                    <input type="text" style="border-radius: 10px;" placeholder="{{__('messages.Quantity')}}" class="custom-input w-100"
                                        id="custom-input-boxcount">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                <button class="calculate-btn w-100" onclick="showCMBModal()" style="border-radius: 30px;width: 200px;"> {{__('messages.Calculate')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>




<section class="serviceSection">
    <div class="rounded-4 serviceContiner">
        <div>
            <!-- النص الأساسي والفرعي -->
            <div class="text-container">
                <h3 class="title">
                {{__('messages.service-title')}}</h3>
                <h1 class="subtitle">
                {{__('messages.service-subtitle')}}</h1>
            </div>

            <!-- باقي المحتوى -->
            <div class="service-wrapper">
                <div class="service-card">
                    <img src="{{ asset('Site/assets/assets/images/_x3C_Group_x3E__24_.svg')}}" alt="Domestic transportation icon">
                    <h3>Domestic transportation</h3>
                    <p>Ajeeb Express, we have Arabic-speaking representatives...</p>
                </div>

                <div class="service-card">
                    <img src="{{ asset('Site/assets/images/Group.svg')}}" alt="Lower prices icon">
                    <h3>Lower prices</h3>
                    <p>You will get with us the prices of products from factories inside China...</p>
                </div>

                <div class="service-card">
                    <img src="{{ asset('Site/assets/images/airplane%201.svg')}}" alt="Secure facility icon">
                    <h3>Secure facility</h3>
                    <p>We are a registered entity under the name 'Al-Ajeeb Al-Mufeed Trading...</p>
                </div>

                <div class="service-card">
                    <img src="{{ asset('Site/assets/images/exclude%201.svg')}}" alt="Multiple options icon">
                    <h3>Multiple options</h3>
                    <p>China has been a major industrial nation for decades...</p>
                </div>

                <div class="service-card">
                    <img src="{{ asset('Site/assets/images/location%20(1)%201.svg')}}" alt="Credibility of your order icon">
                    <h3>Credibility of your order</h3>
                    <p>We are pleased to offer a service at Ajeeb Express...</p>
                </div>

                <div class="service-card">
                    <img src="{{ asset('Site/assets/images/destination%201.svg')}}" alt="Track your order icon">
                    <h3>Track your order</h3>
                    <p>Through the tracking page, you can easily track your order...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-us py-5 px-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $whyUsData['image']) }}" class="img-fluid" alt="Image" />
            </div>
            <div class="col-md-6">
                <h2 class="why-us-title"> {{__('messages.WhyUs')}}</h2>
                <h3 class="why-us-subtitle">
                {{ $whyUsData['translation']['title'] }}
                </h3>
                <p class="why-us-description">
                {{ $whyUsData['translation']['description'] }}
                </p>
           
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="box py-2">
                         
                            <h3 class="box-number">{{ $whyUsData['orders_delivered'] }}</h3>
                            <p class="box-description">{{ __('messages.OrdersDelivered') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="box py-2">
                          
                            <h3 class="box-number">{{ $whyUsData['satisfied_clients'] }}</h3>
                            <p class="box-description">{{ __('messages.SatisfiedClients') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="our-partners py-5 px-3">
    <div class="container">
        <!-- العنوان في المنتصف -->
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="our-partners-title">Our Partners</h2>
            </div>
        </div>

        <!-- البوكسات الخاصة بالشركاء -->
        <div class="row">
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part1.png')}}" alt="Partner 1" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part2.png')}}" alt="Partner 2" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part3.png')}}" alt="Partner 3" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part4.png')}}" alt="Partner 4" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part5.png')}}" alt="Partner 5" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-6">
                <div class="box text-center">
                    <div class="partner-image">
                        <img src="{{ asset('Site/assets/images/part6.png')}} " alt="Partner 6" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-blog py-5 px-3">
    <div class="container">
        <!-- العنوان الرئيسي -->
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="main-title">Our Blog</h3>
            </div>
        </div>
        <!-- النص أسفل العنوان -->
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="sub-title">Our Latest Blogs</h2>
            </div>
        </div>

        <!-- الرو مع 3 بوكسات -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="box">
                    <div class="image-container">
                        <img src="{{ asset('Site/assets/images/blog1.png')}}" alt="Blog 1" class="img-fluid" />
                    </div>
                    <p class="date">26, January</p>
                    <p class="content">Shipment Consolidation from China with Ajib Express: Customized Shipping</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="box">
                    <div class="image-container">
                        <img src="{{ asset('Site/assets/images/blog2.png')}}" alt="Blog 2" class="img-fluid" />
                    </div>
                    <p class="date">27, January</p>
                    <p class="content">Logistics Solutions for Businesses with Ajib Express: Shipping Made Easy</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="box">
                    <div class="image-container">
                        <img src="{{ asset('Site/assets/images/blog3.png')}}" alt="Blog 3" class="img-fluid" />
                    </div>
                    <p class="date">28, January</p>
                    <p class="content">Optimizing Delivery Routes with Ajib Express for Fast and Reliable Service</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscribe-section">
    <div class="container subscribe-content ">
        <!-- العنوان الرئيسي -->
        <div class="title">Subscribe To Our Newsletter</div>
        <!-- العنوان الفرعي -->
        <div class="sub-title">Unlock Exclusive Insights Subscribe to Our Newsletter</div>

        <!-- بوكس إدخال البريد الإلكتروني -->
        <div class="input-box">
            <input type="email" placeholder="Enter Your Email Address">
            <button class="subscribe-btn">Subscribe Now</button>
        </div>

        <!-- النص مع علامة التعجب -->
        <div class="footer-text">
            <img src="{{ asset('Site/assets/images/subscrib.svg')}}" alt="Exclamation Mark">
            Your email is safe with us no spam, just valuable updates!
        </div>
    </div>
</section>
@endsection