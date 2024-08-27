<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker =Factory::create();


        $adminRole =Role::create(['name'=>'admin', 'display_name'=>'adminStator', 'description'=>'description', 'allowed_route'=>'admin',]);
        $supervisorRole =Role::create(['name'=>'supervisorRole', 'display_name'=>'supervisorRole', 'description'=>'supervisorRole', 'allowed_route'=>'admin',]);
        $customerRole =Role::create(['name'=>'customer', 'display_name'=>'customer', 'description'=>'customer', 'allowed_route'=>null,]);

        $admin =User::create([
            'first_name'=>'Admin',
            'last_name'=>'System',
            'email'=>'Admin@ecommerce.com',
            'email_verified_at'=>now() ,
            'mobile'=>'9898766',
            'password'=>bcrypt('123123'),
            'user_image'=>'avatar.svg',
            'remember_Token'=>Str::random(10),

        ]);
       $admin->attachRole($adminRole);


        $supervisore =User::create([
            'first_name'=>'supervisore',
            'last_name'=>'System',
            'email'=>'supervisore@ecommerce.com',
            'email_verified_at'=>now(),
            'mobile'=>'989876611',
            'password'=>bcrypt('123123'),
            'user_image'=>'avatar.svg',
            'status'=>'1',
            'remember_Token'=>Str::random(10),

        ]);
        $supervisore->attachRole($supervisore);


        $customer =User::create([
            'first_name'=>'Sami',
            'last_name'=>'Ali',
            'email'=>'Sami@gmail.com',
            'email_verified_at'=>now() ,
            'mobile'=>'989876622',
            'password'=>bcrypt('123123'),
            'user_image'=>'avatar.svg',
            'status'=>'1',
            'remember_Token'=>Str::random(10),

        ]);
        $customer->attachRole($customer);


        for ( $i = 1; $i <=20; $i++){

            $random_customer =User::create([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->unique()->safeEmail,
                'email_verified_at'=>now() ,
                'mobile'=>$faker->numberBetween(1000000,99999),
                'password'=>bcrypt('123123'),
                'user_image'=>'avatar.svg',
                'status'=>'1',
                'remember_Token'=>Str::random(10),

            ]);
            $random_customer->attachRole($customer);
        }

    }

}
