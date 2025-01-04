<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-instructor-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>Dashboard</h4>
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
                    <h4>Dashboard</h4>
                </div>
                <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard__table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->fullname }}</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </x-instructor-profile-sidebar> 
    
</x-layout>