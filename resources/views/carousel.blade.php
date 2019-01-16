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
<div id="{{ $id ?? 'carousel' }}" class="carousel slide {{ $class ?? '' }}" data-ride="carousel">

        <ol class="carousel-indicators">
            @isset($images)
                @foreach($images as $image)
                    <li data-target="#{{ $id ?? 'carousel' }}" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? ' active' : '' }}" ></li>
                @endforeach
            @else
                {{"error data not set"}}
            @endisset
        </ol>

    <div class="carousel-inner" role="listbox">
        @isset($images)
            @foreach($images as $image)
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                    <img  class="d-block img-fluid" src="{{url($image->image_path)}}" alt="">    
                </div>
            @endforeach
        @endisset

    </div>

        <a class="carousel-control-prev" href="#{{ $id ?? 'carousel' }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#{{ $id ?? 'carousel' }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
</body>
</html>