<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading" style="font-size: 56px;">{{ $history->session_name }}</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li>{{ $history->created_at->format('d-m-Y') }}</li>
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
            <div class="row" id="resultSection" style="margin-top: 50px;">
                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                        Gesture (<span id="gesturePercentage">{{ $history->gesture_score }}</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <p>{{ $history->gesture_feedback }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                        Kesesuaian Ekspresi (<span id="expressionPercentage">{{ $history->expression_score }}</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <p>{{ $history->expression_feedback }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                                        Vocal (<span id="vocalRangePercentage">{{ $history->vocal_quality_score }}</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne3" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <p>{{ $history->vocal_quality_feedback }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-layout>
