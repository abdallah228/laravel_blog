<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Setting::create([


            'site_name'=>'abdallah',
            'contact_number'=>'01288587519',
            'contact_email'=>'abdallahkhalid228@yahoo.com',
            'address'=>'cairo',

        ]);

        	



    
    }
}
