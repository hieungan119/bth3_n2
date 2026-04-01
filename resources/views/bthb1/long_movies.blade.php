<h1>10 bộ phim có thời lượng lớn hơn 120 phút</h1>
<table border="1" style="width:100%; border-collapse: collapse;">
    <tr style="background-color: #eee;">
        <th>STT</th>
        <th>Tên phim</th>
        <th>Ngày phát hành</th>
        <th>Thời lượng (phút)</th>
    </tr>
    @foreach($movies as $movie)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $movie->movie_name }}</td>
        <td>{{ $movie->release_date }}</td>
        <td>{{ $movie->runtime }}</td>
    </tr>
    @endforeach
</table>