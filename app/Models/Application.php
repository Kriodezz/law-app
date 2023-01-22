<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    const STATUS_NEW = 1;
    const STATUS_WORK = 2;
    const STATUS_COMPLETE = 3;

    public static function getStatus(): array
    {
        return [
            self::STATUS_NEW => 'Новая',
            self::STATUS_WORK => 'В работе',
            self::STATUS_COMPLETE => 'Завершена',
        ];
    }

    protected $table = 'applications';
    protected $guarded = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
