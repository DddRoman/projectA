<?php

namespace App\Services;
use App\Models\User;
use App\Models\Industria;
use App\Models\Type;
class FactoryService
{
    public static function getRandomUserId()
    {
      return User::query()->pluck('id')->random();
    }
    public static function getRandomIndustriaId()
    {
      return Industria::query()->pluck('id')->random();
    }
    public static function getRandomIndustria0Id()
    {
      return Industria::query()->where('dependence','=',0)->pluck('id')->random();
    }
    public static function getRandomIndustria1Id($id)
    {
      if(Industria::query()->where('dependence','=',$id)->count()>0)
      return Industria::query()->where('dependence','=',$id)->pluck('id')->random();
      else return $id;
    }
    public static function getRandomTypeId($id)
    {
      if(Type::query()->where('dependence','=',$id)->count()>0)
      return Type::query()->where('dependence','=',$id)->pluck('id')->random();
      else return $id;
    }
}
