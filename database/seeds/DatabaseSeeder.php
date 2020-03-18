<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ServicesListsDB::class);


        $this->call(settingsDB::class);


        $this->call(AboutUsDB::class);
        $this->call(ProtectionDB::class);
        $this->call(HelpCenterDB::class);
        $this->call(ServiceItemsDB::class);
        $this->call(CustomersServiceDB::class);
        $this->call(CustomerServiceCenterDB::class);
        $this->call(ContactUsDB::class);
        $this->call(ShowSalonDB::class);
        $this->call(HelpingPartnersDB::class);
        $this->call(HomeBackgroundDB::class);

        $this->call(AdminDB::class);
        $this->call(AdminGroupDB::class);
        $this->call(SalonsDB::class);
    }
}
