@extends('layouts.app')
@section('content')

{{-- blog-card section  --}}
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7 order-2 order-md-1">
            <p class=" fw-bold fs-4  text-left">Latest Post</p>

            {{-- blog-card --}}
                <div class="blog-card shadow my-4">
                    <div class="blog-image ">
                        <img src="{{ asset('assets/images/visualsofdana-T5pL6ciEn-I-unsplash.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="blog-details ">
                        {{-- header-information --}}
                            <div class="px-3    header-information d-flex justify-content-between">
                                <div class="category">
                                    <p class="text-muted "><i class="fas fa-globe mx-2"></i>  WEB DEVELOPMENT</p>
                                </div>
                                <div class="created_date">
                                    <small class="text-muted fst-italic"><i class="fas fa-calendar mx-2"></i>4 days ago</small>
                                </div>

                            </div>
                            <div class="line"></div>
                        {{-- header-information --}}

                        {{-- title of the post start --}}
                        <div class="fs-5 text-center  fw-lighter">LARAVEL FRAMEWORK</div>
                        {{-- title of the post end --}}
                        {{-- blog-details-start --}}
                            <div class="blog-infor px-3">
                                <small class="fs-6">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                </small>


                                        <a href="{{ route('blog.show') }}" class="text-decoration-none fst-italic fw-bold ">  <i class="fas fa-eye"></i></small> Read_more </a>
                                        {{-- <a href="" class="text-decoration-none fst-italic text-danger fw-bold mx-2"> <i class="fas fa-trash"></i> Delete</a> --}}
                                        {{-- <a href="" class="fas fa-pen-to-square text-warning fw-bold text-decoration-none "></i> <i>Edit</i></a> <br> --}}

                                        {{-- starts_start --}}
                                            <div class="starts text-center">


                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star-half text-warning"></i>

                                            </div>
                                        {{-- starts_end --}}
                                    </div>
                        {{-- blog-details-end --}}

                        {{-- author start --}}

                        <div class="author d-flex justify-content-between">

                            <div class="author-image px-4">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                                </div>

                            </div>
                            <div class="author-details mx-4 fst-italic text-muted">
                                    <small>Brendah</small>

                                </div>
                        </div>
                        {{-- author end --}}
                    </div>
                </div>
            {{-- blog-card --}}

            {{-- blog-card --}}
                <div class="blog-card shadow my-4">
                    <div class="blog-image ">
                        <img src="{{ asset('assets/images/visualsofdana-T5pL6ciEn-I-unsplash.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="blog-details ">
                        {{-- header-information --}}
                            <div class="px-3    header-information d-flex justify-content-between">
                                <div class="category">
                                    <p class="text-muted "><i class="fas fa-globe mx-2"></i>  WEB DEVELOPMENT</p>
                                </div>
                                <div class="created_date">
                                    <small class="text-muted fst-italic"><i class="fas fa-calendar mx-2"></i>4 days ago</small>
                                </div>

                            </div>
                            <div class="line"></div>
                        {{-- header-information --}}

                        {{-- title of the post start --}}
                        <div class="fs-5 text-center  fw-lighter">LARAVEL FRAMEWORK</div>
                        {{-- title of the post end --}}
                        {{-- blog-details-start --}}
                            <div class="blog-infor px-3">
                                <small class="fs-6">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                </small>


                                        <a href="{{ route('blog.show') }}" class="text-decoration-none fst-italic fw-bold ">  <i class="fas fa-eye"></i></small> Read_more </a>
                                        {{-- <a href="" class="text-decoration-none fst-italic text-danger fw-bold mx-2"> <i class="fas fa-trash"></i> Delete</a> --}}
                                        {{-- <a href="" class="fas fa-pen-to-square text-warning fw-bold text-decoration-none "></i> <i>Edit</i></a> <br> --}}

                                        {{-- starts_start --}}
                                            <div class="starts text-center">


                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star-half text-warning"></i>

                                            </div>
                                        {{-- starts_end --}}
                                    </div>
                        {{-- blog-details-end --}}
                                    <div class="line2"></div>
                        {{-- author start --}}

                        <div class="author d-flex justify-content-between    ">
                            <div class="author-image px-4">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                                </div>

                            </div>
                            <div class="author-details mx-4 fst-italic text-muted">
                                    <small>Brendah</small>

                                </div>
                        </div>
                        {{-- author end --}}
                    </div>
                </div>
            {{-- blog-card --}}

            {{-- blog-card --}}
                <div class="blog-card shadow my-4">
                    <div class="blog-image ">
                        <img src="{{ asset('assets/images/visualsofdana-T5pL6ciEn-I-unsplash.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="blog-details ">
                        {{-- header-information --}}
                            <div class="px-3    header-information d-flex justify-content-between">
                                <div class="category">
                                    <p class="text-muted "><i class="fas fa-globe mx-2"></i>  WEB DEVELOPMENT</p>
                                </div>
                                <div class="created_date">
                                    <small class="text-muted fst-italic"><i class="fas fa-calendar mx-2"></i>4 days ago</small>
                                </div>

                            </div>
                            <div class="line"></div>
                        {{-- header-information --}}

                        {{-- title of the post start --}}
                        <div class="fs-5 text-center  fw-lighter">LARAVEL FRAMEWORK</div>
                        {{-- title of the post end --}}
                        {{-- blog-details-start --}}
                            <div class="blog-infor px-3">
                                <small class="fs-6">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                    et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                    voluptatum ea quam aperiam?
                                </small>


                                        <a href="" class="text-decoration-none fst-italic fw-bold ">  <i class="fas fa-eye"></i></small> Read_more </a>
                                        {{-- <a href="" class="text-decoration-none fst-italic text-danger fw-bold mx-2"> <i class="fas fa-trash"></i> Delete</a> --}}
                                        {{-- <a href="" class="fas fa-pen-to-square text-warning fw-bold text-decoration-none "></i> <i>Edit</i></a> <br> --}}

                                        {{-- starts_start --}}
                                            <div class="starts text-center">


                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star-half text-warning"></i>

                                            </div>
                                        {{-- starts_end --}}
                                    </div>
                        {{-- blog-details-end --}}
                                    <div class="line2"></div>
                        {{-- author start --}}

                        <div class="author d-flex justify-content-between    ">
                            <div class="author-image px-4">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                                </div>

                            </div>
                            <div class="author-details mx-4 fst-italic text-muted">
                                    <small>Brendah</small>

                                </div>
                        </div>
                        {{-- author end --}}
                    </div>
                </div>
            {{-- blog-card --}}
        </div>


            <div class="col-md-3  order-1 order-md-2">
                <p class=" fw-bold fs-4  text-left">Categories</p>
                <div class="list-group">

                    <a href="#" class="text-decoration-none   list-group-item list-group-item-action"><i class="fas fa-globe mx-2"></i> Web Development</a>
                    <a href="#" class="text-decoration-none   list-group-item list-group-item-action"><i class="fas fa-globe mx-2"></i> Development</a>
                    <a href="#" class="text-decoration-none   list-group-item list-group-item-action"><i class="fas fa-globe mx-2"></i> Development</a>

                </div>
            </div>


        {{-- blog-card section-end --}}


@endsection

