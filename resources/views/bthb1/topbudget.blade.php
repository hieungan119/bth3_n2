<h1>Top 10 Movies có doanh thu cao nhất</h1>
<table border="1" style="width:100%; border-collapse: collapse;">
    <tr style="background-color: #d1e7dd;">
        <th>Hạng</th>
        <th>Tên phim</th>
        <th>Ngày phát hành</th>
        <th>Doanh thu</th>
    </tr>
    @foreach($phim as $index => $row)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td><strong>{{ $row->movie_name }}</strong></td>
        <td>{{ $row->release_date }}</td>
        <td>{{ number_format($row->budget) }}</td> 
    </tr>
    @endforeach
</table>