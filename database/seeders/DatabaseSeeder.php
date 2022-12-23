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
            ['dependence'=>0,'name'=>'idustry','abv'=>'', 'discription'=>'1',],
            ['dependence'=>1,'name'=>'office','abv'=>'', 'discription'=>'2',],
            ['dependence'=>1,'name'=>'industry','abv'=>'', 'discription'=>'3',],
            ['dependence'=>1,'name'=>'shop','abv'=>'', 'discription'=>'4',],
            ['dependence'=>1,'name'=>'project','abv'=>'', 'discription'=>'5',],
            ['dependence'=>1,'name'=>'market','abv'=>'', 'discription'=>'6',],
            ['dependence'=>1,'name'=>'manager','abv'=>'', 'discription'=>'7',],
            ['dependence'=>0,'name'=>'items','abv'=>'', 'discription'=>'8',],
            ['dependence'=>8,'name'=>'Title','abv'=>'', 'discription'=>'9',],
            ['dependence'=>8,'name'=>'Chapter','abv'=>'', 'discription'=>'10',],
            ['dependence'=>8,'name'=>'Paragraph','abv'=>'', 'discription'=>'11',],
            ['dependence'=>8,'name'=>'Notes','abv'=>'', 'discription'=>'12',],
            ['dependence'=>8,'name'=>'Table','abv'=>'', 'discription'=>'13',],
            
            ];
            foreach($mass as $type){
                $tp=Type::where('dependence','=',$type['dependence'])
                ->where('name','=',$type['name'])
                ->get('id');
                if($tp->count()==0)
                    Type::create($type);
                else{
                    $ttpp=Type::find($tp->id);
                    $ttpp->dependence=$type['dependence'];
                    $ttpp->name=$type['name'];
                    $ttpp->abv=$type['abv'];
                    $ttpp->discription=$type['discription'];
                    $ttpp->save();
                }
            }
        }
         \App\Models\User::factory(100)->create();
         \App\Models\Industria::factory(100)->create();
        // \App\Models\Type::factory(100)->create();
         \App\Models\Structure::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
