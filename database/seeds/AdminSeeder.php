<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Faker\Factory;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Admin $admin)
    {
        //使用faker生成拟真数据
        $faker = Factory::create('zh_CN');
        for($i=1; $i<10; $i++){
            $admin->create([
                'username'=>$faker->name,
                'password'=>bcrypt('123456'),
                'email' =>$faker->email,
                'mobile'  => $faker->phoneNumber,
                'role_id' => mt_rand(1,5),
                'note'=>'123'
            ]);
        }
    }
}
