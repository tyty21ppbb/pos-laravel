@extends('layouts.app')

@section('content')
    <section class="hero">
        <p>Point of Sale Account Management</p>

        <h1>Welcome to BINIPOS</h1>

        <p>
            View temporary customer and user account records
            through this Laravel application.
        </p>

        <a
            class="button"
            href="{{ route('customers.index') }}"
        >
            View Customers
        </a>

        <a
            class="button"
            href="{{ route('users.index') }}"
        >
            View Users
        </a>
    </section>
@endsection