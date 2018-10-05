@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
            <h3> Login</h3>
            <hr class="soft"/>
            <div class="row">
                <div class="span4"> &nbsp;</div>
                <div class="span4">
                    <div class="well">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!!  session('status')  !!}
                        </div>
                    @endif
                        <h5>ALREADY REGISTERED ?</h5>
                        <form method="POST" action="{!!  route('login')  !!}">
                            {!!  csrf_field()  !!}
                            <div class="control-group{!!  $errors->has('email') ? ' has-error' : ''  !!}">
                                <label class="control-label" for="email">Email</label>
                                <div class="controls">
                                    <input class="span3" name="email" value="{!!  old('email')  !!}" required autofocus  type="email" id="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{!!  $errors->first('email')  !!}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{!!  $errors->has('password') ? ' has-error' : ''  !!}">
                                <label class="control-label" for="password">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" required class="span3"  id="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{!!  $errors->first('password')  !!}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">Sign in</button> <a href="{!!  route('password.request')  !!}">Forget password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
