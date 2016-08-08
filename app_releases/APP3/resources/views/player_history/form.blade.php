<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
  <td style="width: 48%">
<div class="form-group">
    <label class="control-label">من</label>
    <div class="date">
        <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="from_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </td>
<td style="width: 48%; padding-left: 2%;">
    <div class="form-group">
<label class="control-label">الى</label>
  <div class="date">
        <div class="input-group input-append date" id="datePicker2">
            <input type="text" class="form-control" name="to_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
    </div>

</div>
</td>
</tr>
<tr>
    <td style="width: 48%">
      <div class="form-group">
      <label for="exampleInputFile">من نادى </label>
      <select  class="form-control" name="from_team_id">
        <option selected>Seclect team</option>
       @foreach($teams as $team_id => $team_name)
        <option value="{!! $team_id !!}">{!! $team_name !!}</option>
        @endforeach
      </select>
      </div>
    </td>

    <td style="width: 48%; padding-left: 2%;">
      <div class="form-group">
      <label for="exampleInputFile">الى نادى </label>
      <select  class="form-control" name="to_team_id">
        <option selected>Seclect team</option>
       @foreach($teams as $team_id => $team_name)
        <option value="{!! $team_id !!}">{!! $team_name !!}</option>
        @endforeach
      </select>
      </div>
    </td>
  </tr>
<tr>
  <td style="width: 48%;">
    <div class="form-group">
    <label for="exampleInputFile">أختيار لاعب</label>
    <select  class="form-control" name="player_id">
      <option selected>أختيار لاعب</option>
     @foreach($players as $player_id => $player_name)
      <option value="{!! $player_id !!}">{!! $player_name !!}</option>
      @endforeach
    </select>
    </div>
  </td>

  <td style="width: 48%; padding-left: 2%;">
    <div class="form-group">
    <label for="exampleInputFile">نوع العقد </label>
    <select  class="form-control"  name="contract_type">
      <option selected>Seclect contract</option>
      <option value="أعاره"><bdi>أعاره</bdi></option>
      <option value="أنتقال"><bdi>أنتقال</bdi></option>
    </select>
    </div>
  </td>
</tr>
<tr>
  <td style="width: 48%;">
      <div class="form-group">
  <label class="control-label">بداية اللاعب</label>
    <div class="date">
          <div class="input-group input-append date" id="datePicker3">
              <input type="text" class="form-control" name="start_date" required />
              <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
      </div>

  </div>
  </td>

  <td style="width: 48%; padding-left: 2%;">
    <div class="form-group">
    <label for="exampleInputPassword1">مبلغ العقد</label>
    <input type="number"
     name="contract_total"
     required
     placeholder="money"
     class="form-control"
    >
    <span class="help-block with-errors errorName"></span>
    </div>
  </td>
</tr>
<tr>
  <td style="width: 48%; ">
    <div class="form-group">
    <label for="exampleInputFile">نوع الفصل </label>
    <select  class="form-control"  name="season_type">
      <option selected>اختيار الفصل</option>
      <option value="انتقالات صيفيه"><bdi>انتقالات صيفيه</bdi></option>
      <option value="أنتقالات شتويه"><bdi>أنتقالات شتويه</bdi></option>
    </select>
    </div>
  </td>
</tr>
</table>
