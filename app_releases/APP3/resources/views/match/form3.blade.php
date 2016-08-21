<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
<label for="exampleInputFile">أختيار الفريق</label>
<select id="team_type"  class="form-control" onchange="select_team3()">
  <option selected><bdi>أختر الفريق</bdi></option>
 <option value="نادى"><bdi>نادى</bdi></option>
 <option value="منتخب"><bdi>منتخب</bdi></option>
</select>
</div>
<table>
  <tr>
      <td style="width: 48%">
        <div class="form-group" id="showteam1"  style="display:none;">
        <label for="exampleInputFile">النادى الاول</label>
        <select  class="form-control"name="team1" id="team1" >
        </select>
        </div>
      </td>

      <td style="width: 48%; padding-left: 2%;">
        <div class="form-group" id="showteam2"  style="display:none;">
        <label for="exampleInputFile">النادى الثانى</label>
        <select  class="form-control"name="team2" id="team2" >
        </select>
        </div>
      </td>
</tr><tr>
  <td style="width: 48%">
    <div class="form-group">
        <label for="exampleInputPassword1"> الاسبوع</label>
        <input type="text"
        name="  group_id"
        required
        placeholder=" ادخل الاسبوع هنا"
        class="form-control"
     >
    </div>
  </td>

  <td style="width: 48%; padding-left: 2%;">
      <div class="form-group">
          <label for="exampleInputFile">أختيار البطوله</label>
          <select  class="form-control" name="champion_id">
                <option value="Null" selected>أختيار البطوله</option>
                @foreach($championships as $championship_id => $championship_name)
                <option value="{!! $championship_id !!}">{!! $championship_name !!}</option>
                @endforeach
          </select>
      </div>
  </td>
</tr>

<tr>
  <td style="width: 48%">
      <div class="form-group">
          <label>الحكام</label><br />
          {!! Form::select('referees[]', $referees, null, array('multiple'=> true, 'data-placeholder'=>'Select referees' ,'class'=> 'form-control group-select chosen-select-multiple chosen-select-no-results')) !!}
      </div>
  </td>

  <td style="width: 48%; padding-left: 2%;">
      <div class="form-group">
          <label for="exampleInputFile">أختيار الأستاد</label>
          <select  class="form-control" name="stadium_id">
                <option selected>أختيار الأستاد</option>
                @foreach($stadiums as $stadium_id => $stadium_name)
                <option value="{!! $stadium_id !!}">{!! $stadium_name !!}</option>
                @endforeach
          </select>
      </div>
   </td>
</tr>

<tr>
    <td style="width: 48%;">
        <div class="form-group">
            <label for="exampleInputFile">أختيار القناه</label>
            <select id="channel"  class="form-control" name="channel_id">
                  <option value="Null" selected>أختيار القناه</option>
                  @foreach($channels as $channel_id => $channel_name)
                  <option value="{!! $channel_id !!}">{!! $channel_name !!}</option>
                  @endforeach
            </select>
        </div>
   </td>


</tr>
</table>

<div class="form-group">
    <label class="control-label" style="display: block;">ميعاد المباره(Year/Month/Day   HH:MM PM)</label>
    <input id="datetime123" data-format="YYYY-MM-DD  h:mm a" data-template="YYYY / MM / DD  h:mm a" name="match_date" value="" type="text">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">معلومات أضافيه</label>
    <textarea rows="2" cols="30" name="addition_info" class="form-control"></textarea>
</div>
