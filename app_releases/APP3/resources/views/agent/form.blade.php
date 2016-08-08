<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputPassword1">أسم الوكيل</label>
<input type="text"
  class="form-control"
  name="name"
  id="agent_name"
  placeholder="Agent name"
  required
  class="form-control"
  >
    <span class="help-block with-errors errorName"></span>
</div>

