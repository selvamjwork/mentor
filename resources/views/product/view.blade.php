@extends('layouts.app')

@section('content')
<br>
<div class="row">
    <div id="gallery" class="span4">
        <a href="/uploads/product_logo/{!! $add->p_logo !!}" title="{!! $add->p_name !!}">
            <img src="/uploads/product_logo/{!! $add->p_logo !!}" style="width:100%" alt="{!! $add->p_name !!}"/>
        </a>
    </div>
    <div class="span8">
    <h3>{!! $add->p_name !!}</h3>
    <small>- {!! $add->p_name !!}</small>
    <hr class="soft"/>
    <form method="POST" action="https://test.payu.in/_payment" class="form-horizontal qtyFrm">
    {!! csrf_field() !!}
        <div class="control-group">
            <label class="control-label"><span>Rs:{!! $add->p_price !!}/-</span></label>
            <div class="controls">
                <input type="hidden" name="firstname" value="{!! Auth::user()->name !!}" />
                <input type="hidden" name="lastname" value="{!! $add->id !!}" />
                <input type="hidden" name="phone" value="{!! Auth::user()->mobile !!}" />
                <input type="hidden" name="key" value="{!! $KEY !!}" />
                <input type="hidden" name="hash" value ="{!! $hash !!}" />
                <input type="hidden" name="surl" value="http://localhost:8000/response" />
                <input type="hidden" name="curl" value="http://localhost:8000/response" />
                <input type="hidden" name="furl" value="http://localhost:8000/response" />
                <input type="hidden" name="txnid" value="{!! $txnid !!}" />
                <input type="hidden" name="productinfo" value="{!! $add->p_discription !!}" />
                <input type="hidden" name="amount" value="{!! $add->p_price !!}" />
                <input type="hidden" name="email" value="{!! Auth::user()->email !!}" />
                <button type="submit" class="btn btn-large btn-primary pull-right">Buy Now</button>
            </div>
        </div>
    </form>
    <hr class="soft"/>
    
    <p>{!! $add->p_d_discription !!}</p>
    <a class="btn btn-small pull-right" href="#detail">More Details</a>
    <br class="clr"/>
    <a href="#" name="detail"></a>
    <hr class="soft"/>
    </div>
    <div class="span12">
    <ul id="productDetail" class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">More Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <h5>Discription</h5>
            <p>{!! $add->p_d_discription !!}</p>
        </div>
    </div>
    </div>
</div>
@endsection