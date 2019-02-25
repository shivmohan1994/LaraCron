<?php
namespace App\UserCustom;

use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\salaryUpdate;

class SendMail{
    public function updateCronSalary($user, $increment, $salary){
        Mail::to($user->email)->send(new salaryUpdate($user, $increment, $salary));
    }
}
