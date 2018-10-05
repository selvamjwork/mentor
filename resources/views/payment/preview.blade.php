@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Products Preview</div>

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
                                
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <!--  -->
                                <a href="/payment-preview" class="btn btn-success pull-right">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection