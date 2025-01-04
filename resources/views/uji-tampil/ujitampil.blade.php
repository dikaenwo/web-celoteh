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
                                <h2 class="heading" style="size: 56px;">Buat Jadwal <br> Uji Tampil</h2>
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
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample">


                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Masukkan Data Diri 
                                </button>
                              </h2>
                              @if(session()->has('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                               {{ session('success') }}
                              </div>
                              @endif
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="become__instructor__form">
                                        <form class="row" method="POST" action="{{ route('buat-uji-tampil.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Upload Cover</label>
                                                        <input type="file" name="image" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Judul</label>
                                                        <input type="text" name="judul_presentasi" placeholder="Contoh: Perubahan Iklim">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Nama Lengkap</label>
                                                        <input type="text" name="nama" value="{{ auth()->user()->fullname }}" placeholder="Nama">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Tanggal</label>
                                                        <input type="date" name="tanggal_presentasi">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Jam Tampil</label>
                                                        <input type="time" name="jam_tampil">
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Penjelasan Singkat Materi</label>
                                                        <textarea name="deskripsi" id="" cols="30"
                                                            rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__wraper">
                                                    <div class="dashboard__form__input">
                                                        <label for="#">Link Zoom</label>
                                                        <input type="text" name="zoom_link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                <div class="dashboard__form__button create__course__margin">
                                                    <button class="default__button" type="submit">Buat Jadwal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                        <div class="create__course__wraper">
                            <div class="create__course__title">
                                <h4>Keuntungan Untuk Berani Tampil</h4>
                            </div>
                            <div class="create__course__list">
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Meningkatkan Kepercayaan Diri
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Mengasah Keterampilan Komunikasi
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Mengembangkan Kemampuan Mengelola Stres
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Meningkatkan Kemampuan Improvisasi                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Membangun Jaringan dan Kolaborasi
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Mengidentifikasi dan Mengatasi Kelemahan                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        Mendorong Pertumbuhan Pribadi
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const timeInput = document.querySelector('input[name="jam_tampil"]');
            
            timeInput.addEventListener('change', function () {
                const selectedTime = timeInput.value;
                const selectedHour = parseInt(selectedTime.split(':')[0]);

                // Validasi apakah jam berada di luar rentang yang diizinkan (10:00 - 19:00)
                if (selectedHour < 10 || selectedHour > 19) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Jam Tidak Valid',
                        text: 'Jam yang bisa dipilih adalah antara pukul 10:00 pagi hingga 19:00 malam.',
                        confirmButtonText: 'OK'
                    });

                    // Reset nilai input jam agar tidak terpilih jam yang tidak valid
                    timeInput.value = '';
                }
            });
        });
    </script>
</x-layout>