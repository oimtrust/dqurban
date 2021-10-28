<?php

namespace App\Models\MoneyManagement;

use App\Traits\Uuid;
use App\Traits\Audit;
use App\Models\MoneyManagement\Income;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Uuid, Audit;

    /**
     * Get all of the incomes for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomes()
    {
        return $this->hasMany(Income::class, 'category_id');
    }
}
