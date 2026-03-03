<?php

namespace App\Http\Controllers;

use App\Models\ModelHasHiddenColumn;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class VisibleColumnController extends Controller
{
    public function get_visible_column($model_class_name = 'Attachment')
    {
        if ($model_class_name == null) {
            abort(404, 'Check your parameter');
        }

        try {
            $path = storage_path('app/configurable_table/attachment.json');

            if (!file_exists($path)) {
                abort(404, 'JSON file not found.');
            }

            $attachment_json = json_decode(file_get_contents($path), true);
            $hidden_columns = ModelHasHiddenColumn::where('model', $model_class_name)
                ->where('is_visible', false)
                ->pluck('column');

            $accessor_key = collect($attachment_json)
                ->whereNotIn('db_column', $hidden_columns)
                ->pluck('accessor_key');

            return $accessor_key ?? [];
        } catch (\Throwable $th) {
            return [];
        }
    }
}
