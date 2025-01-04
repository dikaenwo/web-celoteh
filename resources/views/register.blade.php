<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>

    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading" style="size: 56px;">Bergabung bersama kami dan taklukkan ketakutanmu</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape__icon__2">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__1" src="img/herobanner/herobanner__1.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__2" src="img/herobanner/herobanner__2.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__3" src="img/herobanner/herobanner__3.png" alt="photo">
            <img loading="lazy" class=" shape__icon__img shape__icon__img__4" src="img/herobanner/herobanner__5.png" alt="photo">
        </div>
    </div>

    <div class="loginarea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-md-2">
                    <div class="loginarea__wraper">
                        <div class="login__heading">
                            <h5 class="login__title">Daftar Sekarang</h5>
                            <p class="login__description">Already have an account? <a href="/login" data-bs-toggle="modal" data-bs-target="#registerModal">Log In</a></p>
                        </div>
                        <form id="signup-form" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="login__form">
                                        <label class="form__label">Preview Photo</label>
                                        <div id="photo-preview-container" style="display: none;">
                                            <img id="photo-preview" style="max-width: 100%;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="login__form">
                                        <label class="form__label">Upload Photo</label>
                                        <input id="photo-upload" class="common__login__input" type="file" name="image" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="login__form">
                                        <label class="form__label">Full Name</label>
                                        <input class="common__login__input" type="text" name="fullname" placeholder="Full Name" required>
                                        @error('fullname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="login__form">
                                        <label class="form__label">Username</label>
                                        <input class="common__login__input" type="text" name="username" placeholder="Username" required>
                                        @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="login__form">
                                        <label class="form__label">Email</label>
                                        <input class="common__login__input" type="email" name="email" placeholder="Your Email" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="login__form">
                                        <label class="form__label">Password</label>
                                        <input class="common__login__input" type="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="login__form">
                                        <label class="form__label">Re-Enter Password</label>
                                        <input class="common__login__input" type="password" name="password_confirmation" placeholder="Re-Enter Password" required>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                <div class="form__check">
                                    <input id="accept_pp" type="checkbox" name="accept_pp" required>
                                    <label for="accept_pp">Accept the Terms and Privacy Policy</label>
                                    @error('accept_pp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" id="cropped-image" name="cropped_image">
                            <div class="login__button">
                                <button type="submit" class="default__button">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login__shape__img educationarea__shape_image">
                <img loading="lazy" class="hero__shape hero__shape__1" src="img/education/hero_shape2.png" alt="Shape">
                <img loading="lazy" class="hero__shape hero__shape__2" src="img/education/hero_shape3.png" alt="Shape">
            </div>
        </div>
    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
                    document.getElementById('cropped-image').value = base64;
                    var photoPreview = document.getElementById('photo-preview');
                    photoPreview.src = base64;
                    photoPreview.parentElement.style.display = 'block';
                    croppieModal.hide();
                });
            });
        });
    </script>
</x-layout>
