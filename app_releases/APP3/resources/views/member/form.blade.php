<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="exampleInputPassword1">الاسم</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="ادخل اسم الشخص" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">الايميل</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="ادخل الايميل"  class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">الوظيفة</label>
    <input type="text" class="form-control" name="job" id="job" placeholder="ادخل الوظيفة " required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">الفيس بوك</label>
    <input type="url" class="form-control" name="facebook" id="facebook"  class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group" style="display:none;">
    <label for="exampleInputFile">pic path</label>
    <input type="text" name="flagadvert" id="flag" required>
</div>
<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-primary btn-file"><span class="fileupload-new">الصوره</span>
  <span class="fileupload-exists">تغير</span>
  <input type="file" name="flag" required /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
