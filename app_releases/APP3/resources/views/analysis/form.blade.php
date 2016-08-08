<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputFile">أختيار المباراه </label>
<select  class="form-control"  id="match"  name="match_id">
 <option selected>أختيار المباراه</option>
 @foreach($matches as $key=>$value)
  <option value="{!! $value['matchid'] !!}">{!! $value['team1_name'] !!} - {!! $value['team2_name'] !!}</option>
  @endforeach
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword1">التحليل</label>
<textarea rows="2" cols="30" name="analysis" class="form-control"></textarea>
</div>

<div class="form-group">
<label class="control-label" style="display: block;">الوقت(Year/Month/Day   HH:MM PM)</label>
<input id="datetime12" data-format="YYYY-MM-DD  h:mm a" data-template="YYYY / MM / DD  h:mm a" name="analysis_date" value="" type="text">
</div>
