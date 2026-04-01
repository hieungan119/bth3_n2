<x-book-layout>
    <x-slot name='title'>Sách</x-slot>

    <div id="book-view-div"> 
        <div class='list-book'>
            @foreach($data as $row)
                <div class='book'>
                    <a href="{{url('sach/chitiet/'.$row->id)}}">
                        <img src="{{asset('images/'.$row->file_anh_bia)}}" width='200px' height='200px'><br>
                        <b>{{$row->tieu_de}}</b><br/>
                        <i>{{number_format($row->gia_ban,0,",",".")}}đ</i><br>
                    </a> 
                    <div class='btn-add-product'>
                        <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{$row->id}}">
                            Thêm vào giỏ hàng
                        </button> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".menu-the-loai").click(function(e) {
                e.preventDefault(); 
                
                var the_loai = $(this).attr("the_loai");
                
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "{{route('bookview')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "the_loai": the_loai
                    },
                    success: function(data) {
                       
                        $("#book-view-div").html(data);
                    }
                });
            });
        });
    </script>
</x-book-layout>