<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-user-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>Summery</h4>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                        <div class="dashboard__single__counter">
                            <div class="counterarea__text__wraper">
                                <div class="counter__img">
                                    <img loading="lazy"  src="../img/counter/counter__1.png" alt="counter">
                                </div>
                                <div class="counter__content__wraper">
                                    <div class="counter__number">
                                        <span class="counter">{{ $courses->count() }}</span>+
    
                                    </div>
                                    <p>Modul Pembelajaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                        <div class="dashboard__single__counter">
                            <div class="counterarea__text__wraper">
                                <div class="counter__img">
                                    <img loading="lazy"  src="../img/counter/counter__2.png" alt="counter">
                                </div>
                                <div class="counter__content__wraper">
                                    <div class="counter__number">
                                        <span class="counter">4</span>+
                                    </div>
                                    <p>Mentor Berpengalaman</p>
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                        <div class="dashboard__single__counter">
                            <div class="counterarea__text__wraper">
                                <div class="counter__img">
                                    <img loading="lazy"  src="../img/counter/counter__3.png" alt="counter">
                                </div>
                                <div class="counter__content__wraper">
                                    <div class="counter__number">
                                        <span class="counter">{{ $users->count() }}</span>
    
                                    </div>
                                    <p>Pengguna Aktif</p>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>Kelas Mentoring yang saya ikuti</h4>
                </div>
                <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard__table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Kelas</th>
                                    <th>Pemateri</th>
                                    <th>Tanggal Mulai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mentoringClasses as $class)
                                    <tr>
                                        <td>{{ $class->nama_kelas }}</td>
                                        <td>{{ $class->pemateri->name }}</td>
                                        <td>{{ $class->pivot->tanggal_mulai }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Anda belum mengikuti kelas mentoring apapun.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </x-user-profile-sidebar> 
    
</x-layout>