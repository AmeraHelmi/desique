<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
  <td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1">أسم البطوله</label>
<input type="text"
 name="name"
 required
 placeholder="Championship name"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%;  padding-left: 2%;">
<div class="form-group">
<label for="exampleInputFile">أختيار الدوله</label>
<select id="country"  class="form-control"
name="country_id">
<option selected>أختيار الدوله</option>
@foreach($countries as $country_id => $country_name)
<option value="{!! $country_id !!}">{!! $country_name !!}</option>
@endforeach
</select>
</div>
</td>
</tr>

<tr>
<td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1">عدد المباريات</label>
<input type="number"
 name="no_matches"
 required
 placeholder="no_matches"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%; padding-left: 2%;">
<div class="form-group">
<label for="exampleInputPassword1">نوع البطوله</label>
<select id="Championshiptype"  class="form-control"
 name="type">
 <option selected>أختار النوع</option>
 <option value="local">محليه</option>
 <option value="world">دوليه</option>
</select>
<span class="help-block with-errors errorName"></span>

</div>
</td>
</tr>
<tr>
<td style="width: 48%;">
<div class="form-group">
<label for="exampleInputPassword1">أختار الماركه</label>
<select id="Brand"  class="form-control"
name="brand">
<option selected>أختار الماركه</option>
<option value="Addidas">Addidas</option>
<option value="Puma">Puma</option>
<option value="Nike">Nike</option>
</select>
<span class="help-block with-errors errorName"></span>

</div>
</td>
</tr>
</table>

<div class="fileupload fileupload-new" data-provides="fileupload">
  <span class="btn btn-primary btn-file"><span class="fileupload-new">الصوره</span>
  <span class="fileupload-exists">تغير</span>
          <input type="file" name="champion_ball" /></span>
  <span class="fileupload-preview"></span>
  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>

<div class="form-group" style="display:none;">
<label for="exampleInputFile">pic path</label>
<input type="text"
 name="flagcountry"
 id="champion_ball"
 >
</div>
<div class="form-group">
<label for="exampleInputPassword1">معلومات أضافيه عن البطوله</label>
<textarea rows="2" cols="30" name="addition_info" class="form-control" required></textarea>
<span class="help-block with-errors errorName"></span>

</div>
