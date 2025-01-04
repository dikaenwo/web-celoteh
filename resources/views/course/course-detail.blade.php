<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- theme fixed shadow -->
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
                            <h2 class="heading">Course-Details</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Course-Details</li>
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

    <div class="blogarea__2 sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">

                <div class="col-xl-8 col-lg-8">
                    <div class="blogarae__img__2 course__details__img__2" data-aos="fade-up">
                        <img loading="lazy"  src="{{ asset('storage/'. $course->cover) }}" alt="blog">
                        <div class="registerarea__content course__details__video">
                            <div class="registerarea__video">
                                <div class="video__pop__btn">

                                    <a class="video-btn" href="https://drive.google.com/file/d/1RPV0fxgy1_U5hx2z4Daw3c960NKfTPgn/view?usp=sharing"> <img loading="lazy"  src="img/icon/video.png" alt=""></a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="blog__details__content__wraper">
                        <div class="course__button__wraper" data-aos="fade-up">
                            <div class="course__button">
                                <a href="#">{{ $course->category->name }}</a>
                            </div>
                            <div class="course__date">
                                <p>Last Update:<span> Sep 29, 2024</span></p>
                            </div>
                        </div>
                        <div class="course__details__heading" data-aos="fade-up">
                            <h3>{{ $course->title }}</h3>
                        </div>
                        <div class="course__details__price" data-aos="fade-up">
                            <ul>
                                <li>
                                    <div class="course__details__date">
                                        <i class="icofont-book-alt"></i> {{ $course->total_lesson }} Lesson
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="course__details__tab__wrapper" data-aos="fade-up">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="nav  course__tap__wrap" id="myTab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__two" type="button"><i class="icofont-book-alt"></i>Curriculum</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__one" type="button"><i class="icofont-paper"></i>Description</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content tab__content__wrapper" id="myTabContent">
                                <div class="tab-pane fade active show" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                                    <div class="accordion content__cirriculum__wrap" id="accordionExample">
                                        @foreach ($kurikulums as $index => $kurikulum)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $index }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                        {{ $kurikulum->title }} <span>02hr 35min</span>
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        @if (auth()->user()->status_member !== $course->paid_for)
                                                            <p>Maaf, modul ini hanya tersedia untuk member {{$course->paid_for}}.</p>
                                                        @else
                                                            @foreach ($kurikulum->lesson as $lesson)
                                                                <div class="scc__wrap">
                                                                    <div class="scc__info">
                                                                        <i class="icofont-video-alt"></i>
                                                                        <h5><span>Video :</span> {{ $lesson->title }}</h5>
                                                                        <a target="_blank" href="{{ asset('storage/'. $lesson->bacaan) }}" class="question" style="font-size: 12px">Modul Baca</a>
                                                                    </div>
                                                                    <div class="scc__meta">
                                                                        <span class="time"><i class="icofont-clock-time"></i> {{ $lesson->durasi }} menit</span>
                                                                        <a href="/lesson/{{ $lesson->slug }}"><span class="question"><i class="icofont-eye"></i> Preview</span></a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                    <div class="experence__description">
                                        <p class="description__1">{{ $course->description }}</p>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">

                    <div class="course__details__sidebar">
                        <div class="event__sidebar__wraper" data-aos="fade-up">
                        <div class="blogsidebar__content__wraper__2" data-aos="fade-up">

                            <h4 class="sidebar__title">Populer Course</h4>
                            <ul class="course__details__populer__list">
                                <li>
                                    <div class="course__details__populer__img">
                                        <img loading="lazy"  src="{{ asset('img/blog-details/blog-details__6.png') }}" alt="populer">
                                    </div>
                                    <div class="course__details__populer__content">
                                        <span>$32,000</span>
                                        <h6>
                                            <a href="#">Making Music with Other People</a>

                                        </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="course__details__populer__img">
                                        <img loading="lazy"  src="{{ asset('img/blog-details/blog-details__7.png') }}" alt="populer">
                                    </div>
                                    <div class="course__details__populer__content">
                                        <span>$32,000</span>
                                        <h6>
                                            <a href="#">Making Music with Other People</a>

                                        </h6>
                                    </div>
                                </li>
                                <li>

                                    <div class="course__details__populer__img">
                                        <img loading="lazy"  src="{{ asset('img/blog-details/blog-details__8.png') }}" alt="populer">
                                    </div>
                                    <div class="course__details__populer__content">
                                        <span>$32,000</span>
                                        <h6>
                                            <a href="#">Making Music with Other People</a>
                                        </h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>