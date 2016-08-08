<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
    <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputFile">أختيار لاعب</label>
  <select id="player"  class="form-control"
   name="player_id">
   <option selected>أختيار لاعب</option>
   @foreach($players as $player_id => $player_name)
    <option value="{!! $player_id !!}">{!! $player_name !!}</option>
    @endforeach
  </select>
  </div>
  </td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
  <label for="exampleInputFile">أختيار راعى</label>
  <select id="sponsor"  class="form-control"
   name="sponsor_id">
   <option selected>أختيار راعى</option>
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
            <input type="text" class="form-control" name="to_date" required />
            <span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
      </div>
  </td>
</tr>
<tr>
  <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputPassword1">مبلغ</label>
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
