<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
<div class="form-group">
<label for="exampleInputFile">Nation</label>
<select  class="form-control"
 name="nation_id">
 @foreach($nations as $nation_id => $nationname)
  <option value="{!! $nation_id !!}">{!! $nationname !!}</option>
  @endforeach
</select>
</div>
</tr>
<label for="exampleInputFile">Cloths photos</label>

<tr>
<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-info btn-file" style=" width: 166px;font-size: 16PX;padding-right: 52px;">
<i class="fa fa-folder-open-o" aria-hidden="true"></i>
    <span class="fileupload-new">1th uniform </span>
  <span class="fileupload-exists">Change</span>
          <input type="file" name="principal"/></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>

<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-info btn-file"  style=" width: 166px;font-size: 16PX;    padding-right: 52px;">
<i class="fa fa-folder-open-o" aria-hidden="true"></i>
    <span class="fileupload-new">2th uniform</span>
  <span class="fileupload-exists">Change</span>
          <input type="file" name="reserve" /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>

<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-info btn-file"  style=" width: 166px;font-size: 16PX;    padding-right: 52px;">
<i class="fa fa-folder-open-o" aria-hidden="true"></i>
    <span class="fileupload-new">3th uniform <span style="color:red;">(*)</span> </span>
  <span class="fileupload-exists">Change</span>
          <input type="file" name="reserve2" /></span>
            <a href="#" class="delete" id="del" name="delete"  style="float: none; font-size:20px; display:none;">×</a>
          </span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>

<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-info btn-file"  style=" width: 166px;font-size: 16PX;">
<i class="fa fa-folder-open-o" aria-hidden="true"></i>
    <span class="fileupload-new">Practise uniform</span>
  <span class="fileupload-exists">Change</span>
          <input type="file" name="practise" /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
</tr></table>

<div class="form-group" style="display:none;">
<label for="exampleInputFile">pic path</label>
<input type="text"
 name="flagcountry"
 id="flag"
 >
</div>
