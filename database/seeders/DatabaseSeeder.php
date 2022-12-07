<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email','=','admin@admin')->count()==0){
            User::create([
                'name' => 'admin',
                'email' => 'admin@admin',
                'email_verified_at' => now(),
                'password' => Hash::make('Qwerty123'), // password
                'remember_token' => Hash::make(Str::random(10)),
            ]);
        }
        if(Type::all()->count()==0){
            $mass=[
                ['dependence'=>0,'name'=>'idustry', 'discription'=>'',],
            ['dependence'=>1,'name'=>'office', 'discription'=>'',],
            ['dependence'=>1,'name'=>'industry', 'discription'=>'',],
            ['dependence'=>1,'name'=>'shop', 'discription'=>'',],
            ['dependence'=>1,'name'=>'project', 'discription'=>'',],
            ['dependence'=>1,'name'=>'market', 'discription'=>'',],
            ['dependence'=>1,'name'=>'manager', 'discription'=>'',],
            ];
            foreach($mass as $type){
            Type::create($type);
            }
        }
         \App\Models\User::factory(100)->create();
         \App\Models\Industria::factory(100)->create();
         \App\Models\Type::factory(100)->create();
         \App\Models\Structure::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
