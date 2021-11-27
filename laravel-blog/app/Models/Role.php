<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package App\Models
 */
class Role extends SpatieRole
{
    use HasFactory;
}
