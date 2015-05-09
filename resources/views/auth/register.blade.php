




                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group @if($errors->has('name')) has-error @endif">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if($errors->has('name')) <p class="help-block">{{$errors->first('name')}}</p> @endif
							</div>
						</div>

						<div class="form-group @if($errors->has('email')) has-error @endif">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if($errors->has('email')) <p class="help-block">{{$errors->first('email')}}</p> @endif
							</div>
						</div>

						<div class="form-group @if($errors->has('password')) has-error @endif">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
                                @if($errors->has('password')) <p class="help-block">{{$errors->first('password')}}</p> @endif
							</div>
						</div>

						<div class="form-group @if($errors->has('password_confirmation')) has-error @endif"">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
                                @if($errors->has('password_confirmation')) <p class="help-block">{{$errors->first('password_confirmation')}}</p> @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>

