<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="type_match" id="type_match" >

<table>
  <tr>
      <td style="width: 48%">
        <div class="form-group" id="showteam1"  >
        <label for="exampleInputFile" style="float:right">النادى الاول</label>
        <input type="text"  class="form-control"name="team1_id" id="team1" >
        </select>
        </div>
      </td>

      <td style="width: 48%; padding-left: 2%;">
        <div class="form-group" id="showteam2"  >
        <label for="exampleInputFile" style="float:right">النادى الثانى</label>
        <input type="text"  class="form-control"name="team2_id" id="team2" >
        </div>
      </td>
</tr>
<tr>
  <td style="width: 48%;">
      <div class="form-group">
          <label for="exampleInputFile" style="float:right">أختيار البطوله</label>
          <select  class="form-control" name="champion_id">
                <option value="Null" selected>أختيار البطوله</option>
                @foreach($championships as $championship_id => $championship_name)
                <option value="{!! $championship_id !!}">{!! $championship_name !!}</option>
                @endforeach
          </select>
      </div>
  </td>
  <td style="width: 48%; padding-left: 2%;">
      <div class="form-group">
          <label for="exampleInputFile" style="float:right">أختيار القناه</label>
          <select id="channel"  class="form-control" name="channel_id">
                <option value="Null" selected>أختيار القناه</option>
                @foreach($channels as $channel_id => $channel_name)
                <option value="{!! $channel_id !!}">{!! $channel_name !!}</option>
                @endforeach
          </select>
      </div>
 </td>
</tr>

<tr>
  <td style="width: 48%">

          <label for="exampleInputFile" style="float:right">أختيار الأستاد</label>
          <select  class="form-control" name="stadium_id">
                <option selected>أختيار الأستاد</option>
                @foreach($stadiums as $stadium_id => $stadium_name)
                <option value="{!! $stadium_id !!}">{!! $stadium_name !!}</option>
                @endforeach
          </select>
      </div>
   </td>
   <td style="width: 48%; padding-left: 2%;">
     <div class="form-group" id="week" >
         <label for="exampleInputPassword1" style="float:right"> الاسبوع</label>
         <input type="text"
         name="  group_id"
         placeholder=" ادخل الاسبوع هنا"
         class="form-control"
      >
     </div>
   </td>
</tr>
<tr>
  <td style="width: 48%">
      <div class="form-group" id="group">
          <label for="exampleInputFile" style="float:right">أختيار المجموعه</label>
          <select id="group"  class="form-control" name="group_id">
                <option value="Null" selected>أختيار المجموعه</option>
                @foreach($groups as $group_id => $group_name)
                <option value="{!! $group_id !!}">{!! $group_name !!}</option>
                @endforeach
          </select>
      </div>
  </td>
  <td style="width: 48%; padding-left: 2%;">
     <div class="form-group"id="role"   >
         <label for="exampleInputPassword1" style="float:right">الدور</label>
         <select  class="form-control" name="role">
               <option value="Null">دور المجموعات</option>
               <option value="16">دور ال 16</option>
               <option value="8">دور ال 8</option>
               <option value="4">دور ال 4</option>
               <option value="2">دور النهائى</option>
         </select>
     </div>
   </td>
</tr>

</table>

<div class="form-group">
    <label class="control-label" style="display: block;" style="float:right">ميعاد المباره(Year/Month/Day   HH:MM PM)</label>
    <input id="datetime12" data-format="YYYY-MM-DD  h:mm a" data-template="YYYY / MM / DD  h:mm a" name="match_date" value="" type="text">
</div>

<div class="form-group">
    <label for="exampleInputPassword1" style="float:right">معلومات أضافيه</label>
    <textarea rows="2" cols="30" name="addition_info" class="form-control"></textarea>
</div>
