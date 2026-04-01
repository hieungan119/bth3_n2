<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class BookController extends Controller
{
    // 1. Trang chủ: Hiển thị 8 cuốn sách rẻ nhất
    public function listBooks()
    {
        $data = DB::table('sach')->orderBy('gia_ban', 'asc')->limit(8)->get();
        return view("vidusach.index", compact("data"));
    }

    // 2. Lọc sách theo thể loại
    public function theloai($id)
    {
        $data = DB::table('sach')->where('the_loai', $id)->get();
        return view("vidusach.index", compact("data"));
    }

    // 3. Trang chi tiết sách
    public function chitiet($id)
    {
        $data = DB::table('sach')->where('id', $id)->first();
        if (!$data) {
            return abort(404, "Không tìm thấy sách");
        }
        return view("vidusach.chitiet", compact("data"));
    }

    // 4. Xử lý Ajax thêm vào giỏ hàng
    public function cartadd(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"],
            "num" => ["required", "numeric"]
        ]);

        $id = $request->id;
        $num = (int)$request->num;
        $cart = session()->get("cart", []);

        if (isset($cart[$id])) {
            $cart[$id] += $num;
        } else {
            $cart[$id] = $num;
        }

        session()->put("cart", $cart);
        
        return response()->json(count($cart));
    }

    // 5. Trang hiển thị danh sách giỏ hàng
    public function order()
    {
        $data = []; 
        $quantity = []; 

        if (session()->has('cart')) {
            $quantity = session()->get('cart');
            $ids = array_keys($quantity); 

            if (!empty($ids)) {
                $data = DB::table("sach")
                          ->whereIn("id", $ids)
                          ->get();
            }
        }

        return view("vidusach.order", compact("data", "quantity"));
    }

    // 6. Xóa sản phẩm khỏi giỏ hàng
    public function cartdelete(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"]
        ]);
        
        $id = $request->id;
        
        if (session()->has('cart')) {
            $cart = session()->get("cart");
            
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put("cart", $cart);
            }
        }
       
        return redirect()->route('order');
    }

    // 7. Xử lý đặt hàng (Lưu vào database)
    public function ordercreate(Request $request)
    {
        $request->validate([
            "hinh_thuc_thanh_toan" => ["required", "numeric"]
        ]);

        $data = [];
        $quantity = [];

        // Kiểm tra giỏ hàng có dữ liệu mới xử lý
        if (session()->has('cart') && !empty(session('cart'))) {
            
            $order = [
                "ngay_dat_hang" => now(),
                "tinh_trang" => 1,
                "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
                "user_id" => Auth::user()->id 
            ];

            DB::transaction(function () use ($order, &$data, &$quantity) {
                // Lưu bảng don_hang và lấy ID vừa tạo
                $id_don_hang = DB::table("don_hang")->insertGetId($order);
                
                $cart = session("cart");
                $ids = array_keys($cart);
                $quantity = $cart;

                // Lấy thông tin sách để tính giá
                $data = DB::table("sach")->whereIn("id", $ids)->get();

                $detail = [];
                foreach ($data as $row) {
                    $detail[] = [
                        "ma_don_hang" => $id_don_hang,
                        "sach_id" => $row->id,
                        "so_luong" => $quantity[$row->id],
                        "don_gia" => $row->gia_ban
                    ];
                }

                // Lưu vào bảng chi tiết đơn hàng
                DB::table("chi_tiet_don_hang")->insert($detail);

                // Xóa giỏ hàng sau khi đặt thành công
                session()->forget('cart');
            });

        } else {
            // Nếu giỏ hàng rỗng quay về trang chủ
            return redirect()->route('listBooks')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        // Trả về view order để hiển thị thông báo thành công hoặc danh sách đơn
        return view("vidusach.order", compact('data', 'quantity'));
    }
}