@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!!  session('success')  !!}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {!!  session('message')  !!}
                        </div>
                    @endif
                    <div class="row">
                        <div class="form-horizontal">
                            <div class="col-sm-6 col-md-4">
                               <CENTER>
                            <h3>Sorry, Transaction data is mismatch.</h3>
                                </CENTER> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection