<?php

namespace App\Models;

use App\Utils\LmFileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SampleCrud
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $category_id
 * @property string $category_multi_id
 * @property string $days
 * @property string $month
 * @property string $start_date
 * @property string $end_date
 * @property string $date_publisher
 * @property string $date_range_start
 * @property string $date_range_end
 * @property string $time
 * @property string $price
 * @property string $password
 * @property string $contact
 * @property string $check
 * @property string $radio
 * @property string|null $file_cover
 * @property string $summernote
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud query()
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereCategoryMultiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereDatePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereDateRangeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereDateRangeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereFileCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereRadio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereSummernote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampleCrud whereUpdatedAt($value)
 * @property-read mixed $file
 * @property-read mixed $files
 * @property-read mixed $thumb
 * @property-read mixed $thumbs
 * @mixin \Eloquent
 */
class SampleCrud extends Model
{
    use LmFileTrait;
    use HasFactory;
    protected $table = 'sample';
    protected $guarded = [];
    
 
  


}
