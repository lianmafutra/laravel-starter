<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
   use HasFactory;
   protected $appends = ['jumlah_model'];
   protected $guarded = [];
   

   public function categories(): HasMany
   {
      return $this->hasMany(Category::class);
   }

   public function childrenCategories(): HasMany
   {
      return $this->hasMany(Category::class)->with('categories');
     
   }

   public function getJumlahModelAttribute()
   {
       return  $this->hasMany(Category::class)->with('categories')->get()->sum('nilai');
   }


}
