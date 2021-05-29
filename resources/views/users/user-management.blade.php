@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title font-weight-bold">Users</h4>
                        <p class="card-category font-weight-bold"> Here you can manage users</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        </div>
                        <div class="table-responsive">
                            <table class="table font-weight-bold">
                                <thead class=" text-primary">
                                <tr>
                                    <th class="font-weight-bold">Ser.No</th>
                                    <th class="font-weight-bold">Phone Number</th>
                                    <th class="font-weight-bold">Country</th>
                                    <th class="font-weight-bold">Creation date</th>
                                </tr></thead>
                                <tbody>
                                @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->contact}}</td>
                                        <td>{{$user->country}}</td>
                                        <td>{{$user->created_at}}</td>
{{--                                        <td class="td-actions text-right">--}}
{{--                                            <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title="">--}}
{{--                                                <i class="material-icons">edit</i>--}}
{{--                                                <div class="ripple-container"></div>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <span class="pull-right">{{ $users->links() }}</span>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
