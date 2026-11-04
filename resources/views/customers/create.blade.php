@extends('layouts.app')

@section('content')
    <div class="form-shell">
        <section class="form-intro">
            <span class="eyebrow">Customer management</span>
            <h1>Create Customer</h1>

            <p>
                Enter the customer's account information.
            </p>

            <a
                class="back-link"
                href="{{ route('customers.index') }}"
            >
                &larr; Back to customers
            </a>
        </section>

        <section class="form-card">
            <h2>Customer Details</h2>

            <form
                method="POST"
                action="{{ route('customers.store') }}"
            >
                @csrf

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

                <div class="field">
                    <label for="email">
                        Email <span>*</span>
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        maxlength="100"
                        required
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="field">
                    <label for="phone">Phone</label>

                    <input
                        id="phone"
                        name="phone"
                        type="text"
                        maxlength="20"
                        value="{{ old('phone') }}"
                    >

                    @error('phone')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="form-actions">
                    <a
                        class="button button-secondary"
                        href="{{ route('customers.index') }}"
                    >
                        Cancel
                    </a>

                    <button class="button" type="submit">
                        Create Customer
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection