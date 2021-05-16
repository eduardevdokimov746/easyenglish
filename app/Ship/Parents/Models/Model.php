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

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('H:i d.m.Y');
    }

    public function formatDate($dateTime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('H:i d.m.Y');
    }

    public function getShowCreatedAtAttribute()
    {
        if (empty($this->attributes['created_at'])) {
            return '';
        }

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('H:i d.m.Y');
    }

    public function getShowUpdatedAtAttribute()
    {
        if (empty($this->attributes['updated_at'])) {
            return '';
        }

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('H:i d.m.Y');
    }

    public function getDateIsoFormat($dateTime)
    {
        if (empty($dateTime)) {
            return '';
        }

        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->isoFormat('dddd, D MMMM YYYY, H:mm');
    }
}
