<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap core CSS -->
        @section('css')
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/styles.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/jquery.tagsinput.min.css') }}">
            <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/redactor.css') }}">
        @show

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body class="interface">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">

                    {{-- The Responsive Menu Button --}}
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    {{-- The CMS Home Button --}}
                    <a class="navbar-brand" href="{{ url( $urlSegment ) }}">{{ $app_name }}</a>
                </div>

                {{-- The menu items at the top (collapses down when browser gets small) --}}
                <div class="collapse navbar-left navbar-collapse">
                    @if($menu_items)
                        <ul class="nav navbar-nav">
                            @foreach($menu_items as $url=>$item)
                                @if( $item['top'] )
                                    <li class="{{ Request::is( "$urlSegment/$url*" ) ? 'active' : '' }}">
                                        <a href="{{ url( $urlSegment.'/'.$url ) }}">{{ $item['name'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li><a href="{{ url( $urlSegment.'/logout' ) }}"><strong>Logout</strong></a></li>
                        </ul>
                    @endif
                </div><!-- /.nav-collapse -->

            </div><!-- /.container -->

        </div><!-- /.navbar -->

        <div class="container">
            <div class="row">

                <div class="col-sm-3">

                    @if($menu_items)
                        <div class="list-group">
                            @foreach($menu_items as $url=>$item)
                                <a class="list-group-item {{ Request::is( "$urlSegment/$url*" ) ? 'active' : '' }}" href="{{ url( $urlSegment.'/'.$url ) }}">
                                    <span class="glyphicon glyphicon-{{ $item['icon'] }}"></span> {{ $item['name'] }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                </div>
                <div class="col-sm-9">
                    @yield('content')
                </div>

            </div>
        </div>

        <div class="container">
            <hr>
            <footer>
                <p>&copy; {{ $app_name }} {{ date('Y') }}</p>
            </footer>
        </div><!--/.container-->


        @section('scripts')
            <script src="{{ asset('packages/davzie/laravel-bootstrap/js/jquery.js') }}"></script>
            <script src="{{ asset('packages/davzie/laravel-bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('packages/davzie/laravel-bootstrap/js/jquery.tagsinput.min.js') }}"></script>
            <script src="{{ asset('packages/davzie/laravel-bootstrap/js/redactor.min.js') }}"></script>
            <script>
                $(document).ready(function(){
                    var taggables = $('input[name="tags"]');
                    var richText = $('textarea.rich');

                    if( taggables.length )
                        $(taggables).tagsInput({});
                    
                    if( richText.length )
                        $(richText).redactor();

                });
            </script>
        @show
    </body>
</html>