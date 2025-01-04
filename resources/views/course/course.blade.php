<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>
    <!-- theme fixed shadow -->
    <!-- breadcrumbarea__section__start -->

    <div class="breadcrumbarea">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Featured Courses</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li> Featured Course</li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{ asset('img/herobanner/herobanner__1.png') }}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{ asset('img/herobanner/herobanner__2.png') }}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{ asset('img/herobanner/herobanner__3.png') }}" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{ asset('img/herobanner/herobanner__5.png') }}" alt="photo">
        </div>

    </div>
    <!-- breadcrumbarea__section__end-->

    <!-- course__section__start   -->
    <div class="coursearea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="course__text__wraper" data-aos="fade-up">
                        <div class="course__text">
                            <p>Showing 1-12 of 54 Results</p>
                        </div>
                        <div class="course__icon">
                            <ul class="nav property__team__tap" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#" class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one"><i class="icofont-layout"></i>
                                        </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#" class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two"><i class="icofont-listine-dots"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <div class="course__sidebar__wraper" data-aos="fade-up">
                        <div class="course__heading">
                            <h5>Search here</h5>
                        </div>
                        <div class="course__input">
                            <input type="text" placeholder="Search product">
                            <div class="search__button">
                                <button><i class="icofont-search-1"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="course__sidebar__wraper" data-aos="fade-up">
                        <div class="categori__wraper">
                            <div class="course__heading">
                                <h5>Categories</h5>
                            </div>
                            <div class="course__categories__list">
                                <ul>
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#">
                                            {{ $category->name }}
                                            <span>03</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-8 col-12">

                    <div class="tab-content tab__content__wrapper with__sidebar__content" id="myTabContent">


                        <div class="tab-pane fade  active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">

                            <div class="row">
                               @foreach ($courses as $course)
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 col-12" data-aos="fade-up">
                                        <div class="gridarea__wraper gridarea__wraper__2">
                                            <div class="gridarea__img">
                                                <a href="/course-detail/{{ $course->id }}"><img loading="lazy"  src="{{ asset('storage/'.$course->cover) }}" alt="grid"></a>
                                                <div class="gridarea__small__button">
                                                    <div class="grid__badge">{{ $course->category->name }}</div>
                                                </div>
                                                <div class="gridarea__small__icon">
                                                    <a href="#"><i class="icofont-heart-alt"></i></a>
                                                </div>

                                            </div>
                                            <div class="gridarea__content">
                                                <div class="gridarea__list">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-book-alt"></i> {{ $course->total_lesson }} Lesson
                                                        </li>
                                                        <li>
                                                            <i class="icofont-clock-time"></i> 1 hr 30 min
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="gridarea__heading">
                                                    <h3><a href="/course-detail/{{ $course->id }}">{{ $course->title }}</a></h3>
                                                </div>
                                                {{ Str::limit($course->description, 150, '...') }}
                                            </div>
                                        </div>
                                 </div>
                               @endforeach
                                
                                
                                
                            </div>

                        </div>


                        <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">

                            <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                                <div class="gridarea__img">
                                    <a href="course-details.html"><img loading="lazy"  src="{{ asset('img/grid/grid_1.png') }}" alt="grid"></a>
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge">Data & Tech</div>
                                    </div>
                                    <div class="gridarea__small__icon">
                                        <a href="#"><i class="icofont-heart-alt"></i></a>
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> 23 Lesson
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> 1 hr 30 min
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="/course/course-detail">Become a product Manager learn the
                                                        skills & job.
                                                    </a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        $32.00 <del>/ $67.00</del>
                                        <span>Free.</span>

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"  src="{{ asset('img/grid/grid_small_1.jpg') }}" alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Mirnsdo .H</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>

                                        <div class="gridarea__details">
                                            <a href="course-details.html">Know Details
                                                        <i class="icofont-arrow-right"></i>
                                                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                                <div class="gridarea__img">
                                    <img loading="lazy"  src="{{ asset('img/grid/grid_2.png') }}" alt="grid">
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge blue__color">Mechanical</div>
                                    </div>
                                    <div class="gridarea__small__icon">
                                        <a href="#"><i class="icofont-heart-alt"></i></a>
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> 23 Lesson
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> 1 hr 30 min
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="/course/course-detail">Foundation course to under stand
                                                    about softwere</a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        $32.00 <del>/ $67.00</del>
                                        <span>Free.</span>

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"  src="{{ asset('img/grid/grid_small_1.jpg') }}" alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Mirnsdo .H</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>

                                        <div class="gridarea__details">
                                            <a href="course-details.html">Know Details
                                                    <i class="icofont-arrow-right"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                                <div class="gridarea__img">
                                    <a href="course-details.html"><img loading="lazy"  src="{{ asset('img/grid/grid_3.png') }}" alt="grid"></a>
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge pink__color">Development</div>
                                    </div>
                                    <div class="gridarea__small__icon">
                                        <a href="#"><i class="icofont-heart-alt"></i></a>
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> 23 Lesson
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> 1 hr 30 min
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="/course/course-detail">Strategy law and with for organization
                                                    Foundation 
                                                </a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        $32.00 <del>/ $67.00</del>
                                        <span>Free.</span>

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"  src="{{ asset('img/grid/grid_small_1.jpg') }}" alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Mirnsdo .H</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>

                                        <div class="gridarea__details">
                                            <a href="course-details.html">Know Details
                                                    <i class="icofont-arrow-right"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                                <div class="gridarea__img">
                                    <a href="course-details.html"><img loading="lazy"  src="{{ asset('img/grid/grid_4.png') }}" alt="grid"></a>
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge green__color">Ui & UX Design</div>
                                    </div>
                                    <div class="gridarea__small__icon">
                                        <a href="#"><i class="icofont-heart-alt"></i></a>
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> 23 Lesson
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> 1 hr 30 min
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="course-details.html">The business Intelligence analyst with
                                                    Course & 2024
                                                </a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        $32.00 <del>/ $67.00</del>
                                        <span>Free.</span>

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"  src="{{ asset('img/grid/grid_small_1.jpg') }}" alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Mirnsdo .H</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>

                                        <div class="gridarea__details">
                                            <a href="course-details.html">Know Details
                                                    <i class="icofont-arrow-right"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="gridarea__wraper gridarea__wraper__2 gridarea__course__list" data-aos="fade-up">
                                <div class="gridarea__img">
                                    <a href="course-details.html"><img loading="lazy"  src="{{ asset('img/grid/grid_5.png') }}" alt="grid"></a>
                                    <div class="gridarea__small__button">
                                        <div class="grid__badge orange__color">Data & Tech</div>
                                    </div>
                                    <div class="gridarea__small__icon">
                                        <a href="#"><i class="icofont-heart-alt"></i></a>
                                    </div>

                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> 23 Lesson
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> 1 hr 30 min
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="course-details.html">Become a product Manager learn the skills & job.
                                                </a></h3>
                                    </div>
                                    <div class="gridarea__price">
                                        $32.00 <del>/ $67.00</del>
                                        <span>Free.</span>

                                    </div>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__bottom__left">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"  src="{{ asset('img/grid/grid_small_1.jpg') }}" alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Mirnsdo .H</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>

                                        <div class="gridarea__details">
                                            <a href="course-details.html">Know Details
                                                    <i class="icofont-arrow-right"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    {!! $courses->links('pagination.default') !!}


                </div>


            </div>
        </div>
    </div>
    <!-- course__section__end   -->
</x-layout>