<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ApplicationFilter extends AbstractFilter
{
    public const CLIENT = 'client';
    public const LAWYER = 'lawyer';
    public const CATEGORY_ID = 'category_id';
    public const FOR_ONE_LAWYER = 'for_one_lawyer';
    public const FOR_ONE_CLIENT = 'for_one_client';
    public const CREATED_AT_FROM = 'created_at_from';
    public const FOR_ONE_TO = 'created_at_to';

    protected function getCallbacks(): array
    {
        return [
            self::CLIENT => [$this, 'client'],
            self::LAWYER => [$this, 'lawyer'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::FOR_ONE_LAWYER => [$this, 'forOneLawyer'],
            self::FOR_ONE_CLIENT => [$this, 'forOneClient'],
            self::CREATED_AT_FROM => [$this, 'createdAtFrom'],
            self::FOR_ONE_TO => [$this, 'createdAtTo'],
        ];
    }

    public function client(Builder $builder, $value)
    {
        $builder->where('client', $value);
    }

    public function lawyer(Builder $builder, $value)
    {
        $builder->where('lawyer', $value);
    }

    public function categoryId(Builder $builder, $value)
    {
        if ($value != 0) {
            $builder->where('category_id', $value);
        }
    }

    public function forOneLawyer(Builder $builder, $value)
    {
        $builder->where('lawyer', $value)
            ->orWhereNull('lawyer')
            ->orderByDesc('created_at');
    }

    public function forOneClient(Builder $builder, $value)
    {
        $sql = "SELECT ( SELECT t2.id FROM applications t2
                         WHERE t2.client=t1.client
                         ORDER BY random() LIMIT 1
                       ) as id
                FROM applications t1
                GROUP BY client";
        $ids = DB::select($sql);
        $result = [];
        foreach ($ids as $id) {
            $result[] = $id->id;
        }
        $builder->whereIn('id', $result)->orderByDesc('created_at');
    }

    public function createdAtFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($value)));
    }

    public function createdAtTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', date('Y-m-d H:i:s', strtotime($value)));
    }
}
