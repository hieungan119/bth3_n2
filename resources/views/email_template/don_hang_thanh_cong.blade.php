<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h3>ĐẶT HÀNG THÀNH CÔNG</h3>

    <p>Bạn đã đặt hàng thành công. Thông tin đơn hàng gồm:</p>

    <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
        </tr>

        @foreach($data as $item)
            <tr>
                <td>{{ $item->tieu_de }}</td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ $item->don_gia }}</td>
            </tr>
        @endforeach
    </table>

    <br>
    Trân trọng!
</body>
</html>