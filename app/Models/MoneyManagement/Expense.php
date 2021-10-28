<?php

namespace App\Models\MoneyManagement;

use App\Traits\Uuid;
use App\Traits\Audit;
use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyManagement\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory, Audit, Uuid;
    protected $table = 'expenses';

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
