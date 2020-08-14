<div id="mySidenav">
    <ul class="nav flex-column">
        <li class="nav-item ">
            <a class="nav-link nav-link" href="{{url('/home')}}">
                <span data-feather="home"></span>
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('ImprestController@create')}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                Apply Imprest
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/retirement/create')}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1H2a2 2 0 0 1 2-2z"/>
                    <path d="M2 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2z"/>
                    <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l1.646 1.647a.5.5 0 0 0 .708-.708l-2.5-2.5a.5.5 0 0 0-.708 0l-2.5 2.5a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
                Retire Imprest
            </a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" href="{{url('/uirrm')}}">
                <i class="fa fa-history" aria-hidden="true"></i>
                My History
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-comments" aria-hidden="true"></i>
                My Comments
            </a>
        </li>

        @role('admin')

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/designation') }}">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                Designation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/department') }}">
                <i class="fa fa-building" aria-hidden="true"></i>
                Department</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/register ') }}">
                <span class="fa fa-user-plus" aria-hidden="true"></span>
                Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/salary ') }}">
                <i class="fa fa-money" aria-hidden="true"></i>
                Salary Grades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/rolesAndPermission')}}">
                <i class="fa fa-tags" aria-hidden="true"></i>
                Roles & Permission</a>
        </li>
        @endrole
    </ul>
</div>
