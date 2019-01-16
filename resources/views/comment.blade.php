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
    @if(!$errors->isEmpty())
        <br>
        <div class="alert alert-danger" style="margin-top:18px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            @foreach ($errors->all() as $error)
                <strong>{{$error}}</strong>
            @endforeach
        </div>
    @else
        <br>
    @endif
    <!--<h1 class="my-4">Info<span class="badge">New</span>-->
    <!--</h1>-->
    <h7 class="my-4">&nbsp;</h7>
    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="{{url($images[0]->image_path)}}" style="overflow: hidden;">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Comment
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($comments as $comment)
                            <div class="col-md-12">
                                <p>
                                    <a><strong>{{$comment->name}}</strong></a>
                                </p>
                                <div class="clearfix"></div>
                                <p>{{$comment->comment}}</p>
                                <!--<p>
                                    <a class="float-right btn btn-outline-primary ml-2 disabled"> <i class="fa fa-heart"></i> 10</a>
                                    <a class="float-right btn text-white btn-success"> <i class="far fa-thumbs-up"></i> Like</a>
                                </p>-->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--<br>-->
        <!--<hr>-->
        <p class="my-2">&nbsp;</p>
        <!--<div class="row">-->
        <!--</div>-->
        <div class="col-md-12">
            <form action="{{url('/item/'.$menu_id.'/addcomment/'.$images[0]->image_id)}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <input type="hidden" id="image_id" name="image_id" value="{{$images[0]->image_id}}">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
    {{--<script src="/layouts/js/profile.js"></script>--}}

    </body>
</html>