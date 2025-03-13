<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function getFullImageUrl($folder, $image)
    {
        return url("public/storage/" . trim($folder, '/') . '/' . ltrim($image, '/'));
    }
}