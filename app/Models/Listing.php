<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // if you dont want to use protected go to AppServiceProvider.php -> public function boot() 
    // type -> Model::unguard();

    // store data in the database;
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters){
        // if this is not false then move on
        // filter for tags
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // filter for search
        if($filters['searchjob'] ?? false) {
            $query->where('title', 'like', '%' . request('searchjob') . '%')
            ->orWhere('description', 'like', '%' . request('searchjob') . '%')
            ->orWhere('company', 'like', '%' .request('searchjob') . '%')
            ->orWhere('tags', 'like', '%' . request('searchjob') . '%');
        }
        if($filters['searchlocation'] ?? false) {
            $query->where('location', 'like', '%' . request('searchlocation') . '%');
        }

    }

    // relationship to user
    public function user(){
        // a listing is belong to the user_id -> table field name
        return $this->belongsTo(User::class, 'user_id');
    }
}
