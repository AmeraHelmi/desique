<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
  <td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1"> name</label>
<input type="text"
 name="name"
 required
 placeholder=" name"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%; padding-left: 2%;">
<div class="form-group">
<label for="exampleInputPassword1">Role</label>
<input type="text"
 name="role"
 required
 placeholder="role"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>
</div>
</td>
</tr>

<tr>
<td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1">Job</label>
<input type="text"
 name="job"
 required
 placeholder="job"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%; padding-left: 2%;">
<div class="form-group">
<label for="exampleInputPassword1">salary</label>
<input type="number"
 name="salary"
 min='0'
 max='2500'
 required
 placeholder="salary"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
</tr>
<tr>
<td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1">selection type</label>
<select id="type"  class="form-control" name="type" required>
  <option selected>select type</option>
  <option value="Elected">منتخب</option>
  <option value="appoint">معين</option>
 </select>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
    <label for="exampleInputFile">comment</label>
<textarea rows="2" cols="30" name="comment" class="form-control" required></textarea>
<span class="help-block with-errors errorName"></span>

</div>
</td>
</tr>
<tr>
  <td style="width: 48%">
<div class="form-group">
<label for="exampleInputFile">Select country</label>
<select id="country"  class="form-control" onchange="selectCity()"required
 name="country_id">
 <option selected>select country</option>
 @foreach($countries as $country_id => $country_name)
  <option value="{!! $country_id !!}">{!! $country_name !!}</option>
  @endforeach
</select>
</div>
</td>
<td style="width: 48%; padding-left: 2%;">
<div class="form-group" id="showCity" style="display:none;">
<label for="exampleInputFile">Select city</label>
<select  class="form-control" name="city_id" id="cityID" >
</select>
</div>
</td>
</tr>
</table>
  <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">Select Image</span>
    <span class="fileupload-exists">Change</span>
            <input type="file" name="flag" /></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
  </div>

  <div class="form-group" style="display:none;">
  <label for="exampleInputFile">pic path</label>
  <input type="text"
   name="flagcountry"
   id="flag"
   >
  </div>
