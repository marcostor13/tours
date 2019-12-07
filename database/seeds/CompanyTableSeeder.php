<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Company();
        $role->name = 'Company1';
        $role->save();  
        $role = new Company();
        $role->name = 'Company2';
        $role->save();    
    }
}
