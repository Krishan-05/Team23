<x-app-layout>
    <div class = "editpage-container">
        <div class = "profile-update">
            @include('profile.partials.update-profile-information-form')
        </div>
        
        <div class = "profile-password">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-app-layout>
