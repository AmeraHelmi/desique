@extends('front_inc')

@section('title')
المدونه
@endsection

@section('content')
<!-- Data
================================================== -->
<main class="container ">
  <div class="data row"> 
    <!-- Breadcrumb
================================================== -->
    <div class="col-sm-12">
          <ol class="breadcrumb">
            <li><a href="#">الصفحة الرئيسية</a></li>
            <li><a href="#">الفيديوهات</a></li>
            <li class="active">كل الفيديوهات</li>
          </ol>
    </div>
    <!-- Blog Data
================================================== -->
    <div class="col-sm-12">
      <div id="grid" class="row"  data-columns>
        <div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <a href="../post-details.html">
              <figure><img alt="" src="images/slide-img-6.jpg" class="img-responsive"></figure>
              </a>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <a href="../post-details.html">
              <div class="blog-con">
                <iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/173317917&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
              </div>
              </a>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>Aliquam egestas pulvinar ornare. Aenean et vulputate lacus. Ut eget purus ut ante imperdiet feugiat quis vel elit. Donec imperdiet enim quis risus porttitor congue. Vestibulum vel tristique urna. Pellentesque nulla leo, laoreet sed luctus eu, dapibus id lorem. </p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <div class="blog-con">
                <iframe src="https://player.vimeo.com/video/50597841?color=e74c3c&title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
        </div>
        <div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <div id="owl-blog" class="owl-carousel owl-theme">
                <div class="item topic"> <a href="#">
                  <figure><img alt="" src="images/messi.jpg" class="img-responsive"></figure>
                  </a> </div>
                <div class="item topic"> <a href="#">
                  <figure><img alt="" src="images/messi.jpg" class="img-responsive"></figure>
                  </a> </div>
                <div class="item topic"> <a href="#">
                  <figure><img alt="" src="images/messi.jpg" class="img-responsive"></figure>
                  </a> </div>
              </div>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <a href="../post-details.html">
              <figure><img alt="" src="images/soccer.jpg" class="img-responsive"></figure>
              </a>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <div class="blog-con blog-con-link bg-primary">
                <p> <a class="small text-muted" href="#"> <span><strong>Ut eget purus ut ante imperdiet feugiat quis vel elit.</strong></span> <span>http://themeforest.net/item/globalnews-news-magazine-html5-template/9470500</span> </a> </p>
              </div>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
        </div>
        <div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <a href="../post-details.html">
             <div class="blog-con bg-info">
                  <blockquote class="small">
                    <p class="text-muted"><strong>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</strong>
                      </p><footer class="text-muted">كابتن حسن شحاتة</footer>
                    <p></p>
                  </blockquote>
                </div>
                </a>
             
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a href="#" class="btn btn-sm btn-default btn-block"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a href="#" class="btn btn-sm btn-default btn-block"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a href="#" class="btn btn-sm btn-default btn-block"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <div class="blog-con">
                <iframe width="464" height="261" src="https://www.youtube.com/embed/OFDAGiPJHL8?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen></iframe>
              </div>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="../post-details.html">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</a></h3>
              <a href="../post-details.html">
              <figure><img alt="" src="images/messi.jpg" class="img-responsive"></figure>
              </a>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
              </div>
              <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="../post-details.html">استكمل القراءة...</a> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pagination
================================================== -->
    <div class="col-sm-12 text-center">
      <hr>
      <ul class="pagination">
        <li class="disabled"> <a href="#"><i class="icofont icofont-long-arrow-right"></i></a> </li>
        <li> <a href="#">1</a> </li>
        <li class="active"> <a href="#">2</a> </li>
        <li> <a href="#">3</a> </li>
        <li> <a href="#">4</a> </li>
        <li> <a href="#">5</a> </li>
        <li> <a href="#"><i class="icofont icofont-long-arrow-left"></i></a> </li>
      </ul>
    </div>
  </div>
</main>

@endsection
