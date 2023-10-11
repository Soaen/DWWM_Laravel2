<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImgController extends Controller
{
    public function getImage(string $firstname, string $lastname,string $maxSize) {
        if($maxSize > 256) { $maxSize =256;}
        if($maxSize < 24) { $maxSize = 24;}
        return "<img src='https://ui-avatars.com/api/?name=$firstname+$lastname&size=$maxSize'>";
    }
}
