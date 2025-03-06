
<x-app-layout>
    <div class="dashboard-page">
        <div class="dashboard-box">
                <p class="dashboard-heading">
                {{ __("Account Summary - Admin View") }} - User ID: {{ auth()->user()->id }}
                </p>
                
                <div class="dashboard-buttons">
                <a href="{{ route('profile.edit') }}" class="profile-edit">
                        {{ __('Edit Account Details') }}
                </a>
                <a href="{{ route('admin.user-permissions') }}" class="profile-edit">
                        {{ __('User Permissions') }}
                </a>
                <a href="{{ route('admin.stockview') }}" class="profile-edit">
                        {{ __('Stock View') }}
                </a>
                </div>
            </div>
    </div>
</x-app-layout>




