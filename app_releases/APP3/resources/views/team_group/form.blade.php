<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">

<label for="exampleInputFile">أختيار المجموعه</label>

<select  class="form-control"

 name="group_id">

 @foreach($groups as $group_id => $group_name)

  <option value="{!! $group_id !!}">{!! $group_name !!}</option>

  @endforeach

</select>

</div>

  <div class="form-group">
  <label for="exampleInputFile">أختيار الفريق</label>
  <select id="team_type"  class="form-control" onchange="select_team()">
    <option selected><bdi>أختر الفريق</bdi></option>
   <option value="نادى"><bdi>نادى</bdi></option>
   <option value="منتخب"><bdi>منتخب</bdi></option>
  </select>
  </div>

  <!-- <div class="form-group" id="showteam"  style="display:none;">
  <label for="exampleInputFile">اختيار نادى</label>
  <select  class="form-control"name="team_id" id="team_id" >
  </select>
  </div> -->
    	<select style="display:none;" id="team_id" multiple="1" data-placeholder="Select Players" class="form-control group-select chosen-select-multiple chosen-select-no-results" name="player_id[]" style="display: none;">
      </select>

<div class="form-group">

<label for="exampleInputPassword1">الدور</label>

<select  class="form-control"

 name="role">

  <option value="1">دور المجموعات</option>

  <option value="16">دور ال 16</option>

  <option value="8">دور ال 8</option>

  <option value="4">دور ال 4</option>

  <option value="2">دور النهائى</option>

</select>



</div>
