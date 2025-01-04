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
                            <h2 class="heading">Buat Mentoring</h2>
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
                <form action="{{ route('mentoring.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Buat Kelas
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="become__instructor__form">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Cover Gambar</label>
                                                        <input type="file" name="cover">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Nama Kelas</label>
                                                        <input type="text" name="nama_kelas">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                    <div class="dashboard__select__heading">
                                                        <span>Kelas</span>
                                                    </div>
                                                    <div class="dashboard__selector">
                                                    <select class="form-select" name="bidang_kelas" aria-label="Default select example">
                                                       <option value="Kelas Motivator">Kelas Motivator</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                    <div class="dashboard__select__heading">
                                                        <span>Mentor</span>
                                                    </div>
                                                    <div class="dashboard__selector">
                                                    <select class="form-select" name="nama_mentor" aria-label="Default select example">
                                                        <option selected value="Lidemar Halide">Lidemar Halide</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label for="#">Jam Mulai</label>
                                                            <input type="time" name="jam_mulai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label for="#">Jam Berakhir</label>
                                                            <input type="time" name="jam_berakhir">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label for="#">Tanggal Mulai</label>
                                                            <input type="date" name="tanggal_mulai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label for="#">Jadwal</label>
                                                            <input type="text" name="jadwal" placeholder="Contoh: Senin - Jumat">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-3">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Deskripsi Kelas</label>
                                                        <textarea name="deskripsi" id="" cols="30"
                                                            rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__button create__course__margin">
                                                    <button class="default__button" type="submit">Buat Kelas Mentoring</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
         </div>
        </div>
</x-layout>