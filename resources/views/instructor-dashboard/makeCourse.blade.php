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
                            <h2 class="heading">Create Course</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Create Course</li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="../img/herobanner/herobanner__1.png" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="../img/herobanner/herobanner__2.png" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="../img/herobanner/herobanner__3.png" alt="photo">
            <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="../img/herobanner/herobanner__5.png" alt="photo">
        </div>

    </div>
    <!-- breadcrumbarea__section__end-->


    <!-- become__instructor__start -->
        <div class="create__course sp_100">
         <div class="container">
            <div class="row">
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{ route('buat-course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Course Info
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="become__instructor__form">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Cover</label>
                                                        <input type="file" name="cover" placeholder="Course Title">
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                                       @foreach ($categories as $category)
                                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                       @endforeach
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                    <div class="dashboard__select__heading">
                                                        <span>SHORT BY OFFER</span>
                                                    </div>
                                                    <div class="dashboard__selector">
                                                    <select class="form-select" name="paid_for" aria-label="Default select example">
                                                        <option selected value="free">Free</option>
                                                        <option value="basic">Basic</option>
                                                        <option value="pro">Pro</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">About Course</label>
                                                        <textarea name="description" id="" cols="30"
                                                            rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__button create__course__margin">
                                                    <button class="default__button" type="submit">Buat Course</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
    
    
    
                            {{-- <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Course Intro Video
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="become__instructor__form">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <input type="text" placeholder="Select Video search">
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-xl-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Add Your Video URL</label>
                                                        <input type="text" placeholder="Add your Video URL here">
                                                    </div>
                                                </div>
                                            </div>
                                            <small>Example: <a href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a></small>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div> --}}
                              {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                 Certificate Template
                                  </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__8.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__5.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__9.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__7.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <div class="create__course__single__img">
                                                <img loading="lazy"  src="../img/dashbord/dashbord__8.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                          </div>
                        </div>
                    </div>
                </form>
                {{-- <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__wraper">
                        <div class="create__course__title">
                            <h4>Course Upload Tips</h4>
                        </div>
                        <div class="create__course__list">
                            <ul>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Set the Course Price option make it free.
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Standard size for the course thumbnail.
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Video section controls the course overview video.
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Course Builder is where you create  course.
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Add Topics in the Course Builder section to create lessons, .
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Prerequisites refers to the fundamental courses .
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Information from the Additional Data section.
                                </li>

                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
         </div>
        </div>
</x-layout>