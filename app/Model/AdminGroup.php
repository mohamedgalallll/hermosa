<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',

        'settings_show',
        'settings_edit',

        'clients_show',
        'clients_add',
        'clients_edit',
        'clients_delete',

        'admins_show',
        'admins_add',
        'admins_edit',
        'admins_delete',

        'admin_groups_show',
        'admin_groups_add',
        'admin_groups_edit',
        'admin_groups_delete',

        'categories_show',
        'categories_add',
        'categories_edit',
        'categories_delete',

        'contact_show',
        'contact_add',
        'contact_edit',
        'contact_delete',

        'icons_show',
        'icons_add',
        'icons_edit',
        'icons_delete',

        ];

    public function getNameAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->name_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->name_ar;
        }
        return $attribute;
    }
}
