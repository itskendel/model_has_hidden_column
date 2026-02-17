<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttachmentController extends Controller
{
    public function index()
    {
        $columns = Attachment::visibleColumns();
        $data = Attachment::select($columns)->get();

        return Inertia::render('index', [
            'columns' => $columns,
            'data' => $data,
        ]);
    }
}
