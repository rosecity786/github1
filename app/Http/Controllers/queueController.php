<?php

namespace App\Http\Controllers;

use App\Mail\QueueMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class queueController extends Controller
{
    public function index(){
        
        Mail::to('imran.khaliq052@gmail.com')->send(new QueueMailable());
        return "mail is done";
    }
}

