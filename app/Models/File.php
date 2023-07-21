<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;
    protected $table = 'file';
    protected $guarded = []; 
    protected $append = ['file_url'];
    protected $casts = [
      'created_at'  => 'date:d-m-Y H:m:s',
      'updated_at'  => 'date:d-m-Y H:m:s',
   ];
    public function opd() { 
      return $this->belongsTo(Pengajuan::class);
    }

    public function getFileUrlAttribute()
    {
         return url('storage/' . $this->path . '/'.$this->name_random);
    }

    public function getPath()
    {
         return $this->path . '/'.$this->name_random;
    }

    public function getFullPath()
    {
         return url('storage/' . $this->path . '/'.$this->name_random); 
    }

   
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function kanban(): BelongsTo
    {
        return $this->belongsTo(Kanban::class);
    }
 

}
