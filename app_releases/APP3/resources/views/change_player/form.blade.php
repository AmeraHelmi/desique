<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
    <td style="width: 48%">

<div class="form-group">
<label for="exampleInputFile">Select Match </label>
<label for="exampleInputFile">Match</label>
<select  class="form-control"  id="match" onchange="selectteam()"
 name="match_id">
 <option selected>select match</option>
 @foreach($matches as $key=>$value)
  <option value="{!! $value['matchid'] !!}">{!! $value['team1_name'] !!} - {!! $value['team2_name'] !!}</option>
  @endforeach
</select>
</div>
</td>
<td style="width: 48%; padding-left: 2%;">

<div class="form-group" id="showteam" style="display:none;" onchange="selectplayers1()">
<label for="exampleInputFile">Select Team </label>
<select  class="form-control"  name="team_id" id="team_id" >
</select>
</div>
</td>
</tr>
</table>

<div class="form-group"  id="showplayers1" style="display:none;"  >
  <label for="exampleInputFile">Select Player1</label>
  <select  class="form-control"name="player1_id" id="player1_id" onchange="selectplayers2()">
  </select>
</div>
<div class="form-group"  id="showplayers2" style="display:none;"  >
  <label for="exampleInputFile">Select Player2</label>
  <select  class="form-control"name="player2_id" id="player2_id" >
  </select>
</div>
