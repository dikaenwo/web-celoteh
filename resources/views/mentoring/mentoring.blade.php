<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h1 class="heading" style="font-size: 56px;">Yuk! <br> Mulai Pilih Kelas Kamu</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbarea__section__end-->

    <!-- kelas_dasar -->
    @foreach ($mentorings as $mentoring)
        <div class="eventarea sp_top_100 sp_bottom_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="eventarea__details__small__button" data-aos="fade-up">
                            <a href="#">{{ $mentoring->bidang_kelas }}</a>
                        </div>
                        <div class="event__details__heading" data-aos="fade-up">
                            <h3>{{ $mentoring->nama_kelas }}</h3>
                        </div>
                        <div class="eventarea__details__list">
                            <ul>
                                <li>
                                    <div class="event__details__small__img" data-aos="fade-up">
                                        <div class="event__details__text">
                                            <span>Pengajar:</span>
                                            <p>{{ $mentoring->nama_mentor }}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="event__details__inner">
                            <div class="event__details__img__2" data-aos="fade-up">
                                <img loading="lazy" src="{{ asset('storage/'.$mentoring->cover) }}" alt="photo">
                            </div>
                            <div class="event__details__content" data-aos="fade-up">
                                <h4>Deskripsi</h4>
                                <p style="text-align: justify;">{{ $mentoring->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="event__sidebar__wraper" data-aos="fade-up">
                            <div class="event__details__list">
                                <ul>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="fi fi-rr-calendar icon-color"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <p> <span>Tanggal Mulai :</span>{{ $mentoring->tanggal_mulai }}</p>
                                            <br>
                                            <p> <span>Jadwal :</span>{{ $mentoring->jadwal }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="fi fi-rr-alarm-clock icon-color"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <p> <span>Waktu :</span>{{ $mentoring->jam_mulai }} - {{ $mentoring->jam_berakhir }} WIB</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="fi fi-rr-comment icon-color"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <p> <span>Kuota:</span>{{ $mentoring->users()->count() }}/20</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="event__details__button">
                                @if ($mentoring->users()->where('user_id', auth()->id())->exists())
                                    <p>Anda Sudah Mendaftar Kelas Ini</p>
                                @elseif ($mentoring->users()->count() >= 5)
                                    <p>Kelas Sudah Penuh</p>
                                @else
                                    <form action="{{ route('mentoring.daftar', $mentoring->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="default__button">Daftar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- SweetAlert -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                });
            @endif
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-layout>
