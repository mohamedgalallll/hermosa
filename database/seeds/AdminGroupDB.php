<?php

use Illuminate\Database\Seeder;
use App\Model\AdminGroup;

class AdminGroupDB extends Seeder

{

    public function run()
    {
        $adminGroup['name_ar'] = 'سوبر ادمن';
        $adminGroup['name_en'] ='Super Admin';

        $adminGroup['description_ar'] = 'يملك جميع الصلاحيات ';
        $adminGroup['description_en'] = 'Have All Privilege';



        $adminGroup['settings_show'] = '1';
        $adminGroup['settings_edit'] = '1';

        $adminGroup['clients_show'] = '1';
        $adminGroup['clients_add'] = '1';
        $adminGroup['clients_edit'] =  '1';
        $adminGroup['clients_delete'] = '1';

        $adminGroup['admins_show'] = '1';
        $adminGroup['admins_add'] = '1';
        $adminGroup['admins_edit'] =  '1';
        $adminGroup['admins_delete'] =  '1';

        $adminGroup['contact_show'] =  '1';
        $adminGroup['contact_add'] = '1';
        $adminGroup['contact_edit'] =  '1';
        $adminGroup['contact_delete'] =  '1';


        $adminGroup['admin_groups_show'] =  '1';
        $adminGroup['admin_groups_add'] = '1';
        $adminGroup['admin_groups_edit'] =  '1';
        $adminGroup['admin_groups_delete'] =  '1';


        $adminGroup['categories_show'] =  '1';
        $adminGroup['categories_add'] = '1';
        $adminGroup['categories_edit'] =  '1';
        $adminGroup['categories_delete'] =  '1';

        $adminGroup['icons_show'] = '1';
        $adminGroup['icons_add'] = '1';
        $adminGroup['icons_edit'] =  '1';
        $adminGroup['icons_delete'] =  '1';
        AdminGroup::create($adminGroup);


    }
}


