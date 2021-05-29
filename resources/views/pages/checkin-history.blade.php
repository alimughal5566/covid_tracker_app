@extends('layouts.app', ['activePage' => 'checkin', 'titlePage' => __('Checkin History')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title font-weight-bold">Checkin Table</h4>
                            <p class="card-category font-weight-bold">User Checkin History Table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table font-weight-bold" >
                                    <thead class="text-primary font-weight-bold">
                                    <th class="font-weight-bold">Sr.No</th>
                                    <th class="font-weight-bold">User Phone</th>
                                    <th class="font-weight-bold">N/S</th>
                                    <th class="font-weight-bold">Age range</th>
                                    <th class="font-weight-bold">Gender</th>
                                    <th class="font-weight-bold">country</th>
{{--                                    <th>Covid Status</th>--}}
                                    <th class="font-weight-bold">Date</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        ?>
                                    @foreach($data as $key=>$datum)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$datum->user->contact}}</td>
                                        <td>{{$datum->no_sym}}</td>
                                        <td>{{$datum->age_range}}</td>
                                        <td>{{$datum->gender}}</td>
                                        <td>{{$datum->country}}</td>
{{--                                        <td>{{ ($datum->is_covid == 0)?'Negative':'Positive'}}</td>--}}
                                        <td>{{$datum->date}}</td>
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
