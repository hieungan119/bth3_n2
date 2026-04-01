<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function listBooks()
    {
       $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
    return view("vidusach.index", compact("data"));
    }
    function theloai($id)
{
$data = DB::select("select * from sach where the_loai = ?",[$id]);
return view("vidusach.index", compact("data"));
}
public function chitiet($id)

{
    $data = DB::table('sach')->where('id', $id)->first();
    if (!$data) {
        return "Không tìm thấy sách ";
    }
    return view("vidusach.chitiet", compact("data"));

}
}