<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="exampleInputPassword1">عنوان جديد</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="title" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">تفاصيل الخبر</label>
    <textarea rows="2" cols="30" name="additional_info" class="form-control" required></textarea>
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label class="control-label" style="display: block;">الوقت(Year/Month/Day   HH:MM PM)</label>
    <input id="datetime12" data-format="YYYY-MM-DD  h:mm a" data-template="YYYY / MM / DD  h:mm a" name="date" value="" type="text">
</div>
