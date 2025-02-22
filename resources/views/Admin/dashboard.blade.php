@extends('Admin.layouts.app')
@section('title', 'Dashboard')
@section('Breadcrumb')

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
<!--end::Title-->
<!--begin::Separator-->
<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
<!--end::Separator-->
<!--begin::Search Form-->
<!-- <div class="d-flex align-items-center" id="kt_subheader_search">
											<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Alex Stone</span>
										</div> -->
@endsection
@section('contents')

<div class="loaders">
    <div class="loader-container">
        <img src="{{ asset('assets/media/logos/meta.png') }}" alt="Loading..." class="loader-image">
    </div>
</div>

<style>
    /* الحاوية الرئيسية للودر */
    .loaders {
        width: 100%;
        height: 61vh;
        /* تأكد من أن الارتفاع يغطي كامل الشاشة */
        display: flex;
        align-items: center;
        /* محاذاة العناصر عموديًا في الوسط */
        justify-content: center;
        /* محاذاة العناصر أفقيًا في الوسط */
        position: relative;
    }

    /* الحاوية الخاصة بالصورة */
    .loader-container {
        position: relative;
        text-align: center;
        z-index: 1;
    }

    /* الصورة */
    .loader-image {
        width: 150px;
        /* حجم الصورة */
        position: relative;
        z-index: 2;
        /* تأكد من أن الصورة فوق أي عناصر أخرى */
        animation: moveUpDown 2s ease-in-out infinite;
        /* حركة بسيطة للأعلى والأسفل */
    }

    /* تأثير الحركة للأعلى والأسفل */
    @keyframes moveUpDown {
        0% {
            transform: translateY(0);
            /* بداية الحركة في مكانها */
        }

        50% {
            transform: translateY(-15px);
            /* حركة خفيفة لأعلى */
        }

        100% {
            transform: translateY(0);
            /* العودة إلى مكانها */
        }
    }
</style>
@endsection