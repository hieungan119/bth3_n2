<x-book-layout>
<x-slot name='title'>
    Sách
</x-slot>

<style>
  .info {
    display:grid;
    grid-template-columns: 30% 70%;
  }
  .book
            {
                position:relative;
                margin:10px;
                text-align:center;
                padding-bottom:35px;
            }
           .btn-add-product
            { 
                position:absolute;
                bottom:0;
                width:100%;
            }

</style>

<h4>{{$data->tieu_de}}</h4>
<div class='info'> 
  <div>
    <img src="{{asset('book_image/'.$data->file_anh_bia)}}" width="200px" height="200px">
  </div>
  <div>
    Nhà cung cấp: <b>{{$data->nha_cung_cap}}</b><br>
    Nhà xuất bản: <b>{{$data->nha_xuat_ban}}</b><br>
    Tác giả: <b>{{$data->tac_gia}}</b><br>
    Hình thức bìa: <b>{{$data->hinh_thuc_bia}}</b><br>
  
    <div class='mt-1'>
        Số lượng mua: 
        <input type='number' id='product-number' size='5' min="1" value="1"> 
        <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>Thêm vào giỏ hàng</button>
    </div>
  </div>
</div>

<div class='row'> 
  <div class='col-sm-12'>
    <b>Mô tả:</b><br>
    {{$data->mo_ta}}
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#add-to-cart").click(function(){
            var id = "{{$data->id}}"; // Lấy ID của sách hiện tại
            var num = $("#product-number").val(); // Lấy số lượng người dùng nhập
            
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('cartadd')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "num": num
                },
                success: function(data){
                    // Cập nhật số hiển thị trên biểu tượng giỏ hàng ở menu
                    $("#cart-number-product").html(data);
                    alert("Đã thêm vào giỏ hàng thành công!");
                },
                error: function(xhr, status, error){
                    console.error(error);
                    alert("Có lỗi xảy ra, vui lòng thử lại.");
                }
            });
        });
    });
</script>

</x-book-layout>