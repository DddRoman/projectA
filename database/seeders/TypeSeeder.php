<?php

namespace Database\Seeders;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $mass=[
        ['dependence'=>0,
        'name'=>'industria',
        'abv'=>'ind',
        'discription'=>'industria',],
        ['dependence'=>1,
        'name'=>'ofice',
        'abv'=>'ofc',
        'discription'=>'ofice',],
        ['dependence'=>1,
        'name'=>'maneger',
        'abv'=>'mng',
        'discription'=>'maneger',],
        ['dependence'=>1,
        'name'=>'shop',
        'abv'=>'shp',
        'discription'=>'shop',],
        ['dependence'=>1,
        'name'=>'department',
        'abv'=>'dep',
        'discription'=>'department',],
       ];
       foreach($mass as $type){
        Type::create($type);
       }
    }
}
