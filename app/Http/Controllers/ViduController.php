<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestSendEmail;

class ViduController extends Controller
{
    public function testemail()
    {
        $user = User::find(1);

        $donHang = [
            (object)[
                'tieu_de' => 'Đảo Giấu Vàng',
                'so_luong' => 2,
                'don_gia' => 39000
            ],
            (object)[
                'tieu_de' => 'Ông Già Và Biển Cả',
                'so_luong' => 1,
                'don_gia' => 130000
            ]
        ];

        $user->notify(new TestSendEmail($donHang));

        return 'Đã gửi email test thành công';
    }
}