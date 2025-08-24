<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Tasks\DeleteTitlelessImages;

Schedule::call(new DeleteTitlelessImages)->everyThirtySeconds();