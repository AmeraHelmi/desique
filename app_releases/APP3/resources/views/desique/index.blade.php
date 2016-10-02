@extends('desique_app');
@section('content')
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}">
                <!-- <img src="{{ asset('/admin-ui/assets/img/desique.jpg') }}" style="width: 114;height: 42;"/> -->
                DeZique
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="float:left">
                <li><a href="#home">الرئيسية</a></li>
                <li><a href="#services">الخدمات</a></li>
                <li><a href="#pricing">باقات الدفع</a></li>
                <li><a href="#work">الاعمال</a></li>
                <li><a href="#team">الفريق</a></li>
                <li><a href="#grid">المدونة</a></li>
                <li><a href="#contact">اتصل بنا</a></li>
                <li><a href="{{ url('desique')}}">الانجليزية</a></li>
                <!-- <li><a href="ar-index.html"><i class="fa fa-language" aria-hidden="true"></i></a></li> -->
            </ul>
        </div>
    </div>
</div>

<!--HOME SECTION START-->
<div id="home" >
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
                <div id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up">
                    <div class="carousel-inner">

                        @foreach($news as $new)
                        <div class="item active">
                            <h3>
                                  {{ $new->title }}
                            </h3>
                            <p>
                              {{ $new->additional_info }}.
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
            <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me">
                <p>
                    This line is fixed so you can write anything
                </p>
                <div class="social">
                    <a href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-facebook "></i></a>
                    <a href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-google-plus "></i></a>
                    <a href="#" class="btn button-custom btn-custom-one" ><i class="fa fa-linkedin "></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END-->

<!--SERVICE SECTION START-->
<section id="services" >
    <div class="container">
        <div class="row text-center header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
                <h3>خدماتنا</h3>
                <hr />
            </div>
        </div>
        <div class="row animate-in" data-anim-type="fade-in-up">
          @foreach($services as $service)
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="services-wrapper">
                    <i class="ion-document"></i>
                    <h3>{{ $service->name }}</h3>
                        {{ $service->description }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--SERVICE SECTION END-->

<!--PRICING SECTION START-->
<section id="pricing" >
    <div class="container">
        <div class="row text-center header animate-in" data-anim-type="fade-in-up">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>باقات الدفع</h3>
                <hr />
            </div>
        </div>
        <div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                <div class="row db-padding-btm db-attached">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="light-pricing">
                            <div class="price">
                                <sup>$</sup>99
                                <small>per day</small>
                            </div>
                            <div class="type">
                                BASIC
                            </div>
                            <ul>
                                <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                            </ul>
                            <div class="pricing-footer">
                                <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="light-pricing popular">
                            <div class="price">
                                <sup>$</sup>199
                                <small>per month</small>
                            </div>
                            <div class="type">
                                MEDIUM
                            </div>
                            <ul>
                                <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                            </ul>
                            <div class="pricing-footer">
                                <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="light-pricing">
                            <div class="price">
                                <sup>$</sup>249
                                <small>per yer</small>
                            </div>
                            <div class="type">
                                ADVANCE
                            </div>
                            <ul>
                                <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                            </ul>
                            <div class="pricing-footer">
                                <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="light-pricing">
                            <div class="price">
                                <sup>$</sup>599
                                <small>one time</small>
                            </div>
                            <div class="type">
                                EXTENDED
                            </div>
                            <ul>
                                <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                            </ul>
                            <div class="pricing-footer">
                                <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row animate-in" data-anim-type="fade-in-up">
                      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                          <div class="row db-padding-btm db-attached">
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                  <div class="light-pricing ">
                                      <div class="price">
                                          <sup>$</sup>99
                                          <small>per day</small>
                                        </div>
                                        <div class="type">
                                            SMALL
                                        </div>
                                        <ul>
                                          <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                          <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                          <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                                        </ul>
                                        <div class="pricing-footer">
                                            <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="light-pricing popular">
                                        <div class="price">
                                            <sup>$</sup>159
                                            <small>per month</small>
                                        </div>
                                        <div class="type">
                                            MEDIUM
                                        </div>
                                        <ul>
                                            <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                            <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                            <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                                        </ul>
                                        <div class="pricing-footer">
                                            <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="light-pricing">
                                        <div class="price">
                                            <sup>$</sup>799
                                            <small>per month</small>
                                        </div>
                                        <div class="type">
                                            ADVANCE
                                        </div>
                                        <ul>
                                            <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                                            <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                                            <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                                        </ul>
                                        <div class="pricing-footer">
                                            <a href="#" class="btn button-custom btn-custom-one">BOOK ORDER</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--PRIICING SECTION END-->

            <!--WORK SECTION START-->
            <section id="work" >
                <div class="container">
                    <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>أعمـــــــــــالنا</h3>
                            <hr />
                        </div>
                    </div>

                      <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                        @foreach($products as $product)
                          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html">
                              <div class="work-wrapper">
                                  <a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">
                                      <img src="{{ asset('/admin-ui/assets/img/portfolio/1.jpg') }}" class="img-responsive img-rounded" alt="" />
                                  </a>
                                  <h4>{{ $product->name }}</h4>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </section>
                <!--WORK SECTION END-->

                <!--TEAM SECTION START-->
                <section id="team" >
                    <div class="container">
                        <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>الفريق </h3>
                                <hr />
                            </div>
                        </div>
                        <div class="row animate-in" data-anim-type="fade-in-up">
                          @foreach($members as $member)
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <div class="team-wrapper">
                                    <div class="team-inner" style="background-image: url('images/uploads/{{ $member->flag }}')" >
                                        <a href="{{ $member->facebook}}" target="_blank" > <i class="fa fa-facebook" ></i></a>
                                    </div>
                                    <div class="description">
                                        <h3> {{ $member->name }}</h3>
                                        <h5> <strong> {{ $member->job }} </strong></h5>
                                        <p>
                                          {{ $member->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!--TEAM SECTION END-->

                <!--GRID SECTION START-->
                <section id="grid" >
                    <div class="container">
                        <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>المدونة</h3>
                                <hr />
                            </div>
                        </div>
                        <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                          @foreach($posts as $post)
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html">
                                  <div class="work-wrapper">
                                      <a class="fancybox-media" title="Image Title Goes Here" href="#">
                                          <img src="{{ asset('/admin-ui/assets/img/portfolio/1.jpg') }}" class="img-responsive img-rounded" alt="" />
                                      </a>
                                      <h4>{{ $post->title }}</h4>
                                   </div>
                                </div>
                            @endforeach
                        </div>

                        </div>
                    </section>
                    <!--GRID SECTION END-->

                    <!--CONTACT SECTION START-->
                    <section id="contact" >
                          <div class="container">
                              <div class="row text-center header animate-in" data-anim-type="fade-in-up">
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                      <h3>اتصل بــــنا</h3>
                                      <hr />
                                  </div>
                              </div>
                              <div class="row animate-in" data-anim-type="fade-in-up">
                                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                      <div class="contact-wrapper">
                                          <h3>سوف تجدنا</h3>

                                          <div class="social-below">
                                              <a href="#" class="btn button-custom btn-custom-two" > Facebook</a>
                                              <a href="#" class="btn button-custom btn-custom-two" > Twitter</a>
                                              <a href="#" class="btn button-custom btn-custom-two" > Google +</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="contact-wrapper">
                                            <h3>الاتصال السريع</h3>
                                            <h4><strong>الايميل : </strong> info@yuordomain.com </h4>
                                            <h4><strong>الرقم : </strong> +09-88-99-77-55 </h4>
                                          </div>
                                      </div>
                                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                          <div class="contact-wrapper">
                                              <h3>العنوان </h3>
                                              <h4>مدينة نصر بجوار النادى الاهلى </h4>
                                              <h4>جمهورية مصر العربية</h4>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>

@endsection
