<?php

namespace App\Models\MoneyManagement;

use App\Traits\Uuid;
use App\Traits\Audit;
use App\Models\UserManagement\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyManagement\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory, Audit, Uuid;

    protected $table = 'incomes';

    /**
     * Get the user that owns the Income
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the Income
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
