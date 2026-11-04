@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div>
            <span class="eyebrow">Account management</span>
            <h1>Customer Accounts</h1>

            <p>
                Manage customer information stored in the POS
                database.
            </p>
        </div>

        <a
            class="button"
            href="{{ route('customers.create') }}"
        >
            Add Customer
        </a>
    </div>

    <section class="card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->full_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone ?? 'N/A' }}</td>

                            <td>
                                <a
                                    class="table-link"
                                    href="{{ route(
                                        'customers.edit',
                                        $customer
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
                                No customer records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection