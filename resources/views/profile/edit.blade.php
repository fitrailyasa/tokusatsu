<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Profile
    </x-slot>

    <!-- Content -->
    <div class="row mb-5">
        <div class="mb-3">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="mb-3">
            @include('profile.partials.update-password-form')
        </div>
        <div class="mb-3">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</x-admin-layout>
