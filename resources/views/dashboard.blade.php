@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
                <?php $user_count=\App\User::all()->count() ?>
                <p class="card-category font-weight-bold">Total Users</p>
              <h2 class="card-title font-weight-bold">{{$user_count}}
{{--                <small>GB</small>--}}
              </h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">local_offer</i>
                <a href="{{url('user')}}">List Of Users...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category font-weight-bold">Total Places</p>
                <?php $place_count= \App\Models\QRScan::all()->count() ?>
              <h2 class="card-title font-weight-bold">{{$place_count}}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">local_offer</i><a href="{{route('get.location')}}">See Locations....</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category font-weight-bold">Total Checkins</p>
                <?php $checkin_count=\App\Models\CheckIn::all()->count() ?>
              <h2 class="card-title font-weight-bold">{{$checkin_count}}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> <a href="{{route('checkin.history')}}">see Checkins...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
{{--        Graphs--}}
{{--      <div class="row">--}}
{{--        <div class="col-md-4">--}}
{{--          <div class="card card-chart">--}}
{{--            <div class="card-header card-header-success">--}}
{{--              <div class="ct-chart" id="dailySalesChart"></div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--              <h4 class="card-title">Daily Sales</h4>--}}
{{--              <p class="card-category">--}}
{{--                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>--}}
{{--            </div>--}}
{{--            <div class="card-footer">--}}
{{--              <div class="stats">--}}
{{--                <i class="material-icons">access_time</i> updated 4 minutes ago--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--          <div class="card card-chart">--}}
{{--            <div class="card-header card-header-warning">--}}
{{--              <div class="ct-chart" id="websiteViewsChart"></div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--              <h4 class="card-title">Email Subscriptions</h4>--}}
{{--              <p class="card-category">Last Campaign Performance</p>--}}
{{--            </div>--}}
{{--            <div class="card-footer">--}}
{{--              <div class="stats">--}}
{{--                <i class="material-icons">access_time</i> campaign sent 2 days ago--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--          <div class="card card-chart">--}}
{{--            <div class="card-header card-header-danger">--}}
{{--              <div class="ct-chart" id="completedTasksChart"></div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--              <h4 class="card-title">Completed Tasks</h4>--}}
{{--              <p class="card-category">Last Campaign Performance</p>--}}
{{--            </div>--}}
{{--            <div class="card-footer">--}}
{{--              <div class="stats">--}}
{{--                <i class="material-icons">access_time</i> campaign sent 2 days ago--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--        graphs--}}

        <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h3 class="card-title font-weight-bold">Latest Checkins</h3>
              <h4 class="card-category font-weight-bold">Last Refresh {{now()}}</h4>
            </div>
            <div class="card-body table-responsive">
<?php $checkins=\App\Models\CheckIn::orderBy('id', 'desc')->paginate(5); ?>
              <table class="table table-hover">
                <thead class="text-warning ">
                  <th class="font-weight-bold">ID</th>
                  <th class="font-weight-bold">Phone</th>
                  <th class="font-weight-bold">N/S</th>
                  <th class="font-weight-bold">Country</th>
{{--                  <th class="font-weight-bold">Date</th>--}}
                </thead>
                <tbody>
                @foreach($checkins as $checkin)
                  <tr>
                    <td>{{$checkin->id}}</td>
                    <td>{{$checkin->user->contact}}</td>
                    <td>{{$checkin->no_sym}}</td>
                    <td>{{$checkin->country}}</td>
{{--                    <td>{{$checkin->date}}</td>--}}
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
              <span class="pull-right">{{ $checkins->links() }}</span>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h3 class="card-title font-weight-bold">Lastest Added Location</h3>
                        <h4 class="card-category font-weight-bold">Last Refresh {{now()}}</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <?php $locations=\App\Models\QRScan::orderBy('id', 'desc')->paginate(5); ?>
                        <table class="table table-hover">
                            <thead class="text-success ">
                            <th class="font-weight-bold">ID</th>
                            <th class="font-weight-bold">Location ID</th>
                            <th class="font-weight-bold">Date Time</th>
{{--                            <th>Country</th>--}}
                            </thead>
                            <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td>{{$location->id}}</td>
                                <td>{{$location->scan_id}}</td>
                                <td>{{$location->created_at}}</td>
{{--                                <td>Niger</td>--}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="pull-right">{{ $locations->links() }}</span>

                </div>
            </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
