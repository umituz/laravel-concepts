<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @package App\Models
 */
class Permission extends SpatiePermission
{
    use HasFactory;
}
