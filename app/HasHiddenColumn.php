<?php

namespace App;

use App\Models\ModelColumnSetting;
use Illuminate\Support\Facades\Schema;

trait HasHiddenColumn
{
    public static function visibleColumns()
    {
        $instance = new static;
        $class_name = class_basename($instance);
        $model = app("App\\Models\\{$class_name}");
        $model_columns = Schema::getColumnListing($model->getTable());

        $hidden_columns = ModelColumnSetting::where('model', $class_name)
            ->pluck('column')
            ->toArray();

        $visible_columns  = array_diff($model_columns, $hidden_columns);

        return empty($visible_columns)
            ? $model_columns
            : array_values($visible_columns);
    }
}
