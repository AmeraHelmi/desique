<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
    <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputFile">Select team</label>
  <select id="team"  class="form-control"
   name="team_id">
   <option selected>select team</option>
   @foreach($teams as $team_id => $team_name)
    <option value="{!! $team_id !!}">{!! $team_name !!}</option>
    @endforeach
  </select>
  </div>
  </td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
  <label for="exampleInputFile">Select sponsor</label>
  <select id="sponsor"  class="form-control"
   name="sponsor_id">
   <option selected>select sponsor</option>
   @foreach($sponsors as $sponsor_id => $sponsor_name)
    <option value="{!! $sponsor_id !!}">{!! $sponsor_name !!}</option>
    @endforeach
  </select>
  </div>
</td>
</tr>


<tr>
  <td style="width: 48%">
    <div class="date">
<label class="control-label">from date</label>
        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="from_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
  </td>
  <td style="width: 48%; padding-left: 2%;">
    <div class="date">
<label class="control-label">to date</label>
        <div class="input-group input-append date" id="datePicker2">
            <input type="text" class="form-control" name="to_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
  </td>
</tr>
<tr>
  <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputPassword1">amount</label>
  <input type="number"
   name="amount"
   min='0'
   max='250'
   required
   placeholder="amount"
   class="form-control"
  >

  <span class="help-block with-errors errorName"></span>

  </div>
  </td>
</tr>
</table>
