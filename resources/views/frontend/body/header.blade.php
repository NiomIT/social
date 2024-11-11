<nav id="navbar-main" class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="w-100 justify-content-md-center">
        <ul class="nav navbar-nav enable-mobile px-2">
            <li class="nav-item">
                <button type="button" class="btn nav-link p-0"><img
                        src="{{ 'frontend' }}/assets/images/icons/theme/post-image.png" class="f-nav-icon"
                        alt="Quick make post"></button>
            </li>
            <li class="nav-item w-100 py-2">
                <form class="d-inline form-inline w-100 px-4">
                    <div class="input-group">
                        <input type="text" class="form-control search-input"
                            placeholder="Search for people, companies, events and more..." aria-label="Search"
                            aria-describedby="search-addon">
                        <div class="input-group-append">
                            <button class="btn search-button" type="button"><i class='bx bx-search'></i></button>
                        </div>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a href="messages.html" class="nav-link nav-icon nav-links message-drop drop-w-tooltip"
                    data-placement="bottom" data-title="Messages">
                    <img src="{{ 'frontend' }}/assets/images/icons/navbar/message.png"
                        class="message-dropdown f-nav-icon" alt="navbar icon">
                </a>
            </li>
        </ul>
        <ul class="navbar-nav mr-5 flex-row" id="main_menu">
            <a class="navbar-brand nav-item mr-lg-5" href="/"><img
                    src="{{ 'frontend' }}/assets/images/logo-64x64.png" width="40" height="40" class="mr-3"
                    alt="Logo"></a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <form class="w-30 mx-2 my-auto d-inline form-inline mr-5 dropdown search-form">
                <div class="input-group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    id="searchDropdown">
                    <input type="text" class="form-control search-input w-75"
                        placeholder="Search for people, companies, events and more..." aria-label="Search"
                        aria-describedby="search-addon">
                    <div class="input-group-append">
                        <button class="btn search-button" type="button"><i class='bx bx-search'></i></button>
                    </div>
                </div>
                <ul class="dropdown-menu notify-drop nav-drop shadow-sm" aria-labelledby="searchDropdown">
                    <div class="notify-drop-title">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 fs-8">Search Results <span
                                    class="badge badge-pill badge-primary ml-2">29</span></div>
                        </div>
                    </div>
                    <!-- end notify title -->
                    <!-- notify content -->
                    <div class="drop-content">
                        <h6 class="dropdown-header">Peoples</h6>
                        <li class="dropdown-item">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="notify-img">
                                    <img src="{{ 'frontend' }}/assets/images/users/user-6.png" alt="Search result">
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <a href="#" class="notification-user">Susan P. Jarvis</a>
                                <a href="#"
                                    class="btn btn-quick-link join-group-btn border text-right float-right">
                                    Add Friend
                                </a>
                                <p class="time">6 Mutual friends</p>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="notify-img">
                                    <img src="{{ 'frontend' }}/assets/images/users/user-5.png" alt="Search result">
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <a href="#" class="notification-user">Ruth D. Greene</a>
                                <a href="#"
                                    class="btn btn-quick-link join-group-btn border text-right float-right">
                                    Add Friend
                                </a>
                            </div>
                        </li>
                        <h6 class="dropdown-header">Groups</h6>
                        <li class="dropdown-item">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="notify-img">
                                    <img src="{{ 'frontend' }}/assets/images/groups/group-2.jpg" alt="Search result">
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <a href="#" class="notification-user">Tourism</a>
                                <a href="#"
                                    class="btn btn-quick-link join-group-btn border text-right float-right">
                                    Join
                                </a>
                                <p class="time">2.5k Members 35+ post a week</p>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="notify-img">
                                    <img src="{{ 'frontend' }}/assets/images/groups/group-1.png" alt="Search result">
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <a href="#" class="notification-user">Argon Social Network <img
                                        src="{{ 'frontend' }}/assets/images/theme/verify.png" width="10px"
                                        class="verify" alt="Group verified"></a>
                                <a href="#"
                                    class="btn btn-quick-link join-group-btn border text-right float-right">
                                    Join
                                </a>
                                <p class="time">10k Members 20+ post a week</p>
                            </div>
                        </li>
                    </div>
                    <div class="notify-drop-footer text-center">
                        <a href="#">See More</a>
                    </div>
                </ul>
            </form>

            <li class="nav-item s-nav nav-icon dropdown">
                <a href="settings.html" data-toggle="dropdown" data-placement="bottom" data-title="Settings"
                    class="nav-link settings-link rm-drop-mobile drop-w-tooltip" id="settings-dropdown">
                    @if (Auth::check())
                        <img src="{{ asset(Auth::user()->photo) }}" class="nav-settings" alt="navbar icon"
                            style="height:50px;width:50px" alt="User Photo">
                    @else
                        <script>
                            window.location = "{{ url('/login') }}";
                        </script>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right settings-dropdown shadow-sm"
                    aria-labelledby="settings-dropdown">
                    <a class="dropdown-item" href="{{ route('post.add') }}">
                        <i class="fas fa-plus mr-2"></i> Add Post
                    </a>

                    @if (Auth::check())
                        <a class="dropdown-item" href="/{{ Auth::user()->username }}">
                            <i class="fas fa-user mr-2"></i> My Profile
                        </a>
                    @else
                        <script>
                            window.location = "{{ url('/login') }}";
                        </script>
                    @endif


                    <a class="dropdown-item d-flex align-items-center dark-mode" onClick="event.stopPropagation();"
                        href="{{ route('user.change.password') }}">
                        <i class="fas fa-key mr-2"></i> Change Password
                    </a>

                    <a class="dropdown-item d-flex align-items-center dark-mode" onClick="event.stopPropagation();"
                        href="{{ route('user.profile.edit') }}">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>

                    <a class="dropdown-item logout-btn" href="{{ route('user.logout') }}">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                    </a>

                </div>
            </li>
            <button type="button" class="btn nav-link" id="menu-toggle"><img
                    src="{{ 'frontend' }}/assets/images/icons/theme/navs.png" alt="Navbar navs"></button>
        </ul>
    </div>
</nav>
