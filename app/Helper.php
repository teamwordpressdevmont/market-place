<?php

namespace App;

trait Helper
{
    public function getFullImageUrl($folder, $image)
    {
        return url("public/storage/" . trim($folder, '/') . '/' . ltrim($image, '/'));
    }
}