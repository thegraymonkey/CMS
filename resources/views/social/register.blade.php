@extends(Config::get('graham-campbell/core::layout'))

@section('title')
    Register
@stop

@section('top')
    <div class="page-header">
        <h1>Social Register</h1>
    </div>
@stop

@section('content')
    <p class="lead">Please enter your details:</p>
    <div class="well">
        {!! Form::open(array('url' => URL::to('account/social-register'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

        <input type="hidden" name="avatar" value="{{ $avatar }}" />
        <input type="hidden" name="provider_id" value="{{ $provider_id }}" />
        <input type="hidden" name="provider" value="{{ $provider }}" />

        <div class="form-group{!! ($errors->has('first_name')) ? ' has-error' : '' !!}">
            <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="first_name">First Name</label>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10">
                <input name="first_name" id="first_name" value="{{ $first_name }}" type="text" class="form-control" placeholder="First Name">
                {!! ($errors->has('first_name') ? $errors->first('first_name') : '') !!}
            </div>
        </div>

        <div class="form-group{!! ($errors->has('last_name')) ? ' has-error' : '' !!}">
            <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="last_name">Last Name</label>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10">
                <input name="last_name" id="last_name" value="{{ $last_name }}" type="text" class="form-control" placeholder="Last Name">
                {!! ($errors->has('last_name') ? $errors->first('last_name') : '') !!}
            </div>
        </div>

        <div class="form-group{!! ($errors->has('email')) ? ' has-error' : '' !!}">
            <label class="col-md-2 col-sm-3 col-xs-10 control-label" for="email">Email</label>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10">
                <input name="email" id="email" value="{{ $email }}" type="text" class="form-control" placeholder="Email">
                {!! ($errors->has('email') ? $errors->first('email') : '') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 col-xs-12">
                <button class="btn btn-primary" type="submit"><i class="fa fa-rocket"></i> Register</button>
                <button class="btn btn-inverse" type="reset">Reset</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop