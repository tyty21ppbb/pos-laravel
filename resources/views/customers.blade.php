@extends('layouts.app')

@section('content')
    <section>
        <p>Account management</p>

        <h1>Customer Accounts</h1>

        <p>
            {{ count($customers) }} customer records retrieved
            from a temporary PHP array.
        </p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer['id'] }}</td>
                            <td>{{ $customer['full_name'] }}</td>
                            <td>{{ $customer['email'] }}</td>
                            <td>{{ $customer['phone'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection