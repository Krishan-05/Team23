<x-app-layout>
    <div class="dashboard-page">
        <div class="dashboard-box">
            <p class="dashboard-heading">
                {{ __("User Permissions Management") }}
            </p>
            <table class="table-class">
                <thead class="table-heading">
                    <tr class="table-row">
                        <th>Email (ALL USERS)</th>
                        <th>User Access</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('update-user-access', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <select name="useraccess">
                                    <option value="admin" {{ $user->useraccess === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->useraccess === 'user' ? 'selected' : '' }}>User</option>
                                    <!-- Add more options if needed -->
                                </select>

                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
