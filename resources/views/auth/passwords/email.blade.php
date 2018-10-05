@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
            <h3> FORGET YOUR PASSWORD?</h3>
            <hr class="soft"/>
            <div class="row">
                <div class="span3"></div>
                <div class="span6" style="min-height:900px">
                <div class="well">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!!  session('status')  !!}
                        </div>
                    @endif
                    <h5>Reset your password</h5>
                    <br/>
                    Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.<br/><br/><br/>
                    <form method="POST" action="{!!  route('password.email')  !!}">
                        {!!  csrf_field()  !!}
                        <div class="control-group{!!  $errors->has('email') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="email">E-mail address</label>
                            <div class="controls">
                            <input class="span5"  type="email" id="email" type="email" name="email" value="{!!  old('email')  !!}" required placeholder="Email">
                            </div>
                        </div>
                        <div class="controls">
                            <button type="submit" class="btn block">Submit</button>
                        
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
