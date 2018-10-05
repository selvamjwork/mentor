@extends('admin.layout.home')

@section('content')
@section('navbar')<a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><i class="icon-chevron-right"></i><a class="current" href="/admin/addproduct">All Products</a>@endsection
@section('topcontent')List of Products @endsection
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>All Product</h5> 
        <span class="label label-info"><a style="color: #fff" href="{{ url('/admin/addproduct/create') }}"><i class="icon-plus">Add Product</i></a></span>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Status</th>
                    <th>Product Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $pro)
                <tr class="gradeX">
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->p_name}}</td>
                    <td>{{$pro->p_price}}</td>
                    @if($pro->is_deleted == 'no')
                    <td>Active</td>
                    @else
                    <td>In Active</td>
                    @endif
                    <td><img height="10" width="50" src="/uploads/product_logo/{{$pro->p_logo}}"></td>
                    <td>
                        <a href="{{ url('/admin/addproduct/' . $pro->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Product"><span class="icon-pencil" aria-hidden="true"/></a>
                        {!! Form::open(['method'=>'DELETE','url' => ['/admin/addproduct', $pro->id],'id' => '1','style' => 'display:inline']) !!}
                            @if($pro->is_deleted == 'no')
                            {!! Form::button('<span class="icon-trash" aria-hidden="true" title="Deactivate Product" />', array('type' => 'submit','class' => 'btn btn-danger btn-xs','title' => 'Delete Product','onclick'=>'return confirm("Confirm Deactivate?")')) !!}
                            @else
                            {!! Form::button('<span class="icon-check" aria-hidden="true" title="Activate Product" />', array('type' => 'submit','class' => 'btn btn-success btn-xs','title' => 'Active Product')) !!}
                            @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination alternate"> {!! $product->render() !!} </div>
</div>
@endsection