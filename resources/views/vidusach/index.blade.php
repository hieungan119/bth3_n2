<x-book-layout>
    <x-slot name='title'>Sách</x-slot>

    <div class='list-book'>
        @foreach($data as $row)
            <div class='book' style="margin-bottom: 20px; text-align: center;">
                <a href="{{ url('sach/chitiet/'.$row->id) }}">
                    <img src="{{ asset('images/'.$row->file_anh_bia) }}" width='200px' height='200px'><br>
                    <b>{{ $row->tieu_de }}</b><br/>
                    <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                </a>

                <div class='btn-add-product' style="margin-top: 10px;">
                    <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{ $row->id }}">
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".add-product").click(function() {
                var id = $(this).attr("book_id");
                var num = 1;

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('cartadd') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "num": num
                    },
                    success: function(data) {
                        // Cập nhật con số trên icon giỏ hàng
                        $("#cart-number-product").html(data);
                        alert("Đã thêm vào giỏ hàng thành công!");
                    },
                    error: function() {
                        alert("Lỗi: Vui lòng kiểm tra lại kết nối hoặc đăng nhập.");
                    }
                });
            });
        });
    </script>
</x-book-layout>