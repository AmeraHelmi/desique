<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
    <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputFile">أختيار نادى</label>
  <select id="team"  class="form-control"
   name="team_id">
   <option selected>أختيار نادى</option>
   @foreach($teams as $team_id => $team_name)
    <option value="{!! $team_id !!}">{!! $team_name !!}</option>
    @endforeach
  </select>
  </div>
  </td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
  <label for="exampleInputFile">أختيار مدرب</label>
  <select id="coach"  class="form-control"
   name="coach_id">
   <option selected>أختيار مدرب</option>
   @foreach($coaches as $coach_id => $coach_name)
    <option value="{!! $coach_id !!}">{!! $coach_name !!}</option>
    @endforeach
  </select>
  </div>
</td>
</tr>


<tr>
  <td style="width: 48%">
    <div class="date">
<label class="control-label">من</label>
        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="from_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
  </td>

<td style="width: 48%; padding-left: 2%;">
  <div class="date">
<label class="control-label">الى</label>
      <div class="input-group input-append date" id="datePicker2">
          <input type="text" class="form-control" name="to_date"  />
          <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
</td>
</tr>
<tr>
  <td style="width: 48%">
    <div class="form-group">
    <label for="exampleInputPassword1">عقد</label>
    <input type="number"
     name="contract"
     required
     placeholder="contract amount"
     class="form-control"
     value="0"
    >

    <span class="help-block with-errors errorName"></span>

    </div>
</td>

</tr>
</table>
