<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;

class MailController extends Controller
{
    public function testemail()
    {
        $user = User::find(1); // Replace with actual user retrieval logic
        Notification::send($user, new TestSendEmail());
        return "Email sent successfully!";
    }
}