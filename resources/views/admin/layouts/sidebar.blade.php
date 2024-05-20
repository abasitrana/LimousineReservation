<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Pages</li>
                <li>
                    <a href="#"><i class="fas fa-ellipsis-v"></i> Cars <i class="fas fa-angle-down"></i></a>
                    <ul>
                        <li>
                            <a href="{{ url('admin/cars') }}"> <i class="metismenu-icon"> </i>View Cars </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/addcars') }}"> <i class="metismenu-icon"> </i>Add Car </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-ellipsis-v"></i> Zone <i class="fas fa-angle-down"></i></a>
                    <ul>
                        <li>
                            <a href="{{ url('admin/zone') }}"> <i class="metismenu-icon"> </i>View Zone </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/addzone') }}"> <i class="metismenu-icon"> </i>Add Zone </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/fare') }}"> <i class="metismenu-icon"> </i>View Round Trip Fare </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/addfare') }}"> <i class="metismenu-icon"> </i>Add Round Trip Fare
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- <li>
                  <a href="#"><i class="fas fa-ellipsis-v"></i> Fare <i class="fas fa-angle-down"></i></a>
                  <ul>
                    <li>
                        <a href="{{url('admin/fare')}}"> <i class="metismenu-icon"> </i>View Fare </a>
                    </li>
                      <li>
                          <a href="{{url('admin/addfare')}}"> <i class="metismenu-icon"> </i>Add Fare </a>
                      </li>
                  </ul>
              </li> --}}
                <li>
                    <a href="#"><i class="fas fa-ellipsis-v"></i> Hourly Packages <i
                            class="fas fa-angle-down"></i></a>
                    <ul>
                        <li>
                            <a href="{{ url('admin/hourly') }}"> <i class="metismenu-icon"> </i>View Hourly Packages
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/addhourly') }}"> <i class="metismenu-icon"> </i>Add Hourly Package
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                  <a href="#"><i class="fas fa-ellipsis-v"></i> Hourly Slabs <i class="fas fa-angle-down"></i></a>
                  <ul>
                      <li>
                          <a href="{{url('admin/hourlyslab')}}"> <i class="metismenu-icon"> </i>View Hourly Slabs </a>
                      </li>
                      <li>
                          <a href="{{url('admin/addhourlyslab')}}"> <i class="metismenu-icon"> </i>Add Hourly Slab </a>
                      </li>
                  </ul>
              </li> --}}
                <li>
                    <a href="#"><i class="fas fa-ellipsis-v"></i> Bookings <i class="fas fa-angle-down"></i></a>
                    <ul>
                        <li>
                            <a href="{{ url('admin/bookings') }}"> <i class="metismenu-icon"> </i>View Bookings </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/addbookings') }}"> <i class="metismenu-icon"> </i>Add Booking </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/contact-forms') }}"><i class="fas fa-ellipsis-v"></i> Contact Form
                        Submissions <i class="fas fa-angle-down"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
