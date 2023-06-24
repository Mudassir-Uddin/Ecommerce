<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(){

        return view('welcome');

    }
    public function Store(request $req){

    $req->validate([
        'fname' => 'required | max:20 | min:3',
        'lname' => 'required | max:20 | min:3',
        'age' => 'required ',
        'pass' => 'required | min:8',
        'reppass' => 'required | same:pass',
    ],
    // custom message
    [
        'required' => 'Field required he ',
        'min' => 'aap ke 3 character ki zarort hy'
    ]);

    echo $req->fname . "<br>";
    echo $req->lname . "<br>";
    echo $req->age . "<br>";
    $pass = Crypt::encryptstring($req->reppass) ;
    echo $pass . "<br>";
    echo Crypt::decryptstring($pass) ."<br>";
    if($req->img){

        $myimg = $req->img;

        $imgname = $myimg->getClientOrginalName();
        $imgname = Str::random(8) ."_____". $imgname;
        $myimg->move("images/",$imgname);
        echo $imgname;
    }


    // echo md5($req->reppass) . "<br>";


    }

}
