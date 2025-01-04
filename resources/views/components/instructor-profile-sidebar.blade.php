<div class="dashboardarea sp_bottom_100">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboardarea__wraper">
                    <div class="dashboardarea__img">
                        <div class="dashboardarea__inner">
                            <div class="dashboardarea__left">
                                <div class="dashboardarea__left__img">
                                    <img loading="lazy"  src="../img/dashbord/dashbord__2.jpg" alt="">
                                </div>
                                <div class="dashboardarea__left__content">
                                    <h5>Hello</h5>
                                    <h4>{{ auth()->user()->fullname }}</h4>
                                </div>
                            </div>
                            <div class="dashboardarea__right">
                                <div class="dashboardarea__right__button">
                                    <a class="default__button" href="/instructor/buat-course">Create a New Course
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard">
        <div class="container-fluid full__width__padding">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="dashboard__inner">
                        <div class="dashboard__nav__title">
                            <h6>{{ auth()->user()->fullname }}</h6>
                        </div>
                        <div class="dashboard__nav">
                            <ul>
                                <li>
                                    <a href="/instructor/dashboard" class="{{ request()->is('instructor/dashboard') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a href="/instructor/profile" class="{{ request()->is('instructor/profile') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        My Profile</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dashboard__nav__title mt-40">
                            <h6>Instructor</h6>
                        </div>
                        <div class="dashboard__nav">
                            <ul>
                                <li>
                                    <a href="/instructor/course" class="{{ request()->is('instructor/course') ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                        My Course</a>
                                </li>
                                <li>
                                    <a class="{{ request()->is('instructor/validasi-uji-tampil') ? 'active' : '' }}" href="/instructor/validasi-uji-tampil">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-help-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                        </svg>
                                        Quiz Attempts</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="dashboard__nav__title mt-40">
                            <h6>user</h6>
                        </div>

                        <div class="dashboard__nav">
                                <li>
                                    <a href="/login">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-1"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                                        Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>