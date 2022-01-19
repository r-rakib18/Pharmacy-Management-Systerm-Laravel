<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase List PDF</title>
    <style>
        .table-custom {
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
        }

        .table-custom thead tr th {
            width: 11% !important;
            border: 1px solid #ccc;
            padding: 5px;
            white-space: nowrap;
        }

        .table-custom thead tr, .table-custom tbody tr td {
            padding: 5px;
            border: 1px solid #ccc;
        }

        .table-custom thead tr th:last-child {
            width: 5% !important;
            text-align: center;
        }

        .table-custom tbody tr td:last-child {
            text-align: center;
        }
    </style>
</head>
<body>
<table class="table-custom">
    <thead>
    <tr>
        <th>Manufacturer</th>
        <th>Purchase Date</th>
        <th>Invoice No</th>
        <th>Payment Type</th>
        <th>Medicine</th>
        <th>Batch</th>
        <th>Expire Date</th>
        <th>Unit</th>
        <th>Quantity</th>
        <th>Manufacture Price</th>
        <th>Retail Price</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchase_list as $item)
        <tr>
            <td>{{$item->medicine->manufacturer->name}}</td>
            <td>{{date('d-M-Y',strtotime($item->purchase_master_data->purchase_date))}}</td>
            <td>{{$item->purchase_master_data->invoice_no}}</td>
            <td>{{$item->purchase_master_data->payment_type == 1 ? 'Cash' : 'Due'}}</td>
            <td>{{$item->medicine->medicine_name}}</td>
            <td>{{$item->batch}}</td>
            <td>{{date('d-M-Y',strtotime($item->expire_date))}}</td>
            <td>{{$item->unit->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->manufacture_price}}</td>
            <td>{{$item->retail_price}}</td>
            <td>{{$item->total}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>