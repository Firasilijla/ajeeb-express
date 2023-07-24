<!-- TradingView Widget BEGIN -->
@extends('User.layouts.app')
@section('title',' Contact ')
@section('content')
<link href="{{asset('assets/css/pages/wizard/wizard-2.css')}}" rel="stylesheet" type="text/css" />
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
<div class="container ">

  <div class="row">
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <div class="card card-custom">
          <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-2" id="kt_wizard_v2" data-wizard-state="step-first" data-wizard-clickable="false">
              <!--begin: Wizard Nav-->
              <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
                <!--begin::Wizard Step 1 Nav-->
                <div class="wizard-steps" style="direction: ltr; text-align: left;">
                  <div class="wizard-step mt-2" data-wizard-type="step" data-wizard-state="current">
                    <div class="wizard-wrapper">
                      <div class="wizard-icon">
                        <span class="svg-icon svg-icon-2x">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <polygon points="0 0 24 0 24 24 0 24" />
                              <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                              <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                      <div class="wizard-label">
                        <h3 class="wizard-title">Contact Info</h3>
                        <div class="wizard-desc">you can Contact with Us </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Wizard Step 1 Nav-->
                  <!--begin::Wizard Step 2 Nav-->
                  <div class="wizard-step mt-2" data-wizard-type="step" data-wizard-state="current">
                    <div class="wizard-wrapper">
                      <div class="wizard-icon">
                        <span class="svg-icon svg-icon-2x">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                          </svg>
                          <!--end::Svg Icon-->
                        </span>
                      </div>
                      <div class="wizard-label">
                        <h3 class="wizard-title">Address </h3>
                        <div class="wizard-desc" id="address">New York 23066 / Pacific Street / Brooklyn</div>
                      </div>
                    </div>
                  </div>
                  <!--end::Wizard Step 2 Nav-->
                  <!--begin::Wizard Step 3 Nav-->
                  <div class="wizard-step mt-2" data-wizard-type="step" data-wizard-state="current">
                    <a href="" id="email_link">
                      <div class="wizard-wrapper">
                        <div class="wizard-icon">
                          <span class="svg-icon svg-icon-2x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z" fill="#000000" opacity="0.3" />
                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                              </g>
                            </svg>
                            <!--end::Svg Icon-->
                          </span>
                        </div>
                        <div class="wizard-label">
                          <h3 class="wizard-title">Email </h3>
                          <div class="wizard-desc" id="email">support@plustrx.com</div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!--end::Wizard Step 3 Nav-->
                  <!--begin::Wizard Step 4 Nav-->
                  <div class="wizard-step mt-2" data-wizard-type="step" data-wizard-state="current">
                    <a href="" class="telegram-link">
                      <div class="wizard-wrapper">
                        <div class="wizard-icon">
                          <span class="svg-icon svg-icon-2x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) " />
                              </g>
                            </svg>
                            </svg>
                            <!--end::Svg Icon-->
                          </span>
                        </div>
                        <div class="wizard-label">
                          <h3 class="wizard-title"> TEL-telegram</h3>
                          <div class="wizard-desc" id="telegram">Live Chat Support Tel</div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!--end::Wizard Step 4 Nav-->
                  <!--begin::Wizard Step 5 Nav-->
                  <div class="wizard-step mt-2" data-wizard-type="step" data-wizard-state="current">

                    <a href="" class="whatsapp-link">
                      <div class="wizard-wrapper">
                        <div class="wizard-icon">
                          <span class="svg-icon svg-icon-2x">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
                            <i class="fab fa-whatsapp" style="font-size: 25px;"></i>
                            <!--end::Svg Icon-->
                          </span>
                        </div>
                        <div class="wizard-label">
                          <h3 class="wizard-title"> WhatsApp</h3>
                          <div class="wizard-desc" id="whatsapp">Live Chat Support WhatsApp</div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!--end::Wizard Step 5 Nav-->
                  <!--begin::Wizard Step 6 Nav-->

                  <!--end::Wizard Step 6 Nav-->
                </div>
              </div>
              <!--end: Wizard Nav-->
              <!--begin: Wizard Body-->
              <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                <!--begin: Wizard Form-->
                <div class="row">
                  <div class="offset-xxl-2 col-xxl-8">
                    <form class="form" id="kt_form">
                      <!--begin: Wizard Step 1-->
                      <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <!-- <h4 class="mb-10 font-weight-bold text-dark">Enter your Account Details</h4> -->
                        <!--begin::Input-->
                        <h5 class="mb-10 font-weight-bold text-dark text-right">Location Map </h5>
                        <!-- <div id="map"></div>
                        <input type="text" id="name" placeholder="اسم الموقع">
                        <button onclick="saveLocation()">حفظ</button> -->
                        <div class="fieldset">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193578.74109041138!2d-73.97968099999997!3d40.70331274999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York+NYC%2C+New+York%2C+Statele+Unite+ale+Americii!5e0!3m2!1sro!2s!4v1425027721891" width="100%" height="330" frameborder="0" style="border:0"></iframe>
                        </div>
                      </div>
                      <!--end: Wizard Step 1-->
                      <!--begin: Wizard Step 2-->

                      <!--end: Wizard Actions-->
                    </form>
                  </div>
                  <!--end: Wizard-->
                </div>
                <!--end: Wizard Form-->
              </div>
              <!--end: Wizard Body-->
            </div>
            <!--end: Wizard-->
          </div>
        </div>
      </div>
      <!--end::Container-->
    </div>
  </div>
  <!-- TradingView Widget END -->
</div>

<!-- --------------  -->
<script src="{{asset('userassets/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-2.js')}}"></script>
<script src="{{asset('userassets/js/swiper-init-swipe.js')}}"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="{{asset('userassets/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
<script>
  $(document).ready(function() {
    // Select the element with the class "whatsapp-link"
    $(".whatsapp-link").on("click", function(event) {
      event.preventDefault(); // Prevent the default link behavior
      $.ajax({
        type: "POST",
        url: "{{ route('user.Settings.getQRData') }}",
        data: {
          "_token": "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res) {
          // ----------------------social ---------- 

          var phoneNumber = res.whatsapp; // Replace with the phone number you want to use

          // Create the WhatsApp link
          var whatsappLink = "https://wa.me/" + phoneNumber;

          // Set the href attribute of the <a> element to the WhatsApp link
          $(this).attr("href", whatsappLink);

          // Open the WhatsApp link
          window.location.href = whatsappLink;
        },
        error: function(reject) {
          alert('err');
        }
      });


    });
    $(".telegram-link").on("click", function(event) {
      event.preventDefault(); // Prevent the default link behavior
      $.ajax({
        type: "POST",
        url: "{{ route('user.Settings.getQRData') }}",
        data: {
          "_token": "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res) {
          // ----------------------social ---------- 
          var telegramUsername = res.telegram; // Replace with the Telegram username you want to use

          // Create the Telegram link
          var telegramLink = "https://t.me/" + telegramUsername;

          // Set the href attribute of the <a> element to the Telegram link
          $(this).attr("href", telegramLink);

          // Open the Telegram link
          window.location.href = telegramLink;
        },
        error: function(reject) {
          alert('err');
        }
      });


    });
  });

  $(function() {

    var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
      });
    });



    $.ajax({
      type: "POST",
      url: "{{ route('user.Settings.getQRData') }}",
      data: {
        "_token": "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function(res) {
        // ----------------------social ---------- 
        $("#location").text(res.location);
        $("#telegram").text(res.telegram);
        $("#whatsapp").text(res.whatsapp);
        $("#email").text(res.email);

        event.preventDefault(); // Prevent the default link behavior
        var phoneNumber = res.whatsapp; // Replace with the phone number you want to use
        // Create the WhatsApp link
        var whatsappLink = "https://wa.me/" + phoneNumber;

        $("#location_link").attr('href', res.location);
        $("#telegram_link").attr('href', "tg://resolve?domain=" + res.telegram);
        $("#whatsapp_link").attr("href", whatsappLink);
        $("#email_link").attr('href', "mailto:" + res.email);



      },
      error: function(reject) {
        alert('err');
      }
    });
  });

  $(document).ready(function() {


    $.ajax({
      type: "POST",
      url: "{{ route('user.Settings.getQRData') }}",
      data: {
        "_token": "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function(res) {

        // ----------------------social ---------- 
        $("#location").text(res.location);
        $("#telegram").text(res.telegram);
        $("#whatsapp").text(res.whatsapp);
        $("#email").text(res.email);


        $("#location_link").attr('href', res.location);
        $("#telegram_link").attr('href', res.telegram);
        $("#whatsapp_link").attr('href', res.whatsapp);
        $("#email_link").attr('href', res.email);



      }
    });


    $('#google_translate_element').bind('DOMNodeInserted', function(event) {
      $('.goog-te-menu-value span:first').html('LANGUAGE');
      $('.goog-te-menu-frame.skiptranslate').load(function() {
        setTimeout(function() {
          $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('LANGUAGE');
        }, 100);
      });
    });
  });
</script>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: "en,fr,ar,es",
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }
  // ---------------------------------------- 

  let map;
  let marker;

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: 0,
        lng: 0
      },
      zoom: 2
    });

    map.addListener('click', (event) => {
      placeMarker(event.latLng);
    });
  }

  function placeMarker(location) {
    if (marker) {
      marker.setMap(null);
    }
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

  function saveLocation() {
    const latitude = marker.getPosition().lat();
    const longitude = marker.getPosition().lng();
    const name = document.getElementById('name').value;

    const data = {
      latitude: latitude,
      longitude: longitude,
      name: name
    };

    fetch('/locations', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => alert(data.message))
      .catch(error => console.error('Error:', error));
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>


@endsection