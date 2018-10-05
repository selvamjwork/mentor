@extends('admin.layout.home')

@section('content')
@section('navbar')<a href="/admin/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><i class="icon-chevron-right"></i><a class="current" href="/admin/users">All Users</a>@endsection
@section('topcontent')List of Users @endsection
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>All Users</h5> 
        <!-- <span class="label label-info"><a style="color: #fff" href="{{ url('/admin/users/create') }}"><i class="icon-plus">Add Product</i></a></span> -->
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Payment Complited</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="gradeX">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    @if($user->payment_complited == 0)<td>No</td>@else<td>Yes</td>@endif
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination alternate"> {!! $users->render() !!} </div>
</div>
@endsection