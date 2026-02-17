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
        $model_columns = $instance->getColumns($model);

        $hidden_columns = ModelColumnSetting::where('model', $class_name)
            ->pluck('column')
            ->toArray();

        $formatted_hidden_column = array_map(function ($column) use ($model) {
            return  $model->getTable() . '.' . $column;
        }, $hidden_columns);

        $visible_columns  = array_diff($model_columns, $formatted_hidden_column);

        return empty($hidden_columns)
            ? $model_columns
            : array_values($visible_columns);
    }

    public function getColumns($model)
    {
        $table = $model->getTable();
        $columns = Schema::getColumnListing($table);

        return array_map(function ($column) use ($table) {
            return $table . '.' . $column;
        }, $columns);
    }
}
