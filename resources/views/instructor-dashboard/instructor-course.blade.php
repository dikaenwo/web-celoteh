<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-instructor-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>Courses</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                        <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button" aria-selected="true" role="tab">Kursus</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button" aria-selected="false" role="tab" tabindex="-1">Kurikulum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__three" type="button" aria-selected="false" role="tab" tabindex="-1">Pelajaran</button>
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
                                                    <h3><a target="_blank" href="/course-detail/{{ $course->id }}">{{ $course->title }}</a></h3>
                                                </div>
                                                {{ Str::limit($course->description, 150, '...') }}

                                            </div>
                                        </div>
                                 </div>
                               @endforeach
                                
                            </div>
                        </div>

                        <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">

                            <div class="row">
                                <form action="{{ route('instructor-course-kurikulum') }}" method="POST">
                                    @csrf
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label for="#">Judul</label>
                                                <input type="text" name="title" placeholder="Course Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                            <div class="dashboard__select__heading">
                                                <span>Courses</span>
                                            </div>
                                            <div class="dashboard__selector">
                                            <select class="form-select mb-3" name="course_id" aria-label="Default select example">
                                               @foreach ($courses as $course)
                                               <option value="{{ $course->id }}">{{ $course->title }}</option>
                                               @endforeach
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                        <div class="dashboard__form__button create__course__margin">
                                            <button class="default__button" type="submit">Buat Course</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="projects__three" role="tabpanel" aria-labelledby="projects__three">
                            <div class="row">
                                <form action="{{ route('instructor-course-lesson') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <div class="dashboard__select__heading">
                                            <span>Courses</span>
                                        </div>
                                        <div class="dashboard__selector mb-3">
                                            <select class="form-select" name="curriculum_id">
                                                <option selected>Pilih Kursus</option>
                                               @foreach ($courses as $course)
                                               <optgroup label="{{ $course->title }}">
                                                @foreach ($course->kurikulum as $kurikulum)
                                                <option value="{{ $kurikulum->id }}">{{ $kurikulum->title }}</option>
                                                @endforeach
                                               </optgroup>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label for="#">Judul</label>
                                                <input type="text" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label for="#">Link Video</label>
                                                <input type="text" name="video">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label for="#">Upload File Bacaan</label>
                                                <input type="file" name="bacaan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <div class="dashboard__form__wraper">
                                            <div class="dashboard__form__input">
                                                <label for="#">Durasi</label>
                                                <input type="number" name="durasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                        <div class="dashboard__form__button create__course__margin">
                                            <button class="default__button" type="submit">Buat Course</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-instructor-profile-sidebar> 
    
</x-layout>