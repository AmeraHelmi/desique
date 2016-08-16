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
  <td style="width: 48%">
    <div class="form-group">
    <label class="control-label" style="display: block;">من</label>
    <input id="datetime1" data-format="YYYY-MM-DD" data-template="YYYY / MM / DD" name="start_date" value="" type="text">
    </div>
  </td>
  <td style="width: 48%; padding-left: 2%;">
    <div class="form-group">
    <label class="control-label" style="display: block;">االى</label>
    <input id="datetime2" data-format="YYYY-MM-DD" data-template="YYYY / MM / DD" name="end_date" value="" type="text">
    </div>
  </td>

</tr>
<tr>
  <td style="width: 48%;">
  <div class="form-group">
<label for="exampleInputPassword1">القاره</label>
<input type="text"
 name="continent"
 required
 placeholder="القاره"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>
</div>
</td>
</tr>
</table>

<div class="form-group">
<label for="exampleInputPassword1">معلومات أضافيه عن البطوله</label>
<textarea rows="2" cols="30" name="addition_info" class="form-control" required></textarea>
<span class="help-block with-errors errorName"></span>

</div>
