<a href="#" class="btn btn-warning" style="width: 100%; margin-bottom: 10px;" data-toggle="modal" data-target="#modal">HUBUNGI KOST</a>
<!-- /.modal-dialog -->
<div class="modal" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Sign in to order</h4>
      </div>
      <div class="modal-body">
        <form class="form-signin" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                	<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
	                @if ($errors->has('username'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('username') }}</strong>
	                    </span>
	                @endif
                </div>
                <div class="form-group">
                	<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
	                @if ($errors->has('password'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('password') }}</strong>
	                    </span>
	                @endif
                </div>
                <div class="form-group">
                	<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember"> Remember Me
                    </label>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Sign in</button>
        </form><!-- /form -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>