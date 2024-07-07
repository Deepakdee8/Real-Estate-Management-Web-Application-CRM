<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
    <title>Samatha Group Estates and Projects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/morris/morris.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/style.css')}}">
    <style>
        /* Add styles for zooming effect */
        .enlarged-image-container {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow: auto;
        }

        /* Style for the enlarged image itself */
        .enlarged-image {
            display: block;
            margin: auto;
            width: 80%;
            max-width: 1000px;
            max-height: 80%;
            padding: 20px;
        }

        /* .enlarged-image:hover {
            transform: scale(1.5);
        } */
    </style>
</head>

<body>

    <div class="main-wrapper d-flex justify-content-center align-items-center">

        <div class="header">
            <div class="header-left">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="Logo" width="100" height="60px">
                </a>
            </div>

            <div class="page-title-box">
                <h3> Samatha Group Estates and Projects</h3>
            </div>
        </div>
    </div>


    <div class="container  justify-content center" style="margin-top: 90px;">

        <div class="content container-fluid pb-0">


            <div class="page-header mb-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title"> Welcome to Samatha Group Estates and Projects </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="Image" style="width: 100%; height: 60px"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"> Samatha Group </h3>
                                                <h6 class="text-muted">Estates and Projects</h6>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="#">+919845790910</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href="#"><span>contact@samathagroup.com</span></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">No.1, S-5, B Ningappa Complex New Kantharaj Urs Road BEML HBCS Layout Mysore 570022</div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title"> {{$property->name}} </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item ">View Our Property </li>
                            <li class="breadcrumb-item active">{{$property->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Property Informations </h3>
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Property ID</div>
                                    <div class="text">{{$property->property_id}}</div>
                                </li>
                                <li>
                                    <div class="title">Property Size</div>
                                    <div class="text">{{$property->size}}</div>
                                </li>
                                <li>
                                    <div class="title">Facing</div>
                                    <div class="text">{{$property->facing}}</div>
                                </li>
                                <li>
                                    <div class="title">Property Type</div>
                                    <div class="text">{{$property->type}}</div>
                                </li>
                                <li>
                                    <div class="title">Budget</div>
                                    <div class="text">{{$property->budget}}</div>
                                </li>
                                <li>
                                    <div class="title">Description</div>
                                    <div class="text">{{$property->description}}</div>
                                </li>
                                <li>
                                    <div class="title">Location</div>
                                    <div class="text">{{$property->location}}</div>
                                </li>
                                <li>
                                    <div class="title">Status</div>
                                    <div class="text">{{$property->status}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <!-- Add onclick event to each image to enlarge -->
                                        <img src="{{ asset('storage/attachments/'.$photo->photos) }}" class="d-block w-100" alt="image" onclick="enlargeImage(this)" style="width: 100%; height:300px;">
                                    </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Thumbnails Container with Horizontal Scrolling -->
                            <div class="d-flex mt-3 justify-content-center overflow-auto">
                                @foreach($photos as $key => $photo)
                                <img src="{{ asset('storage/attachments/'.$photo->photos) }}" class="img-thumbnail mx-1" alt="thumbnail" data-bs-target="#carouselExampleFade" data-bs-slide-to="{{ $key }}" style="width: 100px; height: 60px;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="enlarged-image-container" class="enlarged-image-container" onclick="hideImage()">
        <span class="close" style="color: white; font-size: 30px; position: absolute; top: 15px; right: 15px; cursor: pointer;">&times;</span>
        <img class="enlarged-image" id="enlarged-image">
    </div>

    <script>
        // Function to enlarge the clicked image
        function enlargeImage(image) {
            var enlargedImage = document.getElementById("enlarged-image");
            enlargedImage.src = image.src;
            document.getElementById("enlarged-image-container").style.display = "block";
        }

        // Function to hide the enlarged image when clicked outside
        function hideImage() {
            document.getElementById("enlarged-image-container").style.display = "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{asset('assets/theme/js/jquery-3.7.1.min.js')}}"></script>

    <script src="{{asset('assets/theme/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/theme/js/jquery.slimscroll.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/plugins/morris/morris.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/plugins/raphael/raphael.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/js/chart.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/js/greedynav.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/js/layout.js')}}"></script>
    <script src="{{asset('assets/theme/js/theme-settings.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/js/app.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="07e26efd99e9fcaeb20a7722-|49" defer></script>

    @stack('script')

</html>