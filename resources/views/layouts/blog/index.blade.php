@extends('layouts.app')
@section('content')

{{-- blog-card section  --}}
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-danger text-center" role="alert">
             {{ session('message') }}
          </div>
        @endif
        <div class="row">
        <div class="col-md-2"></div>

            {{-- blog section --}}
                <div class="col-md-7 order-2 order-md-1">

                    <p class=" fw-bold fs-4  text-left">Latest Post</p>
                    @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                      </div>

                    @endif

                    @foreach ($posts as $post)

                    {{-- blog-card --}}
                        <div class="blog-card shadow my-4">
                            <div class="blog-image ">
                                <img src="{{ asset('uploads/'.$post->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="blog-details ">

                                {{-- header-information --}}
                                    <div class="px-3    header-information d-flex justify-content-between">
                                        <div class="category">
                                            <p class="text-muted "><i class="fas fa-globe mx-2"></i>{{ $post->Category->name }}</p>
                                        </div>
                                        <div class="created_date">
                                            <small class="text-muted fst-italic"> <span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-pen mx-2"></i>{{ $post->updated_at->diffForHumans() }}</span></small>
                                            <small class="text-muted fst-italic"><i class="fas fa-calendar mx-2"></i>{{ $post->created_at->diffForHumans() }}</small>
                                        </div>

                                    </div>
                                    <div class="line"></div>
                                {{-- header-information --}}


                                {{-- title of the post start --}}
                                         <div class="fs-5 text-center  fw-lighter">{{ Str::upper($post->title) }}</div>
                                {{-- title of the post end --}}

                                {{-- blog-details-start --}}
                                    <div class="blog-infor px-3">
                                        <small class="">
                                            @if (strlen($post->description)>300)
                                             {{ Str::limit($post->description,300) }}
                                             <small> <a href="{{ route('blog.show') }}" class="text-decoration-none fst-italic  ">  <i class="fas fa-eye"></i> Read_more </a></small>
                                            @else
                                                {!! $post->description !!}
                                            @endif

                                        </small>
                                        @auth
                                            @if (Auth::user()->id==$post->user_id)

                                            <small>
                                                <tr>

                                                    <input type="hidden" id="slug"name="slug" value="{{ $post->slug }}">
                                                    <a href="#" id="delete"class="text-decoration-none fst-italic text-danger fw-bold mx-2"> <i class="fas fa-trash"></i> Delete</a>
                                                </tr>
                                            <a href="{{ route('blog.edit',$post) }}" class="fas fa-pen-to-square text-warning fw-bold text-decoration-none "></i> <i>Edit</i></a>
                                            </small> <br>
                                            @endif
                                        @endauth


                                                {{-- starts_start --}}
                                                    {{-- <div class="starts text-center">


                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star-half text-warning"></i>

                                                    </div> --}}
                                                {{-- starts_end --}}
                                            </div>
                                {{-- blog-details-end --}}


                                {{-- author start --}}
                                            <div class="line2"></div>
                                    <div class="author d-flex justify-content-between">

                                        <div class="author-image px-4">
                                            <div class="icon">
                                                <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                                            </div>

                                        </div>
                                        <div class="author-details mx-4 fst-italic text-muted">
                                                <small>{{ $post->User->name }}</small>

                                            </div>
                                    </div>
                                {{-- author end --}}
                            </div>
                        </div>
                    {{-- blog-card --}}
                    @endforeach
                    {{ $posts->links('pagination::bootstrap-5') }}


                </div>
            {{-- blog section --}}

            {{-- side section start --}}
                <div class="col-md-3  order-1 order-md-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                {{-- Categories start --}}
                                    <div class="col-md-12">
                                        @include('layouts.blog.includes.categories')
                                    </div>
                                {{-- Categories End --}}

                                {{-- search sectionx start --}}

                                <div class="search my-3">
                                    <p class="fw-bold">Search For Posts</p>
                                    <form class="d-flex" action="{{ route('blog.index') }}" >
                                        @csrf
                                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success btn-sm mx-2" type="submit"><i class="fab fa-searchengin"></i></button>
                                    </form>
                                </div>
                                {{-- search sectionx end --}}
                            </div>
                        </div>
                    </div>
                </div>
            {{-- side section start --}}

        </div>
    </div>
        {{-- blog-card section-end --}}


@endsection

@section('scripts')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     $(document).ready(function(){

       $(document).on("click","#delete",function(e){


            e.preventDefault();
            var tr=$(this).closest("small");
            var id=tr.find("#slug").val();
            if(confirm("Do u want to Delete"))
            {


            $.ajax({
                url:"{{route('blog.delete') }}",
                method:"POST",
                data:{"id":id},
                success:function(response){
                    if(response==1)
                   {

                    {
                    Command: toastr["error"]("Post deleted ", " deleted successfully ")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }

                        setInterval(() => {

                            window.location.reload();
                        },1000);

                }
                   }
                },error:function()
                {
                    console.log("Error");
                }

            })
        }

        })


    })



    // CKEDITOR.replace( 'editor1' );


</script>

@endsection
