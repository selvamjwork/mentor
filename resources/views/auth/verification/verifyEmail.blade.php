@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!!  session('status')  !!}
                        </div>
                    @endif
                    Please Verify Inorder to procedure Futhur. <a href="/resendEmailToken">Resend Email Verification Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection