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
            <li><a href="{{url('/')}}">الصفحة الرئيسية</a></li>
            <li class="active">المدونه</li>
          </ol>
    </div>
    <!-- Blog Data
================================================== -->
    <div class="col-sm-12">
      <div id="grid" class="row"  data-columns>
        <div>
     <?php $count = 0 ; ?>
       @foreach($posts as $post)
        <?php $count++; ?>
          <div class="blog-post-body col-sm-12">
            <div class="bordered-content">
              <h3 class="text-uppercase"><a href="{{ url('/posts',$post->id) }}">{{$post->title}}</a></h3>
              <a href="{{ url('/posts',$post->id) }}">
              <figure><img alt="{{$post->alt}}" src="images/uploads/{{$post->flag}}" class="img-responsive"></figure>
              </a>
              <div class="box-sub-info box-sub-info-bordered">
                <ul class="list-inline no-padding-right text-primary row">
                <li class="col-sm-4"><a class="btn btn-sm btn-default btn-block" href="{{ url('/Allposts',$post->date)}}"><i class="icofont icofont-calendar"></i>{{$post->date}} </a></li>
                <li class="col-sm-4"><i class="icofont icofont-eye-alt"></i>{{$post->likes}} أعجاب</a></li>
                <li class="col-sm-4"><i class="icofont icofont-speech-comments"></i>{{$post->comments}} تعليقات</a></li>
              </ul>
              </div>
              <p>{{$post->body}}</p>
              <hr>
              <a class="btn btn-primary btn-block hvr-sweep-to-right-primary" href="{{ url('/posts',$post->id) }}">استكمل القراءة...</a> </div>
          </div>
          <?php if($count == 3 ){
              echo '</div><div>';
          }
          ?>
      @endforeach
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
