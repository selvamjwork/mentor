@extends('layouts.app')

@section('content')

<h4>Latest Products </h4>
<ul class="thumbnails">
    @foreach($add as $ad)
        <li class="span3">
            <div class="thumbnail">
                <a  href="/products/{!! $ad->id !!}"><img style="height:200px" src="/uploads/product_logo/{!! $ad->p_logo !!}" alt=""/></a>
                <div class="caption">
                    <h5>{!! $ad->p_name !!}</h5>
                    <p> {!! $ad->p_discription !!}</p>
                    <h4 style="text-align:center"><a class="btn" href="/products/{!! $ad->id !!}"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="/products/{!! $ad->id !!}">Rs:{!! $ad->p_price !!}/-</a></h4>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<div class="pagination">{!! $add->links() !!}</div>
@endsection