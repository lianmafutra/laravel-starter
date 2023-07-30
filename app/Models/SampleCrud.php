<?php

namespace App\Models;

use App\Utils\DateUtils;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleCrud extends Model
{
    use HasFactory;
    protected $table = 'sample';
    protected $guarded = [];
    
    // global setter date format
    public function setAttribute($key, $value)
    {
       if (in_array($key, ['date_publisher','start_date','end_date'])) {
          $this->attributes[$key] = DateUtils::format($value);
          return $this;
       }
       return parent::setAttribute($key, $value);
    }

  


}
