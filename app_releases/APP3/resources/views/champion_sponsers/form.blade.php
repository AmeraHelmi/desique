<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputFile">أختيار الراعى</label>
<select  class="form-control"
 name="sponsor_id">
 @foreach($sponsors as $sponsor_id => $sponsor_name)
  <option value="{!! $sponsor_id !!}">{!! $sponsor_name !!}</option>
  @endforeach
</select>
</div>
<div class="form-group">
<label for="exampleInputFile">أختيار البطوله</label>
<select  class="form-control"
 name="championship_id">
 @foreach($championships as $championship_id => $championship_name)
  <option value="{!! $championship_id !!}">{!! $championship_name !!}</option>
  @endforeach
</select>
</div>
