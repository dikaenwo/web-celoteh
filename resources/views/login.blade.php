<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>

    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading" style="size: 56px;">Log In</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape__icon__2">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__1" src="img/herobanner/herobanner__1.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__2" src="img/herobanner/herobanner__2.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__3" src="img/herobanner/herobanner__3.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__4" src="img/herobanner/herobanner__5.png" alt="photo">
        </div>
    </div>

    <div class="loginarea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up">
                    <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                        <div class="col-xl-8 col-md-8 offset-md-2">
                            <div class="loginarea__wraper">
                                <div class="login__heading">
                                    <h5 class="login__title">Login</h5>
                                    <p class="login__description">Don't have an account yet? <a href="/register" >Sign up for free</a></p>
                                </div>

                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 {{ session('success') }}
                                </div>
                                @endif

                                @error('login')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <form action="{{ route('login.store') }}" method="POST">
                                    @csrf
                                    <div class="login__form">
                                        <label class="form__label">Username or email</label>
                                        <input class="common__login__input" type="text" name="login" placeholder="Your username or email" required>
                                       
                                    </div>
                                    <div class="login__form">
                                        <label class="form__label">Password</label>
                                        <input class="common__login__input" type="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                        <div class="form__check">
                                            <input id="remember" type="checkbox" name="remember">
                                            <label for="remember"> Remember me</label>
                                        </div>
                                        <div class="text-end login__form__link">
                                            <a href="#">Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="login__button">
                                        <button type="submit" class="default__button">Log In</button>
                                    </div>
                                </form>

                                <div class="login__social__option">
                                    <p>or Log-in with</p>
                                    <ul class="login__social__btn">
                                        <li><a class="default__button login__button__1" href="#"><i class="icofont-facebook"></i> Facebook</a></li>
                                        <li><a class="default__button" href="#"><i class="icofont-google-plus"></i> Google</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                        <div class="col-xl-8 offset-md-2">
                            <div class="loginarea__wraper">
                                <div class="login__heading">
                                    <h5 class="login__title">Sign Up</h5>
                                    <p class="login__description">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Log In</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login__shape__img educationarea__shape_image">
                <img loading="lazy" class="hero__shape hero__shape__1" src="img/education/hero_shape2.png" alt="Shape">
                <img loading="lazy" class="hero__shape hero__shape__2" src="img/education/hero_shape3.png" alt="Shape">
            </div>
        </div>
    </div>
</x-layout>
