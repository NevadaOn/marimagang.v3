@extends('layouts.user.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card mt-24">
        <div class="card-body">
            <h4 class="mb-20">Recent Mentors</h4>

            <div class="row g-20">
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mentor-card rounded-8 overflow-hidden">
                        <div class="mentor-card__cover position-relative">
                            <img src="assets/images/thumbs/mentor-cover-img1.png" alt="" class="cover-img">
                            <button type="button"
                                class="follow-btn py-2 px-8 flex-align gap-4 text-13 fw-medium text-white border border-white rounded-pill position-absolute inset-block-start-0 inset-inline-end-0 mt-8 me-8 transition-1">
                                <i class="ph ph-plus d-flex"></i>
                                <span class="text">Follow</span>
                            </button>
                        </div>
                        <div class="mentor-card__content text-center">
                            <div class="w-56 h-56 rounded-circle overflow-hidden border border-white d-inline-block">
                                <a href="setting.html" class="">
                                    <img src="assets/images/thumbs/mentor-img1.png" alt=""
                                        class="mentor-card__img cover-img">
                                </a>
                            </div>
                            <h5 class="mb-0">
                                <a href="setting.html">Maria Prova</a>
                            </h5>
                            <span class="text-13 text-gray-500">Content Writer</span>

                            <p class="mt-20 text-gray-600 text-14 text-line-2">Hi, I am Alex Stanton, A doctoral a Oxford
                                University majoring in UI/UX. I have working for 2 years in a local company..</p>

                            <div
                                class="mentor-card__rating mt-20 border border-gray-100 px-8 py-6 rounded-8 flex-between flex-wrap">
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-main-600 d-flex"><i
                                            class="ph-fill ph-book-open"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">45 Tasks</span>
                                </div>
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">4.8</span>
                                    <span class="text-13 fw-normal text-gray-600">(750 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mentor-card rounded-8 overflow-hidden">
                        <div class="mentor-card__cover position-relative">
                            <img src="assets/images/thumbs/mentor-cover-img2.png" alt="" class="cover-img">
                            <button type="button"
                                class="follow-btn py-2 px-8 flex-align gap-4 text-13 fw-medium text-white border border-white rounded-pill position-absolute inset-block-start-0 inset-inline-end-0 mt-8 me-8 transition-1">
                                <i class="ph ph-plus d-flex"></i>
                                <span class="text">Follow</span>
                            </button>
                        </div>
                        <div class="mentor-card__content text-center">
                            <div class="w-56 h-56 rounded-circle overflow-hidden border border-white d-inline-block">
                                <a href="setting.html" class="">
                                    <img src="assets/images/thumbs/mentor-img2.png" alt=""
                                        class="mentor-card__img cover-img">
                                </a>
                            </div>
                            <h5 class="mb-0">
                                <a href="setting.html">Alex John</a>
                            </h5>
                            <span class="text-13 text-gray-500">Web Developer</span>

                            <p class="mt-20 text-gray-600 text-14 text-line-2">Hi, I am Alex Stanton, A doctoral a Oxford
                                University majoring in UI/UX. I have working for 2 years in a local company..</p>

                            <div
                                class="mentor-card__rating mt-20 border border-gray-100 px-8 py-6 rounded-8 flex-between flex-wrap">
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-main-600 d-flex"><i
                                            class="ph-fill ph-book-open"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">45 Tasks</span>
                                </div>
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">4.8</span>
                                    <span class="text-13 fw-normal text-gray-600">(750 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mentor-card rounded-8 overflow-hidden">
                        <div class="mentor-card__cover position-relative">
                            <img src="assets/images/thumbs/mentor-cover-img3.png" alt="" class="cover-img">
                            <button type="button"
                                class="follow-btn py-2 px-8 flex-align gap-4 text-13 fw-medium text-white border border-white rounded-pill position-absolute inset-block-start-0 inset-inline-end-0 mt-8 me-8 transition-1">
                                <i class="ph ph-plus d-flex"></i>
                                <span class="text">Follow</span>
                            </button>
                        </div>
                        <div class="mentor-card__content text-center">
                            <div class="w-56 h-56 rounded-circle overflow-hidden border border-white d-inline-block">
                                <a href="setting.html" class="">
                                    <img src="assets/images/thumbs/mentor-img3.png" alt=""
                                        class="mentor-card__img cover-img">
                                </a>
                            </div>
                            <h5 class="mb-0">
                                <a href="setting.html">Maria Prova</a>
                            </h5>
                            <span class="text-13 text-gray-500">Front-End Developer</span>

                            <p class="mt-20 text-gray-600 text-14 text-line-2">Hi, I am Alex Stanton, A doctoral a Oxford
                                University majoring in UI/UX. I have working for 2 years in a local company..</p>

                            <div
                                class="mentor-card__rating mt-20 border border-gray-100 px-8 py-6 rounded-8 flex-between flex-wrap">
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-main-600 d-flex"><i
                                            class="ph-fill ph-book-open"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">45 Tasks</span>
                                </div>
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">4.8</span>
                                    <span class="text-13 fw-normal text-gray-600">(750 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mentor-card rounded-8 overflow-hidden">
                        <div class="mentor-card__cover position-relative">
                            <img src="assets/images/thumbs/mentor-cover-img4.png" alt="" class="cover-img">
                            <button type="button"
                                class="follow-btn py-2 px-8 flex-align gap-4 text-13 fw-medium text-white border border-white rounded-pill position-absolute inset-block-start-0 inset-inline-end-0 mt-8 me-8 transition-1">
                                <i class="ph ph-plus d-flex"></i>
                                <span class="text">Follow</span>
                            </button>
                        </div>
                        <div class="mentor-card__content text-center">
                            <div class="w-56 h-56 rounded-circle overflow-hidden border border-white d-inline-block">
                                <a href="setting.html" class="">
                                    <img src="assets/images/thumbs/mentor-img4.png" alt=""
                                        class="mentor-card__img cover-img">
                                </a>
                            </div>
                            <h5 class="mb-0">
                                <a href="setting.html">Hawkins</a>
                            </h5>
                            <span class="text-13 text-gray-500">Graphic Designer</span>

                            <p class="mt-20 text-gray-600 text-14 text-line-2">Hi, I am Alex Stanton, A doctoral a Oxford
                                University majoring in UI/UX. I have working for 2 years in a local company..</p>

                            <div
                                class="mentor-card__rating mt-20 border border-gray-100 px-8 py-6 rounded-8 flex-between flex-wrap">
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-main-600 d-flex"><i
                                            class="ph-fill ph-book-open"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">45 Tasks</span>
                                </div>
                                <div class="flex-align gap-4">
                                    <span class="text-15 fw-normal text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-13 fw-normal text-gray-600">4.8</span>
                                    <span class="text-13 fw-normal text-gray-600">(750 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection