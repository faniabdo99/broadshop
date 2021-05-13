<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;
    protected $guarded = [];
    public function getImageSrcAttribute(){
        return url('storage/app/public/categories/'.$this->image);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
