<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputFile">Player</label>
        <select  class="form-control" name="player_id">
              @foreach($players as $player_id => $player_name)
              <option value="{!! $player_id !!}">{!! $player_name !!}</option>
              @endforeach
        </select>
    </td>
</div>

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputFile">Match</label>
        <select  class="form-control"  id="match" name="match_id">
                @foreach($matches as $key=>$value)
                <option value="{!! $value['matchid'] !!}">{!! $value['team1_name'] !!} - {!! $value['team2_name'] !!}</option>
                @endforeach
        </select>
    </td>
</div>

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputFile">Referee</label>
        <select  class="form-control" name="referee_id">
                @foreach($referees as $referee_id => $referee_name)
                <option value="{!! $referee_id !!}">{!! $referee_name !!}</option>
                @endforeach
        </select>
    </td>
</div>

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputPassword1">Color</label>
        <input type="text" name="color" required placeholder="Color" class="form-control" >
        <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputPassword1">Comment</label>
        <input type="textarea" name="comment" required placeholder="Comment" class="form-control">
        <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <td style="width: 48%">
        <label for="exampleInputPassword1">Time</label>
        <div id="datetimepicker" class="input-append date">
            <input type="text"></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
        <span class="help-block with-errors errorName"></span>
</div>
