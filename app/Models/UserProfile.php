<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UserProfile extends BaseModel {
    protected $table = 'user_profiles';
    protected $fillable = ['name','bio','user_id', 'uuid', 'avatar'];

    public function owner(): BelongsTo {
        return $this->belongsTo(related:User::class, foreignKey:'user_id');
    }
}