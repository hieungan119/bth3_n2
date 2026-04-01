<style>
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
</style>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Thể Loại (EN)</th>
            <th>Tên Thể Loại (VN)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $genre->genre_name }}</td>
                <td>{{ $genre->genre_name_vn }}</td>
            </tr>
        @endforeach
    </tbody>
</table>