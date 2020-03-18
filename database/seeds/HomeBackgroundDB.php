<?php

use Illuminate\Database\Seeder;
use App\Model\HomeBackground;

class HomeBackgroundDB extends Seeder

{
    public function run()
    {
        $data['img_ar'] = "";
        $data['img_en'] = "";
        $data['text_ar'] = " وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه";
        $data['text_en'] = " software like Aldus PageMaker including versions of Lorem Ipsum";
        HomeBackground::create($data);

    }
}


