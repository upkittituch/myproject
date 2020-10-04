<?php
use App\Category;
use App\Product;
use App\User;
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
        Category::create([
            'name'=>'shirt'
        ]);
        Category::create([
            'name'=>'t-shirt'
        ]);
        Category::create([
            'name'=>'polo'
        ]);
        Category::create([
            'name'=>'vest'
        ]);
        

        User::create([
        	'name'=>'Kittituch',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>1
        ]);
    }
}
