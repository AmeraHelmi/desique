<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ar" dir="rtl">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> 
كورة لايف - @yield('title')
</title>

<!-- Favicon
================================================== -->
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">

<!-- CSS
================================================== -->
<!--<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/midan-normal" type="text/css"/> 
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/midan-black" type="text/css"/> -->
<link href="{{URL::asset('admin-ui/front_css/custom.css')}}" rel="stylesheet">
@yield('style')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]--> 

<!-- Header
================================================== -->
<header>
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div id="datetime" class="no-padding-right col-sm-3"></div>
        <nav class="hot-access text-left no-padding-left col-sm-9">
          <ul class="list-inline">
            <li><a href="#">علي الناصية</a></li>
            <li><a href="#">مع القراء</a></li>
            <li><a href="#">مسابقات</a></li>
            <li><a href="#">خلفيات</a></li>
            <li><a href="#">كاريكاتير</a></li>
            <li><a href="#">انفوجرافيك</a></li>
            <li><a href="#">RSS</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="site-name container">
    <div class="row">
      <div class="logo col-sm-2"> <a class="navbar-brand" href="#brand"><img src="images/brand/logo-black.png" class="logo" alt=""></a> </div>
      <div class="col-sm-10"></div>
    </div>
  </div>
</header>

<!-- Navigation
================================================== --> 
<!-- Start Navigation -->
<nav class="navbar navbar-default navbar-mobile bootsnav container no-padding-left"> 
  <!-- Start Top Search -->
  <div class="top-search">
    <div class="container">
      <div class="input-group"> <span class="input-group-addon search"><i class="icofont icofont-search"></i></span>
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-addon close-search"><i class="fa fa-times">s</i></span> </div>
    </div>
  </div>
  <!-- End Top Search --> 
  <!-- Start Header Navigation -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars">s</i> </button>
  </div>
  
  <!-- End Header Navigation --> 
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div id="navbar-menu" class="collapse navbar-collapse no-padding-left">
    <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
      <li><a href="#">الصفحة الرئيسية</a></li>
      <li><a href="#">المباريات</a></li>
      <li class="dropdown megamenu-fw"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">بطولات و دوريات</a>
        <ul class="dropdown-menu megamenu-content" role="menu">
          <li>
            <div class="row">
              <div class="col-menu col-md-3">
                <h6 class="title">Title Menu One</h6>
                <div class="content">
                  <ul class="menu-col">
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                  </ul>
                </div>
              </div>
              <!-- end col-3 -->
              <div class="col-menu col-md-3">
                <h6 class="title">Title Menu Two</h6>
                <div class="content">
                  <ul class="menu-col">
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                  </ul>
                </div>
              </div>
              <!-- end col-3 -->
              <div class="col-menu col-md-3">
                <h6 class="title">Title Menu Three</h6>
                <div class="content">
                  <ul class="menu-col">
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-menu col-md-3">
                <h6 class="title">Title Menu Four</h6>
                <div class="content">
                  <ul class="menu-col">
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                    <li><a href="#">Custom Menu</a></li>
                  </ul>
                </div>
              </div>
              <!-- end col-3 --> 
            </div>
            <!-- end row --> 
          </li>
        </ul>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" >البث المباشر</a>
        <ul class="dropdown-menu">
          <li><a href="#">Custom Menu</a></li>
          <li><a href="#">Custom Menu</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
            <ul class="dropdown-menu">
              <li><a href="#">Custom Menu</a></li>
              <li><a href="#">Custom Menu</a></li>
              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Custom Menu</a></li>
                  <li><a href="#">Custom Menu</a></li>
                  <li><a href="#">Custom Menu</a></li>
                  <li><a href="#">Custom Menu</a></li>
                </ul>
              </li>
              <li><a href="#">Custom Menu</a></li>
            </ul>
          </li>
          <li><a href="#">Custom Menu</a></li>
          <li><a href="#">Custom Menu</a></li>
          <li><a href="#">Custom Menu</a></li>
          <li><a href="#">Custom Menu</a></li>
        </ul>
      </li>
      <li><a href="#">فيديوهات</a></li>
      <li><a href="#">ألبوم الصور</a></li>
      <li><a href="#">أخبار</a></li>
      <li><a href="#">اللاعبون</a></li>
      <li><a href="#">النوادي</a></li>
      <li><a href="#">الاستادات</a></li>
      <li><a href="#">المعلقون</a></li>
      <li><a href="#">الحكام</a></li>
    </ul>
    <!-- Start Atribute Navigation -->
    <div class="attr-nav">
      <ul>
        <li class="side-menu"><a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 294.843 294.843" style="enable-background:new 0 0 294.843 294.843;" xml:space="preserve" width="32px" height="32px">
            <g>
              <path d="M147.421,0C66.133,0,0,66.133,0,147.421c0,40.968,17.259,80.425,47.351,108.255c2.433,2.25,6.229,2.101,8.479-0.331   c2.25-2.434,2.102-6.229-0.332-8.479C27.854,221.3,12,185.054,12,147.421C12,72.75,72.75,12,147.421,12   s135.421,60.75,135.421,135.421s-60.75,135.421-135.421,135.421c-3.313,0-6,2.687-6,6s2.687,6,6,6   c81.289,0,147.421-66.133,147.421-147.421S228.71,0,147.421,0z" fill="#FFFFFF"/>
              <path d="M84.185,90.185h126.473c3.313,0,6-2.687,6-6s-2.687-6-6-6H84.185c-3.313,0-6,2.687-6,6S80.872,90.185,84.185,90.185z" fill="#FFFFFF"/>
              <path d="M84.185,153.421h126.473c3.313,0,6-2.687,6-6s-2.687-6-6-6H84.185c-3.313,0-6,2.687-6,6S80.872,153.421,84.185,153.421z" fill="#FFFFFF"/>
              <path d="M216.658,210.658c0-3.313-2.687-6-6-6H84.185c-3.313,0-6,2.687-6,6s2.687,6,6,6h126.473   C213.971,216.658,216.658,213.971,216.658,210.658z" fill="#FFFFFF"/>
            </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
          </svg>
          </a></li>
        <li class="search"><a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_2" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4; " xml:space="preserve" width="24px" height="24px">
            <g>
              <path d="M483.1,454.038l-109.6-109.6c29.9-36.4,47.9-83,47.9-133.7c0-116.2-94.5-210.7-210.7-210.7S0,94.538,0,210.738   s94.5,210.7,210.7,210.7c50.7,0,97.3-18,133.7-47.9l109.6,109.6c8.3,8.3,20.8,8.3,29.1,0   C491.5,474.837,491.5,462.337,483.1,454.038z M41,210.738c0-93.6,76.1-169.7,169.7-169.7s169.7,76.1,169.7,169.7   s-76.1,169.7-169.7,169.7S41,304.337,41,210.738z" fill="#FFFFFF"/>
            </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
            <g> </g>
          </svg>
          </a></li>
      </ul>
    </div>
    <!-- End Atribute Navigation --> 
  </div>
  <!-- /.navbar-collapse --> 
  <!-- Start Side Menu -->
  <div class="side"> <a href="#" class="close-side"><i class="fa fa-times"></i></a>
    <div class="widget">
      <h6 class="title">Custom Pages</h6>
      <ul class="link">
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="widget">
      <h6 class="title">Additional Links</h6>
      <ul class="link">
        <li><a href="#">Retina Homepage</a></li>
        <li><a href="#">New Page Examples</a></li>
        <li><a href="#">Parallax Sections</a></li>
        <li><a href="#">Shortcode Central</a></li>
        <li><a href="#">Ultimate Font Collection</a></li>
      </ul>
    </div>
  </div>
  <!-- End Side Menu --> 
</nav>
<!-- End Navigation --> 

@yield('content')

<!-- Footer
================================================== -->
<footer></footer>
<!-- JS
================================================== --> 
<script src="{{URL::asset('admin-ui/front_js/js/jquery-1.11.3.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/easing.1.3.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/bootstrap.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/moment.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/ar-sa.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/bootsnav.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/owl.carousel.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/hammer.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/count-down.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/nicescroll.min.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/sliphover.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/salvattore.js')}}"></script> 
<script src="{{URL::asset('admin-ui/front_js/custom.js')}}"></script>
@yield('script')
</body>
</html>