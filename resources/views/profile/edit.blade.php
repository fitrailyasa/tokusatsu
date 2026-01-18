@can('admin:dashboard')
    <x-admin-layout>
        <x-slot name="title">
            Edit Profile
        </x-slot>
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('components.alert')
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            @include('profile.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-layout>
@else
    <x-client-layout>
        <div class="container my-5 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('components.alert')
                    <div class="border-0">
                        <div class="">
                            @include('profile.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-client-layout>
@endcan
