@extends('layouts.app')

@section('content')
    <section class="hero">
        <span class="eyebrow">
            Point of Sale Account Management
        </span>

        <h1>Welcome to BINIPOS</h1>

        <p>
            Manage customer and user accounts through this
            Laravel POS application.
        </p>

        <div class="hero-actions">
            <a
                class="button"
                href="{{ route('customers.index') }}"
            >
                View Customers
            </a>

            <a
                class="button button-secondary"
                href="{{ route('users.index') }}"
            >
                View Users
            </a>
        </div>
    </section>
@endsection