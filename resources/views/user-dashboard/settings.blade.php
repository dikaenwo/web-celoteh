<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-user-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>My Profile</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                        <ul class="nav about__button__wrap dashboard__button__wrap" id="myTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link active" data-bs-toggle="tab"
                                    data-bs-target="#projects__one" type="button" aria-selected="true"
                                    role="tab">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="single__tab__link" data-bs-toggle="tab"
                                    data-bs-target="#projects__two" type="button" aria-selected="false"
                                    role="tab" tabindex="-1">Password</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent"
                        data-aos="fade-up">
                        <!-- Profile Form -->
                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                            aria-labelledby="projects__one">
                            <div class="row">
                                <div class="col-xl-12">
                                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="row">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label for="fullname">Nama Lengkap</label>
                                                    <input type="text" id="fullname" name="fullname" value="{{ old('fullname', auth()->user()->fullname) }}" placeholder="John">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label for="username">Nama Pengguna</label>
                                                    <input type="text" id="username" name="username" value="{{ old('username', auth()->user()->username) }}" placeholder="johndue">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="johndoe@example.com">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label for="image">Foto Profil</label>
                                                    <input type="file" id="photo-upload" name="image" accept="image/*" onchange="loadImage(event)">
                                                    <div id="croppieContainer" style="display: none; margin-top: 10px;">
                                                        <div id="croppie"></div>
                                                        <button type="button" onclick="cropImage()" class="default__button">Crop Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="dashboard__form__button">
                                                <button type="submit" class="default__button">Update Info</button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="cropped-image" name="cropped_image">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Password Form -->
                        <div class="tab-pane fade" id="projects__two" role="tabpanel"
                            aria-labelledby="projects__two">
                            <div class="row">
                                <div class="col-xl-12">
                                    <form action="{{ route('profile.update') }}" method="POST" class="row">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-xl-12">
                                            <div class="dashboard__form__wraper">
                                                <div class="dashboard__form__input">
                                                    <label for="new_password">Password Baru</label>
                                                    <input type="password" id="new_password" name="password" placeholder="Masukkan password baru">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="dashboard__form__button">
                                                <button type="submit" class="default__button">Update Password</button>
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
    </x-user-profile-sidebar>

    <!-- Croppie Modal -->
    <div class="modal fade" id="croppieModal" tabindex="-1" aria-labelledby="croppieModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="croppieModalLabel">Crop Your Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="croppie-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="crop-button" class="btn btn-primary">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var croppieModal = new bootstrap.Modal(document.getElementById('croppieModal'));
    var croppieContainer = document.getElementById('croppie-container');
    var croppie = new Croppie(croppieContainer, {
        viewport: { width: 200, height: 200, type: 'square' },
        boundary: { width: 300, height: 300 },
        showZoomer: true
    });

    document.getElementById('photo-upload').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            croppie.bind({
                url: e.target.result
            });
            croppieModal.show();
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById('crop-button').addEventListener('click', function() {
        croppie.result('base64').then(function(base64) {
            console.log('Base64 result:', base64);
            
            var croppedImageInput = document.getElementById('cropped-image');
            if (croppedImageInput) {
                croppedImageInput.value = base64;
            } else {
                console.error('Element with ID cropped-image not found');
            }
            
            var photoPreview = document.getElementById('photo-preview');
            if (photoPreview) {
                photoPreview.src = base64;
                photoPreview.style.display = 'block';
            } else {
                console.error('Element with ID photo-preview not found');
            }
            
            croppieModal.hide();
        }).catch(function(error) {
            console.error('Cropping failed:', error);
        });
    });
});

    </script>
</x-layout>
