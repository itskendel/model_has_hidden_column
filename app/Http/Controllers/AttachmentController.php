<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttachmentController extends Controller
{
    public function index()
    {
        $visible_controller = new VisibleColumnController;
        $visible_columns = $visible_controller->get_visible_column('Attachment');

        $data = Attachment::get();

        // return $data;


        return Inertia::render('index', [
            'columns' => $visible_columns,
            'data' => $data,
        ]);
    }
}
