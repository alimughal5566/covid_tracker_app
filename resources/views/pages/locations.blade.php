@extends('layouts.app', ['activePage' => 'location', 'titlePage' => __('Location')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title  font-weight-bold">Location Table</h4>
                            <p class="card-category font-weight-bold"  >Locations Visited By Users</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table font-weight-bold">
                                    <thead class="text-primary font-weight-bolder">
                                    <th class="font-weight-bold" >Sr.No</th>
                                    <th class="font-weight-bold">Location ID</th>
                                    <th class="font-weight-bold">Location Name</th>
                                    <th class="font-weight-bold">Created_at</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        ?>
                                    @foreach($data as $key=>$datum)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a  href="{{route('user.locations',[$datum->id])}}">{{$datum->scan_id}}</a></td>
                                        <td>{{$datum->location_name}}</td>
                                        <td>{{$datum->created_at}}</td>

                                        <?php
//                                        $key=$key+1;
                                        ?>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <span class="pull-right">{{ $data->links() }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
