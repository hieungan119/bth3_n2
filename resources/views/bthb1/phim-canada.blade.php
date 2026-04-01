<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phim của Canada</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Danh sách phim của Canada</h1>

    @if($phim->isEmpty())
        <p>Không có phim nào từ Canada trong database.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tên phim</th>
                    <th>Ngày phát hành</th>
                    <th>Thời lượng (phút)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($phim as $p)
                    <tr>
                        <td>{{ $p->movie_name }}</td>
                        <td>{{ $p->release_date }}</td>
                        <td>{{ $p->runtime }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>