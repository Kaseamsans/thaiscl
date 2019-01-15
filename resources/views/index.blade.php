<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{$pagename}}</title>
        <!-- Bootstrap core CSS -->
        <!--<link rel="stylesheet" href="vendor/bootstrap/font-awesome/css/font-awesome.css">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    </head>
    <body>
    @include("layouts.nevbar")
    @include("layouts.header")
    <div class="container">
        <div class="col-md-12">
            <br/>
            <div align="center">
                <button class="btn btn-default filter-button active" data-filter="all">All</button>
                <button class="btn btn-default filter-button" data-filter="Hot">อาหารยอดฮิตประจำปี</button>
                <button class="btn btn-default filter-button" data-filter="main">อาหารยอดฮิตประจำสัปดาห์</button>
                <button class="btn btn-default filter-button" data-filter="Healthy">อาหารเพื่อสุขภาพ</button>
            </div>
            <br/>
        </div>
    </div>
    {{--{$school}}--}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                @foreach ($menus as $menu)
                <div class="card h-100">
                    <div id="carouselExampleIndicators0" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                        @foreach ($images as $image)
                            <?php $round = 1;  ?>
                            @if ($image->menu_id == $menu->menu_id )
                                {{--<img src="{!! asset($image->image_path) !!}" alt="Italian Trulli">--}}
                                @if ($image->image_id == 1)
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                    <a href="#"><img class="d-block img-fluid" src="{!! asset($image->image_path) !!}" alt="First slide" style=" height: 200px; width: 350px; overflow: visible;"></a>
                                </div>
                                <?php $round = $round+1?>
                            @else 
                                @break
                            @endif
                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators0" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators0" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">24/10/2561</a>
                        </h4>
                        <h5>1000 kcal</h5>
                        <a href="page/profile2.html"><h6>Nectec School</h6></a>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <p class="text-center"><a href="page/item3.html" class="btn btn-primary">More info</a></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
    

    @include("layouts.footer")

    <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    {{--<script src="/layouts/js/profile.js"></script>--}}

    </body>
</html>
