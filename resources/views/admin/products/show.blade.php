<!-- @extends('admin.layout.home')

@section('content')
@section('navbar')<a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><i class="icon-chevron-right"></i><a class="current" href="/admin/addproduct">All Products</a><a class="current" href="/admin/addproduct/{{$ad->p_id}}">View Products</a>@endsection
@section('topcontent')View Products @endsection
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
                <tr class="gradeX">
                    <td>{{$ad->p_id}}</td>
                    <td>{{$ad->p_name}}</td>
                    <td>{{$ad->p_price}}</td>
                    @if($ad->is_deleted == 'no')
                    <td>Active</td>
                    @else
                    <td>In Active</td>
                    @endif
                    <td><img height="10" width="50" src="/uploads/product_logo/{{$ad->p_logo}}"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection -->