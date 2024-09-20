<!-- Updated Header with Notification Bell -->
<div class="header-main">
    <div class="logo-w3-agile">
        <h1><a href="{{ route('admin.dashboard') }}">CarLux</a></h1>
    </div>

    <div class="profile_details w3l">
        <ul>
            <!-- Notification Bell Icon -->
            <li class="dropdown">
                <a href="{{ route('enquiries.index') }}" class="dropdown-toggle" aria-expanded="false">
                    <div class="notification-icon">
                        <i class="fa fa-bell"></i>
                        @if($unreadEnquiries > 0)
                            <span class="badge">{{ $unreadEnquiries }}</span>
                        @endif
                    </div>
                </a>
            </li>

            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" aria-expanded="false">
                    <div class="profile_img">    
                        <span class="prfil-img"><img src="{{ asset('assets/images/User-icon.png') }}" alt=""> </span> 
                        <div class="user-name" id="admin-name">
                            <p>Admin</p>
                            <!-- Removed dropdown arrow from here -->
                        </div>    
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <li><a href="{{ route('password.change') }}"><i class="fa fa-lock"></i> Setting</a></li> 
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle click event on the admin name
        document.getElementById('admin-name').addEventListener('click', function (e) {
            e.preventDefault();
            var dropdownMenu = this.closest('.profile_details_drop').querySelector('.dropdown-menu');
            
            // Toggle visibility of the dropdown menu
            dropdownMenu.classList.toggle('show');
        });

        // Hide the dropdown if clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.profile_details_drop')) {
                document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                    menu.classList.remove('show');
                });
            }
        });
    });
</script>
