@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse ">
           @include('sidebar')

        </nav>

        <main role="main" class=" container col-md-6 ml-sm-auto col-lg-9 ">

             <div class="row">
                 <div class="col-md-6 col-xl-8 ">
                        @yield('dashboard')
                 </div>
                 <div id="userNotifications" class="col-md-3 col-xl-4  b">
                    {{-- @include('user-notifications') --}}
                 </div>
             </div>




        </main>
    </div>
</div>
@endsection
