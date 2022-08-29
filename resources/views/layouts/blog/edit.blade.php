@extends('layouts.app')
@section('content')

{{-- blog-card section  --}}
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-2"></div>

            {{-- blog section --}}
                <div class="col-md-7 order-2 order-md-1">

                    <p class=" fw-bold fs-4  text-left">Edit Post</p>

                    <div class="blog-card shadow p-3 " style="    height:42rem;">

                        <form id="form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" required name="slug" value="{{ $post->slug }}">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" required value="{{ $post->title }}" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                            <span id="title_error" ></span>
                        </div>

                            <div class="mb-3">
                                <small>Description</small>
                                <textarea class="form-control"  name="description" id="description" rows="3">{{ $post->description }}</textarea>
                                <span id="description_error" ></span>
                            </div>
                            <div class="mb-3">
                                <small>Select Category</small>
                                <select class="form-select" name="category_id" id="category" aria-label="Default select example">
                                    <option value="{{ $post->category_id }}" selected>{{ $post->Category->name }}</option>
                                        <option value="1">Web Development</option>
                                        <option value="2">Mobile Development</option>
                                        <option value="3">Graphics</option>
                                        <option value="4">Networking</option>
                                        <option value="5">IOT</option>
                                        <option value="6">Others</option>
                                        {{-- <option value="{{$category->id ==$post->category_id?"selected": }}"> {{ $category->id ==$post->category_id? $post->Category->name:"" }}</option> --}}

                                    {{-- <option value="1">Web Development</option> --}}
                                </select>
                                <span id="category_error" ></span>
                            </div>
                            <div class="input-group mb-4">
                                <input type="file" name="file" class="form-control" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            <p id="file-error" ></p>
                            <button type="submit" id="btn" class="btn btn-primary">Update post</button>
                            </form>
                    </div>
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
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     $(document).ready(function(){

  // title validation
  var error_in_title=false;
        $('#title').keyup(function(){
            check_title();
        })
        function check_title()
        {
            var title=$('#title').val();
            if(title.length=="")
            { $('#title_error').show();
                $('#title_error').html("<small style='color:red;font-weight:bold;font-style:italic;font-size:12px'><i class='fa fa-times-circle mx-2'></i>Title is required please</small>");
                $('#title').css("border","1.5px solid red");
                $('#btn').attr("disabled",true);
                error_in_title=true;
            }
            else if(title.length<4)
            {
                $('#title_error').show();
                $('#title_error').html("<small style='color:orange;font-weight:bold;font-style:italic;font-size:12px'><i class='fa fa-exclamation-circle mx-2'></i>Title must be in range (4-10)</small>");
                $('#title').css("border","1.5px solid orange");
                $('#btn').attr("disabled",true);
                error_in_title=true;
            }
            else{
                $('#title_error').hide();
                $('#title').css("border","");
                $('#btn').attr("disabled",false);
                error_in_title=false;
            }
        }
        // title validation


        // descrption validation
        var error_in_description=false;
        $('#description').keyup(function(){
            check_description();
        })
        function check_description()
        {
            var description=$('#description').val();
            if(description.length=="")
            { $('#description_error').show();
                $('#description_error').html("<small style='color:red;font-weight:bold;font-style:italic;font-size:12px'><i class='fa fa-times-circle mx-2'></i>description is required please</small>");
                $('#description').css("border","1.5px solid red");
                $('#btn').attr("disabled",true);
                error_in_description=true;
            }
            else{
                $('#description_error').hide();
                $('#description').css("border","");
                $('#btn').attr("disabled",false);
                error_in_description=false;
            }
        }
        // descrption validation

        // descrption validation
        var error_in_category=false;
        $('#category').change(function(){
            check_category();
        })
        function check_category()
        {
            var category=$('#category').val();
            if(category.length=="")
            { $('#category_error').show();
                $('#category_error').html("<small style='color:red;font-weight:bold;font-style:italic;font-size:12px'><i class='fa fa-times-circle mx-2'></i>category is required please</small>");
                $('#category').css("border","1.5px solid red");
                $('#btn').attr("disabled",true);
                error_in_category=true;
            }
            else{
                $('#category_error').hide();
                $('#category').css("border","");
                $('#btn').attr("disabled",false);
                error_in_category=false;
            }
        }
        // descrption validation



        // image validation
        validateImage();
        var errorInFile=false;
function validateImage()
   {


         $("#file").change(function(){
            var file=this.files[0];
                fileSize=file.size;
                fileName=file.name;
                var extension=[".jpg",".png",".jpeg"];

                var positionOfTheDot=fileName.lastIndexOf(".");
                var imageExtension=fileName.substring(positionOfTheDot);

          if(!((imageExtension==extension[0]) || (imageExtension==extension[1]) || (imageExtension==extension[2])))
                {
                    $("#file").css({"border":"1.5px solid orange"});
                    $("#file-error").show();
                    $("#file").val("");
                    $("#file-error").html("<p style='color:orange;font-size:12px;font-weight:bold;font-style:italic''><i class='fa fa-times-circle'></i>Only images are allowed to be uploaded</p>");
                    $("#btn").attr("disabled",true);
                    errorInFile=true;
                }
                else if(fileSize>5000000)
                    {
                        $("#file").css({"border":"1.5px solid orange"});
                        $("#file-error").show();
                        $("#file").val("");
                        $("#file-error").html("<p style='color:orange;font-size:12px;font-weight:bold;font-style:italic''><i class='fa fa-times-circle'></i>Image too large (>5MB).......</p>");
                        $("#btn").attr("disabled",true);
                        errorInFile=true;
                    }
                    else
                    {

                        $("#file").css({"border":""});
                        $("#file-error").hide();
                        $("#btn").attr("disabled",false);
                        errorInFile=false;
                    }
            });
    }

        // image validation




         $('#form').submit(function(e){

            e.preventDefault();
            check_title();
            check_description();
            check_category();
            validateImage();
            if(error_in_category==false && errorInFile==false && error_in_description==false && error_in_title==false )
            {

             $('#btn').attr("disabled",true);
             $('#btn').text("updating.......");
            e.preventDefault();
            var formData=$(this)[0];
            $.ajax({
                url:"{{route('blog.update') }}",
                method:"POST",
                data:new FormData(formData),
                processData:false,
                contentType:false,
                success:function(response){
                   if(response==1)
                   {

                    {
                    Command: toastr["warning"]("Post Updated ", " updated successfully ")
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

                            window.location="{{ route('blog.index') }}";
                        },2000);

                }
                   }

                },error:function()
                {
                    console.log("Error");
                }
            })

            }else{
            return false;
            }
            })
        })
        CKEDITOR.config.removePlugins = 'Save,Print,Preview,Find,About,Maximize,ShowBlocks,image,table';
    CKEDITOR.replace( 'description');


</script>

@endsection
