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
   <label for="exampleInputFile">اختر الفئة</label>
   <select id="category"  class="form-control"
    name="category_id">
    <option selected value="">اختر الفئة</option>
    @foreach($categories as $category_id => $category_name)
     <option value="{!! $category_name !!}">{!! $category_id !!}</option>
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
