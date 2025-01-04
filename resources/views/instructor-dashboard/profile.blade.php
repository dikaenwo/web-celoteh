<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-instructor-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>My Profile</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="dashboard__form dashboard__form__margin">Nama Lengkap</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="dashboard__form dashboard__form__margin">{{ auth()->user()->fullname }}</div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="dashboard__form dashboard__form__margin">Username</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="dashboard__form dashboard__form__margin">{{ auth()->user()->username }}</div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="dashboard__form dashboard__form__margin">Email</div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="dashboard__form dashboard__form__margin">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </x-instructor-profile-sidebar> 
</x-layout>