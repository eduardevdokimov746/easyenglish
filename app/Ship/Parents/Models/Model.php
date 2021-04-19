<?php

namespace App\Ship\Parents\Models;

use Apiato\Core\Abstracts\Models\Model as AbstractModel;
use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Carbon\Carbon;

/**
 * Class Model.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Model extends AbstractModel
{
    use HashIdTrait;
    use HasResourceKeyTrait;

    protected function dateFormat($date)
    {
        try{
            return Carbon::createFromFormat('Y-m-d h:i:s', $date)->format('h:m d.m.Y');
        }catch (\Exception){
            return $date;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return $this->dateFormat($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->dateFormat($value);
    }
}
