<!doctype html>
<?php function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}?>
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
    <div class="container">

    <!-- Portfolio Item Heading -->
    <!--<h1 class="my-4">Info<span class="badge">New</span>-->
    <!--</h1>-->
    <h7 class="my-4">&nbsp;</h7>
    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <div id="myCarousel" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($images as $image)
                        <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? ' active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                @foreach($images as $image)
                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                        <a href="{{ url('item/'.$menu[0]->menu_id.'/comment/'.$image->image_id) }}"><img class="d-block img-fluid" src="{{url($image->image_path)}}" alt="{{$image->image_name}}" style="height: 500px; width: 750px; overflow: visible;"></a>
                    </div>
                @endforeach
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Info
                </div>
                <div class="card-body">
                    <p class="card-text">โรงเรียน {{$schools[0]->school_name." ".date($menu[0]->created_at)}}</p>
                    <h5 class="card-title">ความชื่นชอบ</h5>
                    <div class="col-md-12">
                        <div class="ratings">
                            <ul class="list-inline">
                                @for ($i = 0; $i < $menu[0]->star; $i++)
                                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                    <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                    <h4 class="card-title">พลังงานทั้งหมด</h4>
                    <p class="card-text">{{$menu[0]->calorie}} kcal</p>
                    <h4 class="card-title">อาหารในสำรับนี้</h4>
                        <ul>
                            @foreach($images as $image)
                                @if ($loop->first)
                                    @continue
                                @endif
                                <li>{{$image->image_name}}</li>
                            @endforeach
                        </ul>
                    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
        <!--<br>-->
        <!--<hr>-->
        <p class="my-2">&nbsp;</p>
        <!--<div class="row">-->
        <!--</div>-->
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        @foreach($images as $image)
                            @if ($loop->first)
                                <li class="nav-item"><a class="nav-link active" href="#">ภาพรวม</a></li>
                            @else 
                                <li class="nav-item"><a class="nav-link" href="#">{{$image->image_name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">รายละเอียด</h5>
                    <p class="card-text">กราฟค่าของสารอาหาร</p>
                    <a href="#" class="btn btn-primary">Comment</a>
                </div>
            </div>
        </div>

        <div class="credit card float-lg-left">
            <div class="row">
                <div class="col-md-6 img">
                    <a href="profile2.html"><img src="{{url($schools[0]->icon_path)}}" href="profile.html"></a>
                </div>
                <div class="col-md-6 details">
                    <blockquote>
                        <h5>{{$schools[0]->school_name}}</h5>
                        <small><cite title="Source Title">{{$schools[0]->address}}<i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <p>
                        {{$schools[0]->email}} <br>
                        <a href="https://{{$schools[0]->website}}">{{$schools[0]->website}}</a><br>
                    </p>
                    <ul class="list-inline">
                        <!--<button class="w3-button w3-blue"><i class="fa fa-facebook"></i></button>-->
                        <!--<button class="w3-button w3-yellow"><i class="fa fa-twitter"></i></button>-->
                        <!--<button class="w3-button w3-red"><i class="fa fa-youtube"></i></button>-->
                        <!--<button class="w3-button w3-orange"><i class="fa fa-google"></i></button>-->
                        <!--<button class="w3-button w3-teal"><i class="fa fa-flickr"></i></button>-->
                        <!--<button class="w3-button w3-gray"><i class="fa fa-instagram"></i></button>-->
                        @if (!is_null($schools[0]->facebook_url))
                            <a href="{{$schools[0]->facebook_url}}" ><i class="fab fa-facebook big-icon"></i></a>
                        @endif
                        @if (!is_null($schools[0]->twiiter_url))
                            <a href="{{$schools[0]->twiiter_url}}" ><i class="fab fa-twitter big-icon"></i></a> 
                        @endif
                        @if (!is_null($schools[0]->youtube_url))
                            <a href="{{$schools[0]->youtube_url}}" ><i class="fab fa-youtube big-icon"></i></a>
                        @endif    
                        <!--<a href="#" ><i class="fab fa-facebook big-icon"></i></a>
                        <a href="#" ><i class="fab fa-twitter big-icon"></i></a>
                        <a href="#" ><i class="fab fa-youtube big-icon"></i></a>-->
                        <!--<a href="#" ><i class="fab fa-google-plus big-icon"></i></a>-->
                        <!--<a href="#" ><i class="fab fa-flickr big-icon"></i></i></a>-->
                        <!--<a href="#" ><i class="fab fa-github big-icon"></i></a>-->
                        <!--<a href="#" ><i class="fab fa-facebook-messenger big-icon"></i></a>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h3 class="my-4">สำรับอาหารใกล้เคียง</h3>
    <div class="row">
            @foreach ($other_menus as $menu)
            <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                            @foreach ($other_images as $image)
                                @if ($image->menu_id == $menu->menu_id )
                                    <img class="card-img-top" src="{!! asset($image->image_path) !!}" alt="" >
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body">
                                <?php $time = strtotime($menu->updated_at); ?>
                                <h4 class="card-title"><a href="#">{{date('d/m/Y',$time)}}</a></h4>
                                <h5>{{$menu->calorie}} cal</h5>
                                <a href="#"><h6>{{$menu->school_name}}</h6></a>
                                <p class="card-text">{{$menu->description}}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{time_elapsed_string($menu->updated_at)}}</small></p>
                                <p class="text-center"><a href="{{ url('item/'.$menu->menu_id) }}" class="btn btn-primary">More info</a></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div>
                    </div>
            </div>
            @endforeach
    </div>
    </div>
    @include("layouts.footer")


    <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    </body>
</html>