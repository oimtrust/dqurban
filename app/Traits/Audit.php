<?php 
namespace App\Traits;

use App\Models\UserManagement\User;

trait Audit
{
    protected static function bootAudit()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? null;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id ?? null;
        });
        
        static::deleting(function ($model) {
            $model->deleted_by = auth()->user()->id ?? null;
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
?>