<header>
    <div class="headerarea headerarea__3 header__sticky header__area">
        <div class="container desktop__menu__wrapper">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">

                            <a href="about.html"><img loading="lazy"  src="{{ asset('img/logo/logo_1.png') }}" alt="logo"></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                    <div class="headerarea__main__menu" style="display: flex; justify-content: space-between; align-items: center;">
                        <nav>
                            <ul style="display: flex; flex-wrap: nowrap; justify-content: space-between; width: 110%;">
                                <li class="mega__menu position-static">
                                    <a href="/">Beranda</a>
                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="/mentoring">Yuk! Mentoring </a>
                                </li>
                                <li>
                                    <a class="headerarea__has__dropdown" href="/review-ai">Yuk! Direview AI</a>

                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="#">Yuk! Uji Tampil<i class="icofont-rounded-down"></i> </a>
                                    <div class="headerarea__submenu mega__menu__wrapper">

                                        <div class="row">
                                            
                                            <div class="col-3 mega__menu__single__wrap">
                                                <h4 class="mega__menu__title"><a href="#">Pilihan </a></h4>
                                                <ul class="mega__menu__item">
                                                    
                                                    <li><a href="/uji-tampil/buat-uji-tampil">Buat Jadwal Uji Tampil</a></li>
                                                    <li><a href="/uji-tampil/jadwal-uji-tampil">Jadwal Uji Tampil</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <a class="headerarea__has__dropdown" href="/course/daftar-course">Yuk Belajar</a>

                                </li>
                                <li>
                                    <a class="headerarea__has__dropdown" href="/lacak-kemajuan">Lacak Kemajuan</a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">
                        <div class="headerarea__login">
                           @auth
                            <li>
                            <i class="icofont-star" style="color: #ffcf00; font-size: 20px">{{ auth()->user()->point }}</i>
                            </li>
                           @endauth
                        </div>      
                        @auth 
                        <div class="headerarea__login">
                            <li>
                                @if (auth()->user()->is_admin == 0)
                                    <a class="headerarea__has__dropdown" href="/dashboard" >
                                        <i class="icofont-user-alt-5">
                                        </i>
                                    </a>
                                @else
                                    <a class="headerarea__has__dropdown" href="/instructor/dashboard" >
                                        <i class="icofont-user-alt-5">
                                        </i>
                                    </a>
                                @endif
                            </li>
                        </div>                            
                        @endauth
                        @guest
                        <div class="headerarea__button">
                            <a href="/login">Login</a>
                        </div>
                    @endguest
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header section end -->