<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
     <!-- tution__section__start -->
     <div class="tution sp_bottom_100 sp_top_50">
        <div class="container-fluid full__width__padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <div class="accordion content__cirriculum__wrap" id="accordionExample">
                        @foreach ($kurikulums as $index => $kurikulum)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                      {{ $kurikulum->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach ($kurikulum->lesson as $lesson)
                                            <div class="scc__wrap">
                                                <div class="scc__info">
                                                    <i class="icofont-video-alt"></i>
                                                    <h5> <a href="/lesson/{{ $lesson->slug }}"><span>{{ $lesson->title }}</span></a></h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">					
                    <div class="lesson__content__main">
                        <div class="lesson__content__wrap">
                            <h3>{{ $pelajaran->title }}</h3>
                        </div>
                        
                        <div class="plyr__video-embed rbtplayer">
                            <iframe width="100%" height="500px" src="{{ $pelajaran->video }}" allowfullscreen allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
    <!-- tution__section__end -->
</x-layout>