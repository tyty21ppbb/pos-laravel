@extends('layouts.app')

@section('content')
    <div class="form-shell">
        <section class="form-intro">
            <span class="eyebrow">User management</span>
            <h1>Create User</h1>

            <p>
                Create a unique account for a POS team member.
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
                action="{{ route('users.store') }}"
            >
                @csrf

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
                        value="{{ old('username') }}"
                    >

                    <small>Username must be unique.</small>

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
                        value="{{ old('full_name') }}"
                    >

                    @error('full_name')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-actions">
                    <a
                        class="button button-secondary"
                        href="{{ route('users.index') }}"
                    >
                        Cancel
                    </a>

                    <button class="button" type="submit">
                        Create User
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection