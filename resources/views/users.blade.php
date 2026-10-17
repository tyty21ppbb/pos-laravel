@extends('layouts.app')

@section('content')
    <section>
        <p>Staff management</p>

        <h1>User Accounts</h1>

        <p>
            {{ count($users) }} user records retrieved
            from a temporary PHP array.
        </p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['full_name'] }}</td>
                            <td>{{ $user['role'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection