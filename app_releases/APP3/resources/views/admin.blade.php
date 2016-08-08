    <!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <title>korelive</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="Muhammad Usman">

        <!-- The styles -->


     <link id="bs-css" href="{{ asset('/admin-ui/admin_css/bootstrap-cerulean.min.css')}}" rel="stylesheet">
     <link href="{{ asset('/admin-ui/admin_css/charisma-app.css')}}" rel="stylesheet">
     <link href='{{ asset("/admin-ui/admin_bower/bower_components/chosen/chosen.min.css")}}' rel='stylesheet'>
     <link href='{{ asset("/admin-ui/admin_bower/bower_components/colorbox/example3/colorbox.css")}}' rel='stylesheet'>
     <link href='{{ asset("/admin-ui/admin_bower/bower_components/responsive-tables/responsive-tables.css")}}' rel='stylesheet'>
   
    <link href='{{ asset("/admin-ui/admin_css/bootstrap-rtl.css")}}' rel='stylesheet'>
     <link href='{{ asset("/admin-ui/admin_bower/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css")}}' rel='stylesheet'>
    <link rel='stylesheet' href="{{ asset('/bower_components/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel='stylesheet' href="{{ asset('/bower_components/chosen/chosen.min.css') }}">
    <link rel='stylesheet' href="{{ asset('/bower_components/fontawesome/css/font-awesome.min.css') }}">
    <link rel='stylesheet' href="{{ asset('/admin-ui/css/datatables/bootstrap.datatables.css') }}">
    <link href='{{ asset("/admin-ui/admin_css/jquery.noty.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/noty_theme_default.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/elfinder.min.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/elfinder.theme.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/jquery.iphone.toggle.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/uploadify.css")}}' rel='stylesheet'>
    <link href='{{ asset("/admin-ui/admin_css/animate.min.css")}}' rel='stylesheet'>
    <link rel='stylesheet' href="{{ asset('/bower_components/fontawesome/css/font-awesome.min.css') }}">

        <link rel="shortcut icon" href="img/favicon.ico">
@yield('styles')
    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar navbar-default" role="navigation">

            <div class="navbar-inner">
                <button type="button" class="navbar-toggle pull-left animated flip">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" style="float: left;"> <img alt="Charisma Logo" 
                src="{{ asset('/admin-ui/admin_images/logo20.png')}}" class="hidden-xs"/>
                    <span>Koralife</span></a>

                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{ Auth::user()->name }}</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/auth/logout') }}">تسجيل الخروج</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->

                <!-- theme selector starts -->
                <div class="btn-group pull-right theme-container animated tada">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-tint"></i><span
                            class="hidden-sm hidden-xs"> تغير الموضوع</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="themes">
                        <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                        <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                        <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                        <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                        <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                        <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                        <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                        <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                        <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                    </ul>
                </div>
                <!-- theme selector ends -->

                <ul class="collapse navbar-collapse nav navbar-nav top-menu" style="float: left;">
                    <li><a href="{{ url('/') }}"><i class="glyphicon glyphicon-globe"></i> زيارة الموقع</a></li>

                </ul>

            </div>
        </div>
        <!-- topbar ends -->
    <div class="ch-container">
        <div class="row">
            
            <!-- left menu starts -->
            <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">

    </div>
    <ul class="nav nav-pills nav-stacked main-menu">
        <li class="nav-header">Main</li>
        <li><a class="ajax-link" href="{{ url('/adminpanel') }}"><i class="glyphicon glyphicon-dashboard"></i><span> لوحة التحكم</span></a>
        </li>
        @if(Auth::user()->role =='Admin')
        <li><a class="ajax-link" href="{{ url('/users') }}"><i class="glyphicon glyphicon-eye-open"></i><span> المستخدمين</span></a>
        </li>

       <li><a class="ajax-link" href="{{ url('/blog-comments') }}"><i class="glyphicon glyphicon-eye-open"></i><span> تعليقات على الناصيه</span></a>
        </li>
        @include('menu')

        @elseif(Auth::user()->role =='Editor')
        <li class="accordion">
            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> المباراه</span></a>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('reserve_player') }}">اللاعبون الاحتياط</a></li>
                <li><a href="{{ url('player_match') }}">اللاعبون الاساسيون</a></li>
                <li><a href="{{ url('change_player') }}">التبديلات</a></li>
            </ul>
        </li>
     <li class="accordion">
            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> مباريات اليوم</span></a>
            <ul class="nav nav-pills nav-stacked">
            @foreach($Allmatch as $matchdetail)
                <li><a href="{{ url('now',$matchdetail->match_id) }}">{{ $matchdetail->T1name }} - {{ $matchdetail->T2name }}</a></li>
            @endforeach
            </ul>
        </li>

         @elseif(Auth::user()->role =='Analyiser')
         <li><a class="ajax-link" href="{{ url('analysis') }}"><i class="glyphicon glyphicon-arrow-left"></i><span> التحليل</span></a>
        </li>

        @elseif(Auth::user()->role =='Data Entry')
        @include('menu')

        @else
        <li>
    <a class="ajax-link" href="{{ url('snew') }}"><i class="glyphicon glyphicon-arrow-left"></i><span> الاخبار</span></a>
    </li>

     @endif
    </ul>
                    </div>
                </div>
            </div>
            <!--/span-->
            <!-- left menu ends -->

            <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
            </noscript>

            <div id="content" class="col-lg-10 col-sm-10">
                <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{ url('/adminpanel') }}">لوحة التحكم</a>
            </li>
        </ul>
    </div>

    @yield('content')

       <!-- content ends -->
        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3>Settings</h3>
                    </div>
                    <div class="modal-body">
                        <p>Here settings can be configured...</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="row">
            <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">B
                    G</a> 2016</p>

        </footer>

    </div>
    <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.11/i18n/Arabic.json"></script>
    <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
    <script src="{{ asset('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin-ui/js/datatables/bootstrap.datatables.js') }}"></script>
    <script src="{{ asset('/bower_components/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('/admin-ui/js/application.js') }}"></script>
    <script src="{{ asset('/admin-ui/js/forms.js') }}"></script>
    <script src="{{ asset('/admin-ui/js/moment.js') }}"></script>
    <script src="{{ asset('/admin-ui/js/combodate.js') }}"></script>
    <script src="{{ asset('/admin-ui/admin_js/jquery.cookie.js')}}"></script>
    <script src="{{ asset('/admin-ui/admin_js/jquery.noty.js')}}"></script>
    <script src="{{ asset('/admin-ui/admin_js/jquery.history.js')}}"></script>

  @yield('scripts')  
  <script src="{{ asset('/admin-ui/admin_js/charisma.js')}}"></script> 

     <!-- <script src="{{ asset('/bower_components/chosen.js') }}"></script> -->
    <!-- <script src="{{ asset('/admin-ui/js/application-sortable/source/js/jquery-sortable-min.js') }}"></script> -->
      <!-- <script src="{{ asset('/admin-ui/js/moment.js') }}"></script> -->
    </body>
    </html>
