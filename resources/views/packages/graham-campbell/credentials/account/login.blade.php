@extends(Config::get('graham-campbell/core::layout'))

@section('title')
Login
@stop

@section('top')
<div class="page-header">
<h1>Login</h1>
</div>
@stop

@section('content')
<p class="lead">Please enter your details: or login with <a href="{{ url('account/social-login/facebook') }}">Facebook</a>, <a href="{{ url('account/social-login/twitter') }}">Twiter</a> or <a href="{{ url('account/social-login/google') }}">Google+</a></p>
<div class="well">
    {!! Form::open(array('url' => URL::route('account.login.post'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

        <div class="form-group{!! ($errors->has('email')) ? ' has-error' : '' !!}">
            <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="email">Email</label>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10">
                <input name="email" id="email" value="{!! Request::old('email') !!}" type="text" class="form-control" placeholder="Email">
                {!! ($errors->has('email') ? $errors->first('email') : '') !!}
            </div>
        </div>

       <div class="form-group{!! ($errors->has('password')) ? ' has-error' : '' !!}">
            <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="password">Password</label>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10">
                <input name="password" id="password" value="" type="password" class="form-control" placeholder="Password">
                {!! ($errors->has('password') ? $errors->first('password') : '') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 col-xs-12">
                <div class="checkbox">
                    <label><input type="checkbox" name="rememberMe" value="1"> Remember Me</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 col-xs-12">
                <button class="btn btn-primary" type="submit"><i class="fa fa-rocket"></i> Log In</button>
                @if (Config::get('graham-campbell/credentials::activation'))
                    <label><a href="{!! URL::route('account.reset') !!}" class="btn btn-link">Forgot Password?</a>/<a href="{!! URL::route('account.resend') !!}" class="btn btn-link">Not Activated?</a></label>
                @else
                    <label><a href="{!! URL::route('account.reset') !!}" class="btn btn-link">Forgot Password?</a>
                @endif
            </div>
        </div>

  {!! Form::close() !!}
</div>
@stop
