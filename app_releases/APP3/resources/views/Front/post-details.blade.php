@extends('front_inc')

@section('title')
@foreach($p_details as $p_detail)
{{$p_detail->title}}
@endforeach
@endsection

@section('content')
<!-- Data
================================================== -->
     @foreach($p_details as $p_detail)
<main class="container "> 
  <!--start of middle sec-->

  <div class="row data">
    <div class="col-sm-8 ">
      <div class="row">
  
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{url('/posts')}}">المدونة</a></li>
            <li class="active">{{$p_detail->title}}</li>
          </ol>
        </div>
         
        <div class="blog-post-body col-sm-12">
          <h3 class="text-primary">
          <a href="post-details.html">{{$p_detail->title}}</a></h3>
          <p class="text-muted"><span>{{$p_detail->date}} / بواسطة:
          <a href="{{ url('/Allposts',$p_detail->author)}}">{{$p_detail->author}}</a> / القسم: 
           <a href="#">{{ $p_detail->Cname}}</a> /{{ $num_comments }} تعليقات</span></p>
          <figure><img alt="{{$p_detail->alt}}" src="../images/uploads/{{$p_detail->flag}}" 
          class="img-responsive"></figure>
            <p>{{$p_detail->body}}</p>
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
          @if(count($previous_post_id) > 0)
            <li class="col-sm-6 btn btn-sm btn-primary hvr-underline-from-center-primary "> 
            <a href="{{url('/prevpost',$previous_post_id)}}"> <i class="icofont icofont-long-arrow-right pull-right shuffle-prev"></i>
              <div class="pull-left text-left"> الموضوع السابق
                <h5>مثال لنص يمكن أن يستبدل</h5>
              </div>
              </a> </li>
              @else
            <li disabled="true" class="col-sm-6 btn btn-sm btn-primary hvr-underline-from-center-primary "> 
              <div class="pull-left text-left"> الموضوع السابق
                <h5>لا يوجد مدونات سابقه</h5>
              </div>
 </li>
              @endif
            <li   class="col-sm-6 btn btn-sm btn-primary pull-right hvr-underline-from-center-primary pull-left"> <a href="{{url('/nextpost',$next_post_id)}}"><i class="icofont icofont-long-arrow-left pull-left shuffle-next"></i>
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
              <div class="col-sm-12">
                <label class="control-label" for="comment-body">التعليق<span class="req">*</span></label>
                <textarea class="form-control" rows="5" cols="40" name="comment[body]" id="comment-body" required></textarea>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary hvr-underline-from-center-primary" id="comment-submit" type="submit" disabled>مشاركة</button>
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