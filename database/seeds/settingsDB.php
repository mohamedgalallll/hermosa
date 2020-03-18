<?php

use Illuminate\Database\Seeder;
use App\Model\Settings;
class settingsDB extends Seeder
{

    public function run()
    {

       $add = new Settings;
       $add->title_ar           = 'Arabic Title';
       $add->title_en           = 'English Title';
       $add->fullName           = 'Full Name';
       $add->address            = 'Address Here';
       $add->mobileNumber       = '01118065363';
       $add->fax                = '01118065363';
       $add->mail               = 'mail@mail.com';
       $add->facebookUrl        = 'https://facebook.com';
       $add->googleUrl          = 'https://google.com';
       $add->linkedInUrl        = 'https://linkedin.com';
       $add->twitterUrl         = 'https://twitter.com';
       $add->instagramUrl       = 'https://www.instagram.com';
       $add->youtubeUrl         = 'https://youtube.com';
       $add->gitHupUrl          = 'https://github.com/';
       $add->logo               = '';
       $add->footerLogo         = url('design/admin/img/footerLogo.png');
       $add->icon               = '';
       $add->keyWords_ar        = 'Key Word Of Your admin (Help Full With Seo)';
       $add->keyWords_en        = 'Key Word Of Your admin (Help Full With Seo)';
       $add->description_ar     = 'Description Of Your admin (Help Full With Seo)';
       $add->description_en     = 'Description Of Your admin (Help Full With Seo)';
       $add->save();
    }
}


