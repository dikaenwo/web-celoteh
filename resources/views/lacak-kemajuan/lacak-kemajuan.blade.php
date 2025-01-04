<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading" style="font-size: 56px;">Yuk! Lacak Kemajuanmu</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li>Lacak Kemajuanmu Untuk Melihat Perkembangan yang Signfikan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy" class="shape__icon__img shape__icon__img__1" src="../img/herobanner/herobanner__1.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__2" src="../img/herobanner/herobanner__2.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__3" src="../img/herobanner/herobanner__3.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__4" src="../img/herobanner/herobanner__5.png" alt="photo" />
        </div>
    </div>

    <div class="blogarea__2 zoom__meetings__details sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row" id="resultSection">
                @if ($histories->isEmpty())
                    <div class="alert alert-warning">
                        Belum ada data latihan yang disimpan.
                    </div>
                @else
                    @foreach ($histories as $history)
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <div class="create__course__accordion__wraper">
                                <div class="accordion" id="accordionExample1">
                                    <div class="accordion-item">
                                        <h2 class="">
                                            <button style="border: none" type="button">
                                                <img src="../img/lacak-kemajuan.png" width="80px" style="margin-right: 30px" alt="">
                                            <a href="/kemajuan-detail/{{ $history->id }}">{{ $history->session_name }} ({{  $history->created_at->format('d-m-Y') }})</a>
                                            </button>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layout>
