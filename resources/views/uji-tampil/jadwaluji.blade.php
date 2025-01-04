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
                        <h2 class="heading" style="size: 56px;">Tonton Uji Tampil <br> Peserta Lain</h2>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="shape__icon__2">
       
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
                                <a href="#" class="single__tab__link " data-bs-toggle="tab" data-bs-target="#projects__two"><i class="icofont-listine-dots"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-xl-12">

                <div class="tab-content tab__content__wrapper" id="myTabContent">


                    <div class="tab-pane fade  active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">

                        <div class="row">
                           @foreach ($ujitampil as $tampil)
                           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                            <div class="gridarea__wraper gridarea__wraper__2">
                                <div class="gridarea__img">
                                    <a href="course-details.html"><img loading="lazy"  src="{{ asset('storage/'.$tampil->image) }}" alt="grid"></a>
                                    {{-- <div class="gridarea__small__button">
                                        <div class="grid__badge">Peserta</div>
                                    </div> --}}
                                </div>
                                <div class="gridarea__content">
                                    <div class="gridarea__list">
                                        <ul>
                                            <li>
                                                <i class="icofont-book-alt"></i> {{ $tampil->participants->count() }}/20 Partisipan
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i> {{ $tampil->tanggal_presentasi }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="gridarea__heading">
                                        <h3><a href="/uji-tampil/{{ $tampil->id }}">{{ $tampil->judul_presentasi }}</a></h3>
                                    </div>
                                    <p>{{ Str::words(strip_tags($tampil->deskripsi), 223, '...') }}</p>
                                    <div class="gridarea__bottom">
                                        <div class="gridarea__small__img">
                                            <img loading="lazy"  src="{{ asset('storage/'. $tampil->author->image) }}" alt="grid">
                                            <div class="gridarea__small__content">
                                                <h6>{{ $tampil->nama }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           @endforeach
                        </div>

                    </div>

                </div>

            </div>

            {!! $ujitampil->links('pagination.default') !!}


        </div>

    </div>
</div>
<!-- course__section__end   -->
</x-layout>