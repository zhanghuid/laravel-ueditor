<?php

use Huid\LaravelUeditor\Http\Controllers\LaravelUeditorController;

Route::any('/ueditor/serve', LaravelUeditorController::class.'@serve');
