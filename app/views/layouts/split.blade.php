<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ Config::get('site.name') }}</title>
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{ HTML::style('bootplus/css/bootplus.min.css') }}
    {{ HTML::style('bootplus/css/bootplus-responsive.min.css') }}
    {{ HTML::style('bootplus/css/font-awesome.min.css') }}

    {{ HTML::style('css/dataTables.bootstrap.css') }}

    {{ HTML::style('css/bootstrap-timepicker.css') }}

    {{ HTML::style('css/bootstrap-datetimepicker.min.css') }}




    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    {{ HTML::style('css/front.css') }}
    {{ HTML::style('css/form.css') }}
    {{ HTML::style('css/gridtable.css') }}

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    {{ HTML::script('js/jquery-1.8.3.min.js')}}
    {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js')}}


    {{ HTML::script('js/jquery.removeWhitespace.min.js')}}
    {{ HTML::script('js/jquery.collagePlus.min.js')}}
    {{ HTML::script('js/jquery.collageCaption.js')}}
    {{ HTML::script('js/jquery-datatables/jquery.datatables.min.js')}}
    {{ HTML::script('js/jquery-datatables/datatables.bootstrap.js')}}

    {{ HTML::script('js/jquery.tagsinput.js') }}

    {{ HTML::script('js/bootstrap-timepicker.js') }}
    {{ HTML::script('js/bootstrap-datetimepicker.min.js') }}



    <script type="text/javascript">
    base = '{{ URL::to('/') }}/';
    </script>


    {{ HTML::script('js/app.js')}}

</head>

<body>
    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="row-fluid">
                    <div class="span1">
                        <a class="brand" href="{{ URL::to('/')}}">
                          <img src="{{ URL::to('/') }}/images/se-logo.png">
                      </a>
                  </div>
                  <div class="span5" style="vertical-align:bottom">
                    <span style="padding:3px;color:white;background-color:maroon">ADMIN</span>
                </div>
                <div class="span6 identity">
                    @if(Auth::check())
                    Hello {{ Auth::user()->fullname }}<br />
                    <a href="#" >Settings</a>
                    <a href="{{ URL::to('logout')}}" >Logout</a>
                    @endif
                </div>
            </div>
        </div>

        @include('partials.topnav')

    </div>
</div>

<!-- Begin page content -->
<div class="container">
    <div class="row-fluid">
        <div class="span8">
            @yield('content')
        </div>
        <div class="span4 leftsolid leftmenu">
            <p>
                Get started with the Web Audio API by learning how to recreate the classic miniature synthesizer.
            </p>
        </div>
    </div>
</div>

<div id="push"></div>
</div>


@include('partials.footer')


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('bootplus/js/bootstrap.min.js')}}

</body>
</html>