<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
      <td style="width: 48%">
<div class="form-group">
<label for="exampleInputPassword1">  nickname</label>
<input type="text"
 name="nickname"
 required
 placeholder=" nickname"
 class="form-control"
>
<span class="help-block with-errors errorName"></span>

</div>
</td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
  <label for="exampleInputPassword1">slogan</label>
  <input type="text"
   name="slogan"

   placeholder="slogan"
   class="form-control"
  >
  <span class="help-block with-errors errorName"></span>

  </div>
</td>
</tr>

    <td style="width: 48% ">
      <div class="form-group">
      <label for="exampleInputFile">Select country</label>
      <select id="country"  class="form-control" name="country_id">
      <option selected>select country</option>
      @foreach($countries as $country_id => $country_name)
      <option value="{!! $country_id !!}">{!! $country_name !!}</option>
      @endforeach
      </select>
      </div>
    </td>
<tr>
<tr>
  <td style="width: 48%; padding-left: 2%;">
    <div class="date">
<label class="control-label">Start date</label>
        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="start_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
  </td>
  <td style="width: 48%">
    <div class="form-group">
    <label for="exampleInputFile">Select stadium</label>
    <select   class="form-control" name="stadium_id">
    <option selected>select stadium</option>
    @foreach($stadiums as $stadium_id => $stadium_name)
    <option value="{!! $stadium_id !!}">{!! $stadium_name !!}</option>
    @endforeach
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
