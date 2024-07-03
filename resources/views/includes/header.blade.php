<header>
    <div class="main-header">
        <div class="menu-Bar">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="hdr-logo-area">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{asset('assets/images/logo.png')}}" alt="">
            </a>
            <a href="{{ route('add_new_property') }}" class="new-btn">+ Create New</a>
        </div>
        <div class="menuWrap">
            <ul class="menu m1">
                <li class="active"><a href="{{ route('home') }}"><img src="{{asset('assets/images/i1.png')}}" alt="" srcset="">Overview</a>
                </li>
                <li class="dropdown">
                    <a href="#"><img src="{{asset('assets/images/i2.png')}}" alt="" srcset="">Map</a>
                    <ul class="dropdown-list">
                        <li><a href="{{ route('map') }}">Map</a></li>
                        <li><a href="{{ route('calender') }}">Calendar</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><img src="{{asset('assets/images/i3.png')}}" alt="" srcset="">Rentals</a>
                    <ul class="dropdown-list">
                        <li><a href="{{ route('properties') }}">Properties</a></li>
                        <li><a href="{{ route('units') }}">Units</a></li>
                    </ul>
                </li>
                <li><a href="{{route('leases')}}"><img src="{{asset('assets/images/i4.png')}}" alt="" srcset="">Leasing</a></li>
                <li class="dropdown">
                    <a href="#"><img src="{{asset('assets/images/i5.png')}}" alt="" srcset="">People</a>
                    <ul class="dropdown-list">
                        <li><a href="{{ route('tenants') }}">Tenants</a></li>
                        <li><a href="{{ route('owners') }}">Owners</a></li>
                    </ul>
                </li>
                <li><a href="{{route('task_maintenance')}}"><img src="{{asset('assets/images/i6.png')}}" alt="" srcset="">Tasks & Maintenance</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i7.png')}}" alt="" srcset="">Accounting</a></li>
                {{-- <li><a href="#"><img src="{{asset('assets/images/i8.png')}}" alt="" srcset="">Communications</a></li> --}}
                <li><a href="{{route('notes')}}"><img src="{{asset('assets/images/i9.png')}}" alt="" srcset="">Notes</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i10.png')}}" alt="" srcset="">Files</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i11.png')}}" alt="" srcset="">Reports</a></li>
            </ul>
            {{-- <ul class="menu m2">
                <li><a href="#"><img src="{{asset('assets/images/i12.png')}}" alt="" srcset="">Notifications</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i13.png')}}" alt="" srcset="">Get Started</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i14.png')}}" alt="" srcset="">Help</a></li>
                <li><a href="#"><img src="{{asset('assets/images/i15.png')}}" alt="" srcset="">Settings</a></li>
                <li><a href="#"><img src="{{asset('assets/images/user1.png')}}" alt="" srcset="">Parth S Bhatt</a></li>
            </ul> --}}
        </div>
    </div>
</header>
{{-- /laravel-filemanager --}}