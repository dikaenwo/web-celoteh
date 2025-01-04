<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>

    <!-- breadcrumbarea__section__start -->
    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading">Zoom Meeting Details</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li>Zoom Meetings and Webinars</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy" class="shape__icon__img shape__icon__img__1" src="../img/herobanner/herobanner__1.png" alt="photo">
            <img loading="lazy" class="shape__icon__img shape__icon__img__2" src="../img/herobanner/herobanner__2.png" alt="photo">
            <img loading="lazy" class="shape__icon__img shape__icon__img__3" src="../img/herobanner/herobanner__3.png" alt="photo">
            <img loading="lazy" class="shape__icon__img shape__icon__img__4" src="../img/herobanner/herobanner__5.png" alt="photo">
        </div>
    </div>
    <!-- breadcrumbarea__section__end-->

    <div class="blogarea__2 zoom__meetings__details sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blogarae__img__2 course__details__img__2 aos-init aos-animate" data-aos="fade-up">
                        <img loading="lazy" src="{{ asset('storage/'.$ujitampil->image) }}" alt="blog">
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">
                    <div class="blog__details__content__wraper">
                        <div class="course__list__wraper" data-aos="fade-up">
                            <div class="experence__description">
                                <p class="description__1">{{ $ujitampil->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <div class="course__details__sidebar--2">
                        <div class="event__sidebar__wraper" data-aos="fade-up">
                            <div class="event__details__list">
                                <ul>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="icofont-teacher"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <span class="sb_label">Pemateri:</span><span>{{ $ujitampil->nama }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="icofont-clock-time"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <span class="sb_label">Jam: </span><span>3.00PM</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="icofont-calendar"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <span class="sb_label">Tanggal: </span><span>{{ $ujitampil->tanggal_presentasi }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="event__details__icon">
                                            <i class="icofont-learn"></i>
                                        </div>
                                        <div class="event__details__date">
                                            <span class="sb_label">Partisipan:</span><span>{{ $totalpartisipan }}/20 students</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            @php
                                $currentDate = \Carbon\Carbon::now();
                                $eventDate = \Carbon\Carbon::parse($ujitampil->tanggal_presentasi);
                                $isParticipant = $ujitampil->participants->contains(auth()->user()->id);
                                $currentParticipants = $ujitampil->participants()->count();
                                $maxParticipants = 20; 
                            @endphp

                            <!-- Check if the current date is before the event date -->
                            @if($currentDate < $eventDate)
                                @if(!$isParticipant)
                                    @if($currentParticipants < $maxParticipants)
                                        <form action="{{ route('join-event') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="uji_tampil_id" value="{{ $ujitampil->id }}">
                                            <div class="event__details__button">
                                                <button class="default__button" type="submit">Jadi Partisipan</button>
                                            </div>
                                        </form>
                                    @else
                                        <p>Maaf, kuota partisipan telah penuh.</p>
                                    @endif
                                @else
                                    <p>Anda sudah menjadi partisipan.</p>
                                    <p>Tombol reedem poin akan tersedia setelah tanggal {{ $ujitampil->tanggal_presentasi }}.</p>
                                @endif
                            @else
                                <!-- Display the form to redeem points if the event date has passed -->
                                @if($isParticipant)
                                    <form action="{{ route('tambah-point') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="uji_tampil_id" value="{{ $ujitampil->id }}">
                                        <label for="">Masukkan Kode</label>
                                        <input type="text" class="mb-3" name="unique_code">
                                        <div class="event__details__button">
                                            <button class="default__button" type="submit">Reedem Poin</button>
                                        </div>
                                    </form>
                                @else
                                    <p>Uji Tampil Telah Selesai. Anda tidak berpartisipasi dalam acara ini.</p>
                                @endif
                            @endif                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif(session()->has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</x-layout>
