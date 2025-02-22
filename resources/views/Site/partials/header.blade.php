<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('Site/assets/images/logo.png')}}" alt="Ajeep Logo" class="logo">
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Language Selection -->
            <div class="dropdown me-3 language-dropdown">
                <a class="btn" href="#" role="button" id="languageDropdown" data-bs-toggle="dropdown">
                    <!-- تغيير الصورة بناءً على اللغة الحالية -->
                    <img src="{{ session('locale', app()->getLocale()) == 'en' ? asset('Site/assets/images/lang-en.png') : asset('Site/assets/images/lang-ar.png') }}" alt="Language" class="language-icon">
                </a>
                <ul class="dropdown-menu language-box">
                    <div class="language-header">
                        <p class="change-language-text">{{ __('messages.Change-Language') }}</p>
                        <p class="select-language-text">{{ __('messages.Select-Language') }}</p>
                    </div>
                    <li>
                        <a class="dropdown-item " href="{{ route('UserSetLocale', 'en') }}" data-lang="en">
                            <div class="language-option {{ session('locale', app()->getLocale()) == 'en' ? 'selected' : '' }} " data-lang="en">
                                <!-- تحقق من اللغة الحالية لإظهار علامة الصح -->
                                <img src="{{ asset('Site/assets/images/lang-en.png') }}" alt="English">
                                <span>English</span>
                                <!-- تظهر العلامة فقط إذا كانت اللغة هي الإنجليزية -->
                                @if(session('locale', app()->getLocale()) == 'en')
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                                @endif
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('UserSetLocale', 'ar') }}" data-lang="ar">
                            <div class="language-option {{ session('locale', app()->getLocale()) == 'ar' ? 'selected' : '' }} " data-lang="ar">
                                <!-- تحقق من اللغة الحالية لإظهار علامة الصح -->
                                <img src="{{ asset('Site/assets/images/lang-ar.png') }}" alt="العربية">
                                <span>العربية</span>
                                <!-- تظهر العلامة فقط إذا كانت اللغة هي العربية -->
                                @if(session('locale', app()->getLocale()) == 'ar')
                                <span class="checkmark"><i class="fas fa-check"></i></span>
                                @endif
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">{{__('messages.Home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.About')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link service" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{__('messages.Services')}} <i id="servicesArrow" class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" id="service-dropdown-menu">
                            <li><a class="dropdown-item" href="#">{{__('messages.Preparing-price-quotations')}}</a></li>
                            <li><a class="dropdown-item" href="#">{{__('messages.Inspecting-ensuring-their-safety')}}</a></li>
                            <li><a class="dropdown-item" href="#">{{__('messages.Purchasing-products-shipping-them')}}</a></li>
                            <li><a class="dropdown-item" href="#">{{__('messages.customs-clearance')}}</a></li>
                            <li><a class="dropdown-item" href="#">{{__('messages.Preparing-a-SABE-Certificate')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/blog-list.html">{{__('messages.Blogs')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/faq.html">{{__('messages.FAQ')}}</a>
                    </li>
                </ul>

                <!-- Contact Us Button -->
                <a class="contact-btn  " href="#">{{__('messages.ContactUs')}} </a>
            </div>
        </div>
    </nav>
</header>