<?php
use App\Category;
use App\Product;
use App\User;
use App\Company;
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
        // $this->call(UsersTableSeeder::class);
        Company::create([
            'id'=>'1',
            'company_name'=>'Kerry  Express'
        ]);
        Company::create([
            'id'=>'2',
            'company_name'=>'Thai Post'
        ]);
        Company::create([
            'id'=>'3',
            'company_name'=>'DHL'
        ]);
        User::create([
        	'name'=>'admin',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'is_admin'=>1
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 1',
        	'email'=>'test1@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 2',
        	'email'=>'test2@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 3',
        	'email'=>'test3@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 4',
        	'email'=>'test4@outlook.co.th',
        	'password'=>bcrypt('123456789'),
        	'is_admin'=>0
        ]);
    }
}
