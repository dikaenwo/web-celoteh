<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-instructor-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>My Quiz Attempts</h4>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-4 col-md-4 col-12">
                        <div class="dashboard__select__heading">
                            <span>Courses</span>
                        </div>
                        <div class="dashboard__selector">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>All</option>
                            <option value="1">Web Design</option>
                            <option value="2">Graphic</option>
                            <option value="3">English</option>
                            <option value="4">Spoken English</option>
                            <option value="5">Art Painting</option>
                            <option value="6">App Development</option>
                            <option value="7">Web Application</option>
                            <option value="7">Php Development</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="dashboard__select__heading">
                            <span>SHORT BY</span>
                        </div>
                        <div class="dashboard__selector">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Default</option>
                            <option value="1">Trending</option>
                            <option value="2">Price: low to high</option>
                            <option value="3">Price: low to low</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="dashboard__select__heading">
                            <span>SHORT BY OFFER</span>
                        </div>
                        <div class="dashboard__selector">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Free</option>
                            <option value="1">paid</option>
                            <option value="2">premimum</option>
                          </select>
                        </div>
                    </div>
                </div>
                <hr class="mt-40">
              <div class="row">
                
                <div class="col-xl-12">
                    <div class="dashboard__table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Judul Presentasi</th>
                                    <th>Pemateri</th>
                                    <th>Tanggal</th>
                                    <th>Zoom Link</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ujiTampils as $ujiTampil)
                                <tr>
                                    <td>
                                        <span>{{ $ujiTampil->judul_presentasi }}</span>
                                    </td>
                                    <td>
                                        <p>{{ $ujiTampil->nama }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $ujiTampil->tanggal_presentasi }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $ujiTampil->zoom_link }}</p>
                                    </td>
                                    <td>
                                        <span class="dashboard__td dashboard__td--running">Running</span>
                                    </td>
                                    <td>
                                        <div class="dashboard__button__group">
                                            <form action="{{ route('ujiTampil.validateUji', $ujiTampil->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="dashboard__small__btn__2">Accept</button>
                                            </form>
                                             <a class="dashboard__small__btn__2 dashboard__small__btn__3" href="#">Delete</a>
                                        </div>
                                    </td>
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