<?php

namespace App\Http\Controllers;
use App\Faqs;
use App\Images;
use App\Testimonys;
use App\Contents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    //

    public function getContent($ref_key, $prop){
        $content = Contents::where('ref_key', $ref_key)->first();
        return $content->$prop;
    }

    public function getImage($ref_key, $prop){
        $images = Images::where('ref_key', $ref_key)->first();
        return $images->$prop;
    }
}
