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
        return $date->format('h:m d.m.Y');
    }

    public function formatDate($dateTime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('h:m d.m.Y');
    }

    public function getShowCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('h:m d.m.Y');
    }

    public function getShowUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('h:m d.m.Y');
    }
}
