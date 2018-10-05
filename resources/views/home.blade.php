@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="span12" id="mainCol">
            <h3> Home Page</h3>
            <hr class="soft"/>
            <br/>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <p>Payment will be hear</p>
    </div>
</div>
@endsection