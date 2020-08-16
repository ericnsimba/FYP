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
