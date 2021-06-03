<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'founded', 'description'];

    protected $table = 'cars';

    protected $primaryKey = 'id';

    public function carModel()
    {
        return $this->hasMany(CarModel::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    public function engines()
    {
        return $this->hasManyThrough(
                Engine::class,
                CarModel::class,
                    'car_id', // Foreign key on CarModel table
                    'model_id'// Foreign key on Engine table
                );
    }

    // Define a has one through relationship
    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
                'car_id',
                'model_id'
            );
    }

}
