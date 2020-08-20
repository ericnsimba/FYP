@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin: 0px;padding:0px;height:100%">
    <div class="row" style="padding: 0px;margin:0px;height:100%">
        <nav id="mySideNav"  style="padding-left:0px"class="col-md-2 ">
           @include('sidebar')

        </nav>

        <div class="col-md-10">

             <main id="dn" class="row" >
                 <div id="dashboard"  class="col-md-8">
                      <!-- Chart's container -->
    {{--<div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js">
    </script>
    <!-- Your application script -->
   <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@charts('sample_chart')",

      });
    </script> --}}
                       @yield('progress')
                        @yield('dashboard')

                        @includeWhen($boolean ?? '' , 'imprest')
                    </div>
                 <div id="userNotifications" class="col-md-4">
                    @include('user-notifications')
                 </div>
             </main>
        </div>
    </div>
</div>
@endsection
