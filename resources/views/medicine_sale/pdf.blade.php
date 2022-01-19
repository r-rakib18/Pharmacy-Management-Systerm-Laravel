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
        <th>Medicine Name</th>
        <th>Unit</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($medicine_sale_list as $item)
        <tr>
            <td>{{$item->medicine->medicine_name}}</td>
            <td>{{$item->unit->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->total_price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>