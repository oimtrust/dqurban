<?php

namespace App\Models\UserManagement;

use App\Traits\Uuid;
use App\Traits\Audit;
use App\Models\UserManagement\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use Audit, Uuid, HasFactory;

    /**
     * The users that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->get()->first();
    }
}
