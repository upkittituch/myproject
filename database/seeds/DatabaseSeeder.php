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
        Category::create([
            'id'=>'1',
            'name'=>'coffee'
        ]);
        Category::create([
            'id'=>'2',
            'name'=>'t-shirt'
        ]);
        Category::create([
            'id'=>'3',
            'name'=>'polo'
        ]);
        Category::create([
            'id'=>'4',
            'name'=>'vest'
        ]);
        Product::create([
            'name'=>'shirt 1 ',
            'desc'=>'shirt number 1',
            'image'=>'product/gKs38RYm33U2XUcjRUt9L4fAOeyzlWYaMSRCB1tt.jpeg',
            'price'=>'100',
            'category_id'=>'1'
        ]);
        Product::create([
            'name'=>'shirt 2 ',
            'desc'=>'shirt number 2',
            'image'=>'product/qSl0ePTS4D3eGVeGiH8iiGZltgNAqhnTFgLMg9Hn.jpeg',
            'price'=>'120',
            'category_id'=>'1'
        ]);
        Product::create([
            'name'=>'shirt 3',
            'desc'=>'shirt number 3',
            'image'=>'product/dEZDiVlIUkW72cCaHPJDJCV9F1iXYjjK1yhhI3a2.jpeg',
            'price'=>'200',
            'category_id'=>'1'
        ]);
        Product::create([
            'name'=>'t-shirt 1',
            'desc'=>'t-shirt number 1',
            'image'=>'product/ElpctDtVqfquOSFEodG1Rqgmu3UCysaGag0QfYfZ.jpeg',
            'price'=>'160',
            'category_id'=>'2'
        ]);
        Product::create([
            'name'=>'t-shirt 2',
            'desc'=>'t-shirt number 2',
            'image'=>'product/K23GjMhGsbosKQj5pBx6I3p9Q2KtbysAYabhb2tP.jpeg',
            'price'=>'150',
            'category_id'=>'2'
        ]);
        Product::create([
            'name'=>'t-shirt 3',
            'desc'=>'t-shirt number 3',
            'image'=>'product/qM2MQ2MkJ5kCFTtoQFFrn0kHyDm1rdixmkBtCRPK.jpeg',
            'price'=>'100',
            'category_id'=>'2'
        ]);
        Product::create([
            'name'=>'polo 1',
            'desc'=>'polo number 1',
            'image'=>'product/NNH8WFqELGXPZOqQvJ1Jrkgm98emjnjnlFz7jETk.jpeg',
            'price'=>'190',
            'category_id'=>'3'
        ]);
        Product::create([
            'name'=>'polo 2',
            'desc'=>'polo number 2',
            'image'=>'product/B0hQ7jHZcuD0LBQjpX9SkHbBmQxqxhJ1Qh2OviEj.jpeg',
            'price'=>'200',
            'category_id'=>'3'
        ]);
        Product::create([
            'name'=>'polo 3',
            'desc'=>'polo number 3',
            'image'=>'product/QbziczuyMxgY0itGG8oL0djwEMLyOPK2EGnWZ6a9.jpeg',
            'price'=>'170',
            'category_id'=>'3'
        ]);
        Product::create([
            'name'=>'vest 1',
            'desc'=>'vest number 1',
            'image'=>'product/plIrvRothkUjGw4YGapnzl6p41iNdClIoyxA3gNN.jpeg',
            'price'=>'160',
            'category_id'=>'4'
        ]);
        Product::create([
            'name'=>'vest 2',
            'desc'=>'vest number 2',
            'image'=>'product/R5k9B0XWkYPtRgC2N87pO47MhmS0R6M1mXyHPPgF.jpeg',
            'price'=>'160',
            'category_id'=>'4'
        ]);
        Product::create([
            'name'=>'vest 3',
            'desc'=>'vest number 3',
            'image'=>'product/tNXgPu6QEmzFt2M8J5BGNmQsGDtJygFDehAZifG9.jpeg',
            'price'=>'150',
            'category_id'=>'4'
        ]);
        


        

        User::create([
        	'name'=>'admin',
        	'email'=>'up.ktt1996@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>1
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 1',
        	'email'=>'upktt.rom6@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 2',
        	'email'=>'upktt.rom8@gmail.com',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 3',
        	'email'=>'',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>0
        ]);
        User::create([
        	'name'=>'Kittituch manisarangkul 4',
        	'email'=>'upgamer@outlook.co.th',
        	'password'=>bcrypt('123456789'),
        	'email_verified_at'=>NOW(),
        	'is_admin'=>0
        ]);
    }
}
