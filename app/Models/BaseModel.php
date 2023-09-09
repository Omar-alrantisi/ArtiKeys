<?php
namespace App\Models;
use App\Models\Traits\RelationHasMany;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use RelationHasMany;

    public static function boot() {
        parent::boot();

        static::deleted(function($item) {
            $relationMethods = $item->relationships();
            foreach($relationMethods as $relationMethod){
                $relationMethod->invoke($item)->delete();
            }
        });
    }
}
