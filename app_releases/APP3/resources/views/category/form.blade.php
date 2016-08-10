<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputPassword1">اسم الفئة</label>
<input type="text"
  class="form-control"
  name="name"
  placeholder="أدخل اسم الفئة"
  required
  class="form-control"
  >
    <span class="help-block with-errors errorName"></span>
</div>
