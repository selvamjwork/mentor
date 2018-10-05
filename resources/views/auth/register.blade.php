@extends('layouts.app')

@section('content')
<h3> Registration</h3>
<div class="container">
    <div class="row">            
            <form class="form-horizontal" method="POST" action="{!!  route('register')  !!}">
            {!!  csrf_field()  !!}
                <div class="span6">
                    <div class="well">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!!  session('status')  !!}
                        </div>
                    @endif
                        <h4>Your personal information</h4>
                        <div class="control-group{!!  $errors->has('name') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="name">Name <sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="name" id="name" value="{!!  old('name')  !!}" required autofocus placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('name')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('email') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="email">Email <sup>*</sup></label>
                            <div class="controls">
                                <input type="email" name="email" id="email" value="{!!  old('email')  !!}" required autofocus placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('email')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('mobile') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="mobile">Mobile <sup>*</sup></label>
                            <div class="controls">
                                <input type="number" digits="10" name="mobile" id="mobile" value="{!!  old('mobile')  !!}" required autofocus placeholder="Mobile"/> 
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('mobile')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('password') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="password">Password <sup>*</sup></label>
                            <div class="controls">
                                <input type="password" name="password" id="password" value="{!!  old('password')  !!}" required autofocus placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('password')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password_confirmation">Confirm Password <sup>*</sup></label>
                            <div class="controls">
                                <input type="password" name="password_confirmation" id="password_confirmation" required autofocus placeholder="Confirm Password">                                
                            </div>
                        </div>
                        <br><br><br>
                    </div>
                </div>
                <div class="span6">
                    <div class="well">
                        <h4>Your address</h4>
                        <div class="control-group{!!  $errors->has('address1') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="address1">Address (Line 1)<sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="address1" id="address1" value="{!!  old('address1')  !!}" required autofocus placeholder="Address Line 1"/> 
                                @if ($errors->has('address1'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('address1')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('address2') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="address2" id="address2" value="{!!  old('address2')  !!}" required autofocus placeholder="Address line 2"/> 
                                @if ($errors->has('address2'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('address2')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('city') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="city">City<sup>*</sup></label>
                            <div class="controls">
                                <input type="text" name="city" id="city" value="{!!  old('city')  !!}" required autofocus placeholder="city"/> 
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('city')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('pincode') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="pincode">Pincode<sup>*</sup></label>
                            <div class="controls">
                                <input type="number" size="6" name="pincode" id="pincode" value="{!!  old('pincode')  !!}" required autofocus placeholder="Pincode"/> 
                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('pincode')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('gst') ? ' has-error' : ''  !!}">
                            <label class="control-label" for="gst">GST Number </label>
                            <div class="controls">
                                <input type="text" maxlength="15" name="gst" id="gst" value="{!!  old('gst')  !!}" autofocus placeholder="GST Number"/> 
                                @if ($errors->has('gst'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('gst')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{!!  $errors->has('gst') ? ' has-error' : ''  !!}">
                            <div class="controls">
                            <label class="checkbox" for="gst"><input type="checkbox" autofocus required placeholder="GST Number"/> I Agree to the <a href="/terms"> Terms and Conditions</a> </label> 
                                @if ($errors->has('gst'))
                                    <span class="help-block">
                                        <strong>{!!  $errors->first('gst')  !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input class="btn btn-large btn-success" type="submit" value="Register" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
