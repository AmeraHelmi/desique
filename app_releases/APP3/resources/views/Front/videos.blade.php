@extends('front_inc')

@section('title')
الفيديوهات
@endsection

@section('content')

<!-- Data
================================================== -->
<main class="container ">
  <div class="data row">
    <!-- Breadcrumb
================================================== -->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-9">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{url('/vedios')}}">الفيديوهات</a></li>
            <li class="active">كل الفيديوهات</li>
          </ol>
        </div>
        <div class="col-sm-3">
          <p class="pull-left small"><i class="icofont icofont-idea"></i><strong>اجمالي الفيديوهات:</strong> <span class="text-muted">1,862 فيديو</span></p>
        </div>
      </div>
    </div>
    <!-- Videos Data
================================================== -->
    <div class="col-sm-12">
      <div id="video-info" class="row">
           <?php $count = 0 ; ?>
          @foreach($vedios as $vedio)
          <?php $count++; ?>

        <div class="box-body col-sm-4">
          <div class="bordered padding-all"> <a class="details" href="{{ url('/vedios',$vedio->id) }}" >
            <figure title="<h3 class='text-uppercase text-info'>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</h3>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>">
              <h3 class="text-uppercase text-info">{{$vedio->title}}</h3>
              <div  class="vid-box"> <i class="icofont icofont-ui-play"></i><img class="img-responsive" alt="" src="images/uploads/{{$vedio->flag}}"> </div>
            </figure>
            </a>
            <div class="box-sub-info">
              <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-calendar"></i>19 ديسمبر </a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-eye-alt"></i>21 مشاهدة</a></li>
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="#"><i class="icofont icofont-speech-comments"></i>4 تعليقات</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php if($count == 3 ){
            echo '  <div class="col-sm-12 text-center ad"><img class="img-responsive" src="images/uploads/728-90-ad.gif" width="728" height="90" alt=""/></div>';
        }
        ?>
        @endforeach
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
<!-- Footer
================================================== -->
<footer></footer>
@endsection
