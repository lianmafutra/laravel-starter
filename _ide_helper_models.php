<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string|null $file_id
 * @property int $model_id
 * @property string $name_origin
 * @property string $name_hash
 * @property string $path
 * @property string $mime
 * @property string|null $size
 * @property string|null $desc
 * @property int|null $order
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $file_url
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereNameHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereNameOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PermissionGroup
 *
 * @property int $id
 * @property string|null $desc
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereUpdatedAt($value)
 */
	class PermissionGroup extends \Eloquent {}
}

namespace App\Models{
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
 */
	class SampleCrud extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $name
 * @property string $type
 * @property string|null $ext
 * @property string|null $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string|null $nama_lengkap
 * @property string|null $kontak
 * @property string|null $alamat
 * @property string|null $bio
 * @property string|null $jenis_kelamin
 * @property string|null $status
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $nama
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File $file_foto
 * @property-read mixed $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

