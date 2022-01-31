<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        // $this->call(UserSeeder::class);
        // $this->call(Disabled_daysSeeder::class);
        // \App\Models\Disabled_day::factory(100)->create();
        DB::table('users')->insert([
            'name' => 'luis',
            'email' => 'luis@gmail.com',
            'password' => Hash::make('123456luis'),
        ]);
        DB::table('users')->insert([
            'name' => 'jose',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('123456jose'),
        ]);
        DB::table('user_plans')->insert([
            'user_id' => '1',
            'renewal_price' => '30.00000'  
        ]);
        DB::table('user_plans')->insert([
            'user_id' => '2',
            'renewal_price' => '10.00000'  
        ]);
        DB::table('reservations')->insert([
            'users_plan_id' => '1',
            'reservation_start' => '2022-01-17 00:00:00',
            'reservation_end' => '2022-01-20 00:00:00',
        ]);
        DB::table('reservations')->insert([
            'users_plan_id' => '2',
            'reservation_start' => '2022-01-25 00:00:00',
            'reservation_end' => '2022-01-28 00:00:00',
        ]);
        DB::table('reservations')->insert([
            'users_plan_id' => '2',
            'reservation_start' => '2022-01-08 00:00:00',
            'reservation_end' => '2022-01-08 00:00:00',
        ]);
        DB::table('disabled_days')->insert([
            'calendar_id'=>'1',
            'day' => '2022-01-20 00:00:00',
            'enable' => '1'  
        ]);
        DB::table('disabled_days')->insert([
            'calendar_id'=>'1',
            'day' => '2022-01-27 00:00:00',
            'enable' => '1'  
        ]);
        DB::table('disabled_days')->insert([
            'calendar_id'=>'1',
            'day' => '2022-01-29 00:00:00',
            'enable' => '1'  
        ]);
        DB::table('disabled_days')->insert([
            'calendar_id'=>'1',
            'day' => '2022-01-31 00:00:00',
            'enable' => '1'  
        ]);
    }
}
