<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<td style="width: 48%">
<label for="exampleInputFile">Match</label>
<select  class="form-control"  id="match"
 name="match_id">
 @foreach($matches as $key=>$value)

  <option value="{!! $value['matchid'] !!}">{!! $value['team1_name'] !!} - {!! $value['team2_name'] !!}</option>
  @endforeach
</select>
</div>


<div class="form-group">
<label for="exampleInputFile">Select sponsor</label>
<select  class="form-control"
 name="sponsor_id">
 @foreach($sponsors as $sponsor_id => $sponsor_name)
  <option value="{!! $sponsor_id !!}">{!! $sponsor_name !!}</option>
  @endforeach
</select>
</div>
