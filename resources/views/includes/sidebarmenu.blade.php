<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li id="menu-academico">
                <a href="#">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <span>Washing Points</span>
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.create_washing_point') }}">Add</a>
                    </li>
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.manage.car.washpoints') }}">Manage</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.create_booking') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Add Car Wash Booking</span>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li id="menu-academico">
                <a href="#">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                    <span>Car Washing Booking</span>
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.new.bookings') }}">New</a>
                    </li>
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.completedBookings') }}">Completed</a>
                    </li>
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.all.bookings') }}">All</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('enquiries.index') }}">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>Manage Enquiries</span>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li id="menu-academico">
                <a href="#">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <span>Pages</span>
                    <span class="fa fa-angle-right" style="float: right"></span>
                    <div class="clearfix"></div>
                </a>
                <ul id="menu-academico-sub">
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.update-page', ['type' => 'about']) }}">About</a>
                    </li>
                    <li id="menu-academico-avaliacoes">
                        <a href="{{ route('admin.update-page', ['type' => 'contact']) }}">Contact</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
