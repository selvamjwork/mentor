@extends('admin.layout.home')

@section('content')
@section('navbar')<a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><i class="icon-chevron-right"></i><a href="/admin/addproduct">All Products</a><i class="icon-chevron-right"></i><a class="current" href="/admin/addproduct/{{$add->id}}/edit">Edit Product</a>@endsection
@section('topcontent')Edit Product @endsection
<div class="row-fluid">
  <div class="span6">
    <div class="widget-box">
        {!! Form::model($add, ['method' => 'PATCH','url' => ['/admin/addproduct', $add->id],'class' => 'form-horizontal','files' => true]) !!}

            <div class="control-group {{ $errors->has('p_name') ? 'has-error' : ''}}">
                {!! Form::label('p_name', 'Product Name', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('p_name', null, ['class' => 'span6']) !!}
                    {!! $errors->first('p_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="control-group {{ $errors->has('p_discription') ? 'has-error' : ''}}">
                {!! Form::label('p_discription', 'Product Description', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('p_discription', null, ['class' => 'span6']) !!}
                    {!! $errors->first('p_discription', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="control-group {{ $errors->has('p_d_discription') ? 'has-error' : ''}}">
                {!! Form::label('p_d_discription', 'Product Detailed Description', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::text('p_d_discription', null, ['class' => 'span6']) !!}
                    {!! $errors->first('p_d_discription', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="control-group {{ $errors->has('p_price') ? 'has-error' : ''}}">
                {!! Form::label('p_price', 'Product Price', ['class' => 'control-label']) !!}
                <div class="controls">
                    <div class="input-append">
                        {!! Form::text('p_price', null, ['class' => 'span12']) !!}<span class="add-on">$</span>
                        {!! $errors->first('p_price', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="control-group {{ $errors->has('p_logo') ? 'has-error' : ''}}">
                {!! Form::label('p_logo', 'Product Logo', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::file('p_logo', null, ['class' => 'span8']) !!}
                    {!! $errors->first('p_logo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}          
    </div>
  </div>
</div>
@endsection