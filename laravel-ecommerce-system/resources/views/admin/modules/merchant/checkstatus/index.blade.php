@extends("admin.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Status Yönetimi</h1>

    <h3 class="sub-header"> Check Status Listesi </h3>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Transaction Status</th>
                <th>Order ID</th>
                <th>Transaction ID</th>
                <th>Message</th>
                <th>Reason</th>
{{--                <th>Bank Status Code</th>--}}
{{--                <th>Bank Status Description</th>--}}
                <th>Invoice ID</th>
                <th>Total Refunded Amount</th>
                <th>Product Price</th>
                <th>Transaction Amount</th>
                <th>Ref Number</th>
                <th>Transaction Type</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $status->transaction_status }}</td>
                <td>{{ $status->order_id }}</td>
                <td>{{ $status->transaction_id }}</td>
                <td>{{ $status->message }}</td>
                <td>{{ $status->reason }}</td>
{{--                <td>{{ $status->bank_status_code }}</td>--}}
{{--                <td>{{ $status->bank_status_description }}</td>--}}
                <td>{{ $status->invoice_id }}</td>
                <td>{{ $status->total_refunded_amount }}</td>
                <td>{{ $status->product_price }}</td>
                <td>{{ $status->transaction_amount }}</td>
                <td>{{ $status->ref_number}}</td>
                <td>{{ $status->transaction_type}}</td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection
