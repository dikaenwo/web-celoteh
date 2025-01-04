<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-user-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>My Profile</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                        <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button" aria-selected="true" role="tab">Enrolled Courses</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">
                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
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
                    </div>
                </div>
            </div>
        </div>
    </x-user-profile-sidebar> 
    
</x-layout>