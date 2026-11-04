@extends('layouts.app')

@section('content')
   @php
    $avatarUrl = $user->avatar
        ? asset('storage/' . $user->avatar)
        : asset('images/avatar-placeholder.svg');
@endphp

    <div class="form-shell">
        <section class="form-intro">
            <span class="eyebrow">User management</span>
            <h1>Edit User</h1>

            <p>
                Update account information and the prepared
                profile picture.
            </p>

            <a
                class="back-link"
                href="{{ route('users.index') }}"
            >
                &larr; Back to users
            </a>
        </section>

        <section class="form-card">
            <h2>User Details</h2>

            <form
                method="POST"
                enctype="multipart/form-data"
                action="{{ route('users.update', $user) }}"
            >
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="username">
                        Username <span>*</span>
                    </label>

                    <input
                        id="username"
                        name="username"
                        type="text"
                        maxlength="50"
                        required
                        value="{{ old(
                            'username',
                            $user->username
                        ) }}"
                    >

                    @error('username')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="field">
                    <label for="full_name">
                        Full Name <span>*</span>
                    </label>

                    <input
                        id="full_name"
                        name="full_name"
                        type="text"
                        maxlength="100"
                        required
                        value="{{ old(
                            'full_name',
                            $user->full_name
                        ) }}"
                    >

                    @error('full_name')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="field avatar-field">
                    <img
                        class="avatar-preview"
                        src="{{ $avatarUrl }}"
                        alt="Current avatar of {{ $user->full_name }}"
                    >

                    <div class="avatar-input">
                        <label for="avatar">
                            Profile Picture
                        </label>

                        <input
                            id="avatar"
                            name="avatar"
                            type="file"
                            accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                        >

                        <small>
                            JPG or PNG only, maximum 2 MB.
                            Leave blank to keep the existing avatar.
                        </small>

                        @error('avatar')
                            <small class="field-error">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <a
                        class="button button-secondary"
                        href="{{ route('users.index') }}"
                    >
                        Cancel
                    </a>

                    <button class="button" type="submit">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection