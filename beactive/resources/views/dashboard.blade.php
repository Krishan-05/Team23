<link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">

<!-- Dashboard Page Layout -->
<x-app-layout>
    <div class="dashboard-page">
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("Account Summary") }} - User ID: {{ auth()->user()->id }}
            </p>


            <div class="dashboard-buttons">
                <a href="{{ route('profile.edit') }}" class="profile-edit">
                    {{ __('Edit Account Details') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>