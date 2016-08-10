<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputPassword1">اسم الالبوم</label>
<input type="text"
  class="form-control"
  name="title"
  placeholder="أدخل اسم الالبوم"
  required
  class="form-control"
  >
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
<label for="exampleInputPassword1">كلمات البحث</label>
<input type="text"
  class="form-control"
  name="meta"
  placeholder="أدخل كلمات البحث"

  class="form-control"
  >
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">

   <label for="exampleInputFile" style="float: right;">رابط الفيديو</label>

   <input type="url"

    name="vedio_url"

    placeholder="http://"

    class="form-control"

    >

    <span class="help-block with-errors errorName"></span>

   </div>
   <div class="form-group">
   <label for="exampleInputFile">اختر النادى </label>
   <select id="team"  class="form-control"
    name="team_id">
    <option selected>اختر النادى</option>
    @foreach($teams as $team_id => $team_name)
     <option value="{!! $team_name !!}">{!! $team_id !!}</option>
     @endforeach
   </select>
   </div>
   <div class="form-group">
   <label for="exampleInputFile">اختر البطولة</label>
   <select id="championship"  class="form-control"
    name="championship_id">
    <option selected>اختر البطولة</option>
    @foreach($championships as $championship_id => $championship_name)
     <option value="{!! $championship_name !!}">{!! $championship_id !!}</option>
     @endforeach
   </select>
   </div>
   <div class="form-group">
   <label for="exampleInputFile">اختر المنتخب</label>
   <select id="nation"  class="form-control"
    name="nation_id">
    <option selected>اختر المنتخب</option>
    @foreach($nations as $nation_id => $nation_nickname)
     <option value="{!! $nation_nickname !!}">{!! $nation_id !!}</option>
     @endforeach
   </select>
   </div>
   <div class="form-group">
   <label for="exampleInputFile">اختر البلد</label>
   <select id="country"  class="form-control"
    name="country_id">
    <option selected>اختر البلد</option>
    @foreach($countries as $country_id => $country_name)
     <option value="{!! $country_name !!}">{!! $country_id !!}</option>
     @endforeach
   </select>
   </div>
   <div class="form-group">
   <label for="exampleInputPassword1">القارة</label>
   <input type="text"
     class="form-control"
     name="continent"
     placeholder="ادخل اسم القارة"

     class="form-control"
     >
       <span class="help-block with-errors errorName"></span>
   </div>
