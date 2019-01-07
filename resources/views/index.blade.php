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
    {{$school}}
    @include("layouts.footer")

    <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
    {{--<script src="/layouts/js/profile.js"></script>--}}

    </body>
</html>
