@extends('layouts.app')

@section('content')
    <section class="card">
        <h1>User Accounts</h1>

        <p>
            User records retrieved from the database using Eloquent.
        </p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->full_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                No user records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection