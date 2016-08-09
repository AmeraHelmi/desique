<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputFile"> اختيار الالبوم</label>
<select  class="form-control"
 name="g_album_id"
 id="g_album_id">
 @foreach($albums as $g_album_id => $title)
  <option value="{!! $title !!}">{!! $g_album_id !!}</option>
  @endforeach
</select>
</div>
<div class="form-group" style="display:none;">
<label for="exampleInputFile">pic path</label>
<input type="text"
 name="flagcountry"
 id="flag"
 >
</div>
<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-primary btn-file"><span class="fileupload-new">الصوره</span>
  <span class="fileupload-exists">Change</span>         <input type="file" name="flag" /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
<div class="form-group">
<label for="exampleInputPassword1">اسم الصورة</label>
<input type="text"
 name="alt"

 placeholder="alt"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
