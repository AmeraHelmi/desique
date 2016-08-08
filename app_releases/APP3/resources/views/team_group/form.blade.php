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

<label for="exampleInputFile">أختيار نادى</label>

<select  class="form-control"

 name="team_id">

 @foreach($teams as $team_id => $team_name)

  <option value="{!! $team_id !!}">{!! $team_name !!}</option>

  @endforeach

</select>

</div>



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