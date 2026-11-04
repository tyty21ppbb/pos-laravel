@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div>
            <span class="eyebrow">Account management</span>
            <h1>User Accounts</h1>

            <p>
                Manage POS users and their prepared profile
                pictures.
            </p>
        </div>

        <a
            class="button"
            href="{{ route('users.create') }}"
        >
            Add User
        </a>
    </div>

    <section class="card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                      @php
    $avatarUrl = $user->avatar
        ? asset('storage/' . $user->avatar)
        : asset('images/avatar-placeholder.svg');
@endphp
                        <tr>
                            <td>
                                <img
                                    class="table-avatar"
                                    src="{{ $avatarUrl }}"
                                    alt="Avatar of {{ $user->full_name }}"
                                >
                            </td>

                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->full_name }}</td>

                            <td>
                                <a
                                    class="table-link"
                                    href="{{ route(
                                        'users.edit',
                                        $user
                                    ) }}"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="5"
                                class="empty-state"
                            >
                                No user records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection