<?php

namespace App\Services;
use App\Models\User;
use App\Models\Industria;
use App\Models\Structure;
use App\Models\Position;
use App\Models\Docs;
use App\Models\DocText;
use App\Models\DocVersion;
use App\Models\DocVerification;
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
    public static function getRandomStructureId($ind)
    {
      if(Structure::where('ind_id','=',$ind)->count()==0)
        return 0;
      else
        return Structure::query()->where('ind_id','=',$ind)->pluck('id')->random();
    }
    public static function getRandomStructure0Id()
    {
        return Structure::query()->pluck('id')->random();
    }
    public static function getRandomPositionId($ind)
    {
      if(Position::where('struct_id','=',$ind)->count()==0)
        return 0;
      else
        return Position::query()->where('struct_id','=',$ind)->pluck('id')->random();
    }
    public static function getRandomTypeId($id)
    {
      if(Type::query()->where('dependence','=',$id)->count()>0)
      return Type::query()->where('dependence','=',$id)->pluck('id')->random();
      else return $id;
    }
    public static function getRandomDocsId()
    {
        return Docs::query()->pluck('id')->random();
    } 
    public static function getRandomDocVersionId()
    {
        return DocVersion::query()->pluck('id')->random();
    } 
    public static function getRandomDocVerificationId()
    {
        return DocVerification::query()->pluck('id')->random();
    } 
    public static function getRandomDocTextId($id_doc)
    {
      if(DocText::query()->where('doc_version_id','=',$id_doc)->count()>0)
      return DocText::query()->where('doc_version_id','=',$id_doc)->pluck('id')->random();
      else return 0;
    }
}
