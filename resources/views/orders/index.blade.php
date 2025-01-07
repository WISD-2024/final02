<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>所有訂單</title>
</head>
<body>
    <h1>所有訂單</h1>

    <!-- 顯示訂單列表 -->
    <table>
        <thead>
            <tr>
                <th>訂單號</th>
                <th>訂單狀態</th>
                <th>訂單總額</th>
                <th>建立日期</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->status }}</td>
                    <td>${{ $order->total_amount }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
