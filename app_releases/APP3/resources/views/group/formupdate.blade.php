<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="form-group">
<label for="exampleInputFile">Championship</label>
<select  class="form-control" required
 name="championship_id">
 <option>select championship</option>
 @foreach($championships as $championship_id => $championship_name)
  <option value="{!! $championship_id !!}">{!! $championship_name !!}</option>
  @endforeach
</select>
</div>

<div class="form-group">
<label for="exampleInputFile">Group Name</label>
<select  class="form-control" required
 name="name">
 <option>select Group</option>
 <option value="A المجموعه">A المجموعه</option>
 <option value="B المجموعه">B المجموعه</option>
 <option value="C المجموعه">C المجموعه</option>
 <option value="D المجموعه">D المجموعه</option>
 <option value="E المجموعه">E المجموعه</option>
 <option value="F المجموعه">F المجموعه</option>
 <option value="G المجموعه">G المجموعه</option>
 <option value="H المجموعه">H المجموعه</option>
</select>
</div>
