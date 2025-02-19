<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Invoice #{{ $order->id }}</h1>
    <p>User: {{ $order->user->fullname }} ({{ $order->user->email }})</p>
    <p>Status: {{ ucfirst($order->status) }}</p>
    <p>Tracking Number: {{ $order->trackingNumber }}</p>

    <h2>Order Items</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Price: ${{ number_format($order->total_price, 2) }}</h3>
</body>
</html>
