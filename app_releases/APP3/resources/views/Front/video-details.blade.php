@extends('front_inc')

@section('title')
@foreach($v_details as $v_detail)
{{$v_detail->title}}
@endforeach
@endsection

@section('content')
<!-- Data
================================================== -->
     @foreach($v_details as $v_detail)
<main class="container ">
  <!--start of middle sec-->

  <div class="row data">
    <div class="col-sm-8 ">
      <div class="row">
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{url('/vedios')}}">الفيديوهات</a></li>
            <li class="active">{{ $v_detail->title}}</li>
          </ol>
        </div>

        <div class="blog-post-body col-sm-12">
          <h3 class="text-primary"><a href="#">{{$v_detail->title}}</a></h3>
          <p class="text-muted"><span>{{$v_detail->date}} / بواسطة: <a href="#">فريق كورة لايف</a> / القسم: <a href="#">كرة عربية</a> / <a href="#">٣ تعليقات</a></span></p>
          <a href="post-details.html">
          <figure><img alt="" src="../images/uploads/{{ $v_detail->flag}}" class="img-responsive"></figure>
          </a>
          <p>{{$v_detail->description }}</p>
          <blockquote>
            <p>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل </p>
          </blockquote>
          <p>
            <mark>هذا النص</mark>
            هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
          <ul class="arw-list list-unstyled">
            <li><i class="icofont icofont-long-arrow-left"></i>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل</li>
            <li><i class="icofont icofont-long-arrow-left"></i>لقد تم توليد هذا النص</li>
            <li><i class="icofont icofont-long-arrow-left"></i>يمكنك أن تولد مثل هذا النص</li>
            <li><i class="icofont icofont-long-arrow-left"></i>العديد من النصوص الأخرى</li>
            <li><i class="icofont icofont-long-arrow-left"></i>إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
              <ul class="circle-list sub-list">
                <li><i class="icofont icofont-long-arrow-left"></i>لقد تم توليد هذا النص</li>
                <li><i class="icofont icofont-long-arrow-left"></i>يمكنك أن تولد مثل هذا النص</li>
                <li><i class="icofont icofont-long-arrow-left"></i>العديد من النصوص الأخرى</li>
                <li><i class="icofont icofont-long-arrow-left"></i>إضافة إلى زيادة عدد الحروف التى يولدها التطبيق </li>
              </ul>
            </li>
            <li><i class="icofont icofont-long-arrow-left"></i>يمكنك أن تولد مثل هذا النص</li>
            <li><i class="icofont icofont-long-arrow-left"></i>العديد من النصوص الأخرى</li>
            <li><i class="icofont icofont-long-arrow-left"></i>إضافة إلى زيادة عدد الحروف التى يولدها التطبيق </li>
          </ul>
          <div class="well well-lg">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية</div>
          <p> مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
          <hr>
        </div>

        <!--start of share box & tags-->

        <div class="col-sm-12 post-tags clearfix">
          <div class="title">
            <p>كلمات دلالية</p>
          </div>
          <div class="row">
            <div class="col-sm-6"> <a href="#">Integer</a> / <a href="#">Duis leo</a> / <a href="#">Aenean vulputate</a></div>
            <div class="col-sm-6">
              <ul class="soc pull-left">
                <li><a class="soc-twitter" href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                <li><a class="soc-facebook" href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                <li><a class="soc-google" href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
                <li><a class="soc-pinterest" href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
                <li><a class="soc-linkedin" href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                <li><a class="soc-rss" href="#"><i class="icofont icofont-social-rss"></i></a></li>
                <li><a class="soc-whatsapp soc-icon-last" href="#"><i class="icofont icofont-social-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
          <hr>
        </div>

        <!--end of share box & tags-->

        <!--start of comment box-->
        <div class="col-sm-12 comment-box">
          <div class="title">
            <p>كل التعليقات:</p>
          </div>
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail"> <img class="img-responsive" src="images/face-3.jpg" alt="" /> </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default">
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user"> محمد ابراهيم</div>
                    <time class="comment-date" datetime="2015-12-20T08:00"> ديسمبر 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p> إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-primary btn-sm hvr-underline-from-center-primary"><i class="icofont icofont-ui-reply"></i> رد</a></p>
                </div>
              </div>
            </div>
          </article>

          <!-- Second Comment Reply -->
          <article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail"> <img class="img-responsive" src="images/face-1.jpg" alt="" /> </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default">
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user">علاء عبد الرحمن</div>
                    <time class="comment-date" datetime="2015-12-20T08:00"> مارس 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-primary btn-sm hvr-underline-from-center-primary"><i class="icofont icofont-ui-reply"></i> رد</a></p>
                </div>
              </div>
            </div>
          </article>

          <!-- Third Comment -->
          <article class="row">
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-primary text-right">
                <div class="panel-heading right">فريق كورة لايف</div>
                <div class="panel-body">
                  <header class="text-right">
                    <div class="comment-user">محمد ابراهيم</div>
                    <time class="comment-date" datetime="2015-12-20T08:00"> يناير 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-primary btn-sm hvr-underline-from-center-primary"><i class="icofont icofont-ui-reply"></i> رد</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail"> <img class="img-responsive" src="images/face-2.jpg" alt="" /> </figure>
            </div>
          </article>
          <hr>
        </div>
        <!--end of comment box-->

        <!--start of post shuffle-->
        <div class="col-sm-12 post-shuffle">
          <ul class="list-inline no-padding clearfix">
            <li class="col-sm-6 btn btn-sm btn-primary hvr-underline-from-center-primary "> <a href="#"> <i class="icofont icofont-long-arrow-right pull-right shuffle-prev"></i>
              <div class="pull-left text-left"> الموضوع السابق
                <h5>مثال لنص يمكن أن يستبدل</h5>
              </div>
              </a> </li>
            <li class="col-sm-6 btn btn-sm btn-primary pull-right hvr-underline-from-center-primary pull-left"> <a href="#"><i class="icofont icofont-long-arrow-left pull-left shuffle-next"></i>
              <div class="pull-right text-right"> الموضوع التالي
                <h5>هذا النص يمكن أن يتم تركيبه </h5>
              </div>
              </a> </li>
          </ul>
        </div>
        <!--end of post shuffle-->
        <!--start of add comment-->
        <div class="col-sm-12 add-comment">
          <form method="post" id="comment-form" action="#" accept-charset="UTF-8">
            <div class="title">
              <p>اترك تعليقا:</p>
            </div>
            <div class="row list-unstyled">
              <div class="col-sm-6">
                <label class="control-label" for="comment-author">الاسم<span class="req">*</span></label>
                <input type="text" class="form-control" value="" name="comment[author]" id="comment-author" required>
              </div>
              <div class="col-sm-6">
                <label class="control-label" for="comment-email">البريد الاليكتروني <span class="req">*</span></label>
                <input type="email"  class="form-control" value="" name="comment[email]" id="comment-email" required>
              </div>
              <div class="col-sm-12">
                <label class="control-label" for="comment-body">التعليق<span class="req">*</span></label>
                <textarea class="form-control" rows="5" cols="40" name="comment[body]" id="comment-body" required></textarea>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary hvr-underline-from-center-primary" id="comment-submit" type="submit">مشاركة</button>
              </div>
            </div>
          </form>
        </div>
        <!--end of add comment-->
      </div>
    </div>
    <aside class="col-sm-4">
      <div class="bordered padding-all">
        <div class="row">
          <section class="col-sm-12">
            <div class="title">
              <p>الأقسام</p>
            </div>
            <ul class="list-group nudge">
              <li class="list-group-item"><a href="#">بطولات و دوريات</a><span class="pull-left">(22)</span></li>
              <li class="list-group-item"><a href="#">كأس أمم أوروبا</a><span class="pull-left">(15)</span></li>
              <li class="list-group-item"><a href="#">كأس القارات</a><span class="pull-left">(47)</span></li>
              <li class="list-group-item"><a href="#">دوري عبد اللطيف جميل</a><span class="pull-left">(57)</span></li>
              <li class="list-group-item"><a href="#">كرة مصرية</a><span class="pull-left">(54)</span></li>
            </ul>
          </section>
          <section class="col-sm-12 opacity-eff" >
            <div class="title">
              <p>موضوع مميز</p>
            </div>
            <a href="#">
            <figure><img class=" img-responsive" src="images/today-news.jpg" width="470" height="290" alt=""/></figure>
            </a>
            <h5 class="text-uppercase"> <a href="#"> أسطورة التدريب الإيطالية يعود إلى الصين بعقد مجنون وأعلى راتب في </a></h5>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>
          </section>
          <section class="col-sm-12">
            <div class="title">
              <p>الأرشيف</p>
            </div>
            <ul class="list-group nudge">
              <li class="list-group-item"><a href="#">يناير</a></li>
              <li class="list-group-item"><a href="#">فبراير</a></li>
              <li class="list-group-item"><a href="#">مارس</a></li>
              <li class="list-group-item"><a href="#">أبريل</a></li>
              <li class="list-group-item"><a href="#">مايو</a></li>
            </ul>
          </section>
          <section class="col-sm-12 tags">
            <div class="title">
              <p>أهم الوسوم</p>
            </div>
            <a href="#">أهداف</a> <a href="#">كرة مصرية</a> <a href="#">lifestyle</a> <a href="#">feature</a> <a href="#">mountain</a> <a href="#">design</a> <a href="#">restaurant</a> <a href="#">journey</a> <a href="#">classic</a> <a href="#">sunset</a> </section>
        </div>
      </div>
    </aside>
  </div>

  <!--end of middle sec-->
</main>
 @endforeach
@endsection
