
<!-- Dashboard Page Layout -->
<x-app-layout>
    <div class="dashboard-page">
        <div class="dashboard-box">
                <!-- Confirmation that the user is logged in -->
                <p class= "dashboard-heading"> {{ __("Account Summary") }}</p>
                
                <!-- Logout Form (Only in Dashboard) -->
                <div class="dashboard-buttons">
                <a href="{{ route('profile.edit') }}" class="profile-edit">
                        {{ __('Edit Account Details') }}
                    </a>
                </div>
            </div>
    </div>
</x-app-layout>




