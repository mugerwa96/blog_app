@extends('layouts.app')
@section('content')

{{-- blog-card section  --}}
    <div class="row justify-content-center">
            <div class="col-md-6 ">
                <p class="fw-bold fs-4  text-center">LARAVEL FRAME WORK</p>
                {{-- blog-card --}}
                    <div class="blog-card shadow my-4" style="height:50rem">
                        <div class="blog-image ">
                            <img src="{{ asset('assets/images/visualsofdana-T5pL6ciEn-I-unsplash.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="blog-details ">



                            {{-- title of the post start --}}
                            <div class="fs-5 text-center  fw-lighter">LARAVEL FRAMEWORK</div>
                            {{-- title of the post end --}}
                            {{-- blog-details-start --}}
                                <div class="blog-infor p-3 mb-4">
                                    <small class="fs-6">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                        voluptatum ea quam aperiam?
                                        et distinctio, voluptates nemo modi, ipsa numquam accusamus totam, officiis
                                        voluptatum ea quam aperiam?
                                    </small>
                                </div>
                        </div>
                    </div>
                {{-- blog-card --}}
            </div>
    </div>
{{-- blog-card section  --}}
@endsection
