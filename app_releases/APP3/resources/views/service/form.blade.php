<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">أسم الأعلان</label>
    <input type="text" class="form-control" name="name" id="advert_name" placeholder="ادخل اسم الاعلان" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputFile">الرابط</label>
    <input type="url" name="url" placeholder="http://" class="form-control">
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
<div class="form-group">
    <label for="exampleInputPassword1">المحتوى</label>
    <textarea rows="2" cols="30" name="description" class="form-control" required></textarea>
    <span class="help-block with-errors errorName"></span>
</div>
