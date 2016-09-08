<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
<div class="form-group">
<label for="exampleInputPassword1">أسم القناه</label>
<input type="text"
 name="name"
 required
 placeholder="Channel Name "
 class="form-control"
>

<span class="help-block with-errors errorName"></span>

</div>
</tr>

<tr>
<div class="form-group">
<label for="exampleInputPassword1">IP</label>
<input type="number"
 name="frequency"

 placeholder="Channel Frequency"
 class="form-control">
<span class="help-block with-errors errorName"></span>
</div>
</tr>

<tr>
  <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">الصوره</span>
    <span class="fileupload-exists">تغير</span>
            <input type="file" name="flag" required /></span>
<<<<<<< HEAD
=======

<<<<<<< HEAD
=======
            <input type="file" name="flag" required/></span>

>>>>>>> e34a3eaab70535cc136d2f6ca0281aa4372444e1
>>>>>>> 03030f001cbe3cef9cfc59e65eaf2b124f5e90dc
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>
  <div class="form-group">
<label for="exampleInputPassword1">رابط القناه</label>
<input
  type="url"
  class="form-control"
  name="url"
  id="url"
  placeholder="http://..."
  required
  class="form-control">
  <span class="help-block with-errors errorName"></span>
</div>
  <div class="form-group">
<label for="exampleInputPassword1">معلومات اضافيه</label>
<textarea rows="2" cols="30" name="addition_info" class="form-control" required></textarea>
<span class="help-block with-errors errorName"></span>
</div>
  <div class="form-group" style="display:none;">
  <label for="exampleInputFile">pic path</label>
  <input type="text"
   name="flagcountry"
   id="flag"
   >
  </div>
</tr>
</table>
