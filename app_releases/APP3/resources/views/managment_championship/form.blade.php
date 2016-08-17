<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
  <tr>
    <td style="width: 48%">
  <div class="form-group">
  <label for="exampleInputFile">أختر مدير</label>
  <select id="manager"  class="form-control"
   name="manager_id">
   <option selected>أختر مدير</option>
   @foreach($managers as $manager_id => $manager_name)
    <option value="{!! $manager_id !!}">{!! $manager_name !!}</option>
    @endforeach
  </select>
  </div>
  </td>
<td style="width: 48%; padding-left: 2%;">
  <div class="form-group">
  <label for="exampleInputFile">أختر بطوله</label>
  <select id="championship"  class="form-control"
   name="championship_id">
   <option selected>أختر بطوله</option>
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
    <label class="control-label" style="display: block;">تاريخ الفوز</label>
    <input id="datetime1" data-format="YYYY-MM-DD" data-template="YYYY / MM / DD" name="win_date" value="" type="text">
    </div>
  </td>

</tr>
</table>
