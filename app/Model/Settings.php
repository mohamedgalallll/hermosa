<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;
    protected $appends = ['main_logo'];
    protected $fillable = [
        'title_ar',
        'title_en',
        'fullName',
        'address',
        'mail',
        'mobileNumber',
        'fax',
        'facebookUrl',
        'googleUrl',
        'linkedInUrl',
        'twitterUrl',
        'instagramUrl',
        'youtubeUrl',
        'gitHupUrl',
        'logo',
        'footerLogo',
        'icon',
        'keyWords_ar',
        'keyWords_en',
        'siteDescription_ar',
        'siteDescription_en',
    ];

    public function getMainLogoAttribute()
    {
        $attribute = '';
        if (!empty($this->logo)){
            $attribute =url('storage' .$this->logo) ;
        }else{
            $attribute = url("design/admin/img/logo.png");
        }
        return $attribute;
    }
    public function getMainFooterLogoAttribute()
    {
        $attribute = '';
        if (!empty($this->footerLogo)){
            $attribute =url('storage' .$this->footerLogo) ;
        }else{
            $attribute = url("design/admin/img/footer_logo.png");
        }
        return $attribute;
    }

    public function getMainIconAttribute()
    {
        $attribute = '';
        if (!empty($this->icon)){
            $attribute =url('storage' .$this->icon) ;
        }else{
            $attribute = url("design/admin/img/icon.png");
        }

        return $attribute;
    }

    public function getSiteDescriptionAttribute(){
        $attribute='';
        if (session('lang' )){
            if (session('lang' ) == 'en'){
                $attribute=$this->siteDescription_ar;
            }elseif (session('lang' ) == 'ar'){
                $attribute=$this->siteDescription_en;
            }
        }else{
            $attribute=$this->siteDescription_en;
        }

        return $attribute;
    }

    public function getSiteKeyWordsAttribute(){
        $attribute='';
        if (session('lang' )){
            if (session('lang' ) == 'en'){
                $attribute=$this->keyWords_ar;
            }elseif (session('lang' ) == 'ar'){
                $attribute=$this->keyWords_en;
            }
        }else{
            $attribute=$this->keyWords_en;
        }

        return $attribute;
    }

    public function getSiteTitleAttribute(){
        $attribute='';
        if (session('lang' )){
            if (session('lang' ) == 'en'){
                $attribute=$this->title_en;
            }elseif (session('lang' ) == 'ar'){
                $attribute=$this->title_ar;
            }
        }else{
            $attribute=$this->title_en;
        }
        return $attribute;
    }


}
