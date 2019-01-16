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
    <?php 
        date("d/m/Y H-i-s");
    ?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                    @foreach ($menus as $menu)
                    <div class="card">
                            @foreach ($images as $image)
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
                    @endforeach
            </div>
        </div>
    </div>
    </div>
    @include("layouts.footer")

    <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    {{--<script src="/layouts/js/profile.js"></script>--}}

    </body>
</html>
