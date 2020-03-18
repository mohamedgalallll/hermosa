<?php

use Illuminate\Database\Seeder;
use App\Model\ServiceList;

class ServicesListsDB extends Seeder

{
    public function run()
    {
        $data['name_en'] = "Skin Care";
        $data['name_ar'] = "عناية بالجلد";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);


        $data['name_en'] = "Face";
        $data['name_ar'] = "الوجه";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);

        $data['name_en'] = "Body";
        $data['name_ar'] = "الجسد";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);


        $data['name_en'] = "Hair";
        $data['name_ar'] = "الشعر";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);

        $data['name_en'] = "Mask";
        $data['name_ar'] = "ماسكات";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);

        $data['name_en'] = "MakeUp";
        $data['name_ar'] = "مكياج";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);

        $data['name_en'] = "Nails";
        $data['name_ar'] = "الاظافر";
        $data['description_en'] = "";
        $data['description_ar'] = "";
        ServiceList::create($data);



    }
}


