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
 * App\Models\AssuranceJenis
 *
 * @property int $id
 * @property string $nama
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssuranceJenis whereUpdatedAt($value)
 */
	class AssuranceJenis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bidang
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bidang whereUpdatedAt($value)
 */
	class Bidang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConsultingJenis
 *
 * @property int $id
 * @property string $nama
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsultingJenis whereUpdatedAt($value)
 */
	class ConsultingJenis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string|null $file_id
 * @property int $parent_file_id
 * @property string $name_origin
 * @property string $name_random
 * @property string $path
 * @property string|null $size
 * @property string|null $desc
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $file_url
 * @property-read \App\Models\Kanban|null $kanban
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereNameOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereNameRandom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereParentFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kanban
 *
 * @property int $id
 * @property int $kanban_group_id
 * @property string|null $judul
 * @property string|null $detail
 * @property string|null $file_task
 * @property int|null $sort
 * @property string|null $verifikasi_status
 * @property \Illuminate\Support\Carbon|null $verifikasi_tgl
 * @property string|null $tgl_mulai
 * @property string|null $tgl_akhir
 * @property int|null $verifikasi_user_id
 * @property int|null $komentar_id
 * @property int $kanban_status_id
 * @property int|null $surat_masuk_id
 * @property int|null $pengawasan_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $kode
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $file_task_r
 * @property-read int|null $file_task_r_count
 * @property-read mixed $tgl_estimasi
 * @property-read \App\Models\KanbanGroup $kanban_group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Komentar> $komentar
 * @property-read int|null $komentar_count
 * @property-read \App\Models\Pengawasan|null $pengawasan
 * @property-read \App\Models\SuratMasuk|null $surat_masuk
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\User $user_verifikasi
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereFileTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereKanbanGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereKanbanStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereKomentarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban wherePengawasanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereSuratMasukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereTglAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereVerifikasiStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereVerifikasiTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kanban whereVerifikasiUserId($value)
 */
	class Kanban extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KanbanAnggota
 *
 * @property int $id
 * @property int $user_id
 * @property int $kanban_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KanbanGroup|null $kanban_group
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota whereKanbanGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanAnggota whereUserId($value)
 */
	class KanbanAnggota extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KanbanGroup
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $desc
 * @property int $bidang_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bidang $bidang
 * @property-read mixed $jumlah_anggota
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kanban> $kanban
 * @property-read int|null $kanban_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KanbanAnggota> $kanban_anggota
 * @property-read int|null $kanban_anggota_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereBidangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KanbanGroup whereUpdatedAt($value)
 */
	class KanbanGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Komentar
 *
 * @property int $id
 * @property int $user_id
 * @property int $kanban_id
 * @property string $komentar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kanban|null $kanban
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereKanbanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereKomentar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Komentar whereUserId($value)
 */
	class Komentar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pegawai
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $nip
 * @property int|null $bidang_id
 * @property string|null $gldepan
 * @property string|null $glbk
 * @property string|null $kunker
 * @property string|null $nunker
 * @property string|null $kjab
 * @property string|null $njab
 * @property string|null $neselon
 * @property string|null $ngolru
 * @property string|null $pangkat
 * @property string|null $nama_lengkap
 * @property string|null $email
 * @property string|null $kontak
 * @property string|null $alamat
 * @property string|null $jenis_kelamin
 * @property string|null $foto
 * @property string|null $status
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $foto_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereBidangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereGlbk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereGldepan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereKjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereKunker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNeselon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNgolru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNunker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereUsername($value)
 */
	class Pegawai extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengawasan
 *
 * @property int $id
 * @property string $jenis_pengawasan
 * @property int|null $kanban_group_id
 * @property string $sifat_penugasan
 * @property int|null $assurance_jenis_id
 * @property int|null $assurance_tim_id
 * @property int|null $consulting_jenis_id
 * @property \Illuminate\Support\Carbon $tgl_penugasan_mulai
 * @property \Illuminate\Support\Carbon $tgl_penugasan_selesai
 * @property string|null $detail
 * @property string $nodis_no
 * @property \Illuminate\Support\Carbon $nodis_tgl
 * @property string $nodis_uraian
 * @property string|null $file_nodis
 * @property string|null $file_pk File Program Kerja
 * @property string|null $file_pka
 * @property string $surat_tugas_no
 * @property \Illuminate\Support\Carbon $surat_tugas_tgl
 * @property string $surat_tugas_uraian
 * @property string|null $file_surat_tugas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AssuranceJenis|null $assurance_jenis
 * @property-read \App\Models\ConsultingJenis|null $consulting_jenis
 * @property-read \App\Models\File|null $file_nodis_r
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $file_pk_r
 * @property-read int|null $file_pk_r_count
 * @property-read \App\Models\File|null $file_pka_r
 * @property-read \App\Models\File|null $file_surat_tugas_r
 * @property-write mixed $lama_waktu_penugasan
 * @property-read \App\Models\SuratMasuk|null $surat_masuk
 * @property-read \App\Models\TimKerja|null $tim_kerja
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereAssuranceJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereAssuranceTimId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereConsultingJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereFileNodis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereFilePk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereFilePka($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereFileSuratTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereJenisPengawasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereKanbanGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereNodisNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereNodisTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereNodisUraian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereSifatPenugasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereSuratTugasNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereSuratTugasTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereSuratTugasUraian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereTglPenugasanMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereTglPenugasanSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengawasan whereUpdatedAt($value)
 */
	class Pengawasan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setoran
 *
 * @property-read mixed $harga
 * @property-read mixed $total_bersih
 * @property-read mixed $total_kotor
 * @property-write mixed $tgl_ambil_uang_jalan
 * @property-write mixed $tgl_muat
 * @method static \Illuminate\Database\Eloquent\Builder|Setoran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setoran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setoran query()
 */
	class Setoran extends \Eloquent {}
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
 * App\Models\SuratMasuk
 *
 * @property int $id
 * @property string|null $no_surat
 * @property \Illuminate\Support\Carbon|null $tgl_surat
 * @property string|null $uraian
 * @property int $surat_tujuan_id
 * @property string|null $file_surat_masuk
 * @property int|null $surat_tugas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File|null $file_surat_masuk_r
 * @property-read \App\Models\Pengawasan|null $surat_tugas_r
 * @property-read \App\Models\SuratTujuan $surat_tujuan
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereFileSuratMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereNoSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereSuratTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereSuratTujuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereTglSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratMasuk whereUraian($value)
 */
	class SuratMasuk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SuratTujuan
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuratTujuan whereUpdatedAt($value)
 */
	class SuratTujuan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TimKerja
 *
 * @property int $id
 * @property string|null $no_surat_tugas
 * @property int|null $user_id
 * @property int $penanggung_jawab
 * @property int|null $pengandali_teknis
 * @property int|null $ketua_tim
 * @property int|null $anggota_1
 * @property int|null $anggota_2
 * @property int|null $anggota_3
 * @property int|null $anggota_4
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereAnggota1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereAnggota2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereAnggota3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereAnggota4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereKetuaTim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereNoSuratTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja wherePenanggungJawab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja wherePengandaliTeknis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimKerja whereUserId($value)
 */
	class TimKerja extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $nip
 * @property int|null $bidang_id
 * @property string|null $gldepan
 * @property string|null $glbk
 * @property string|null $kunker
 * @property string|null $nunker
 * @property string|null $kjab
 * @property string|null $njab
 * @property string|null $neselon
 * @property string|null $ngolru
 * @property string|null $pangkat
 * @property string|null $nama_lengkap
 * @property string|null $email
 * @property string|null $kontak
 * @property string|null $alamat
 * @property string|null $jenis_kelamin
 * @property string|null $foto
 * @property string|null $status
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bidang|null $bidang
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read mixed $foto_url
 * @property-read mixed $role
 * @property-read \App\Models\KanbanAnggota|null $kanban_anggota
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBidangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGlbk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGldepan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKunker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNeselon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNgolru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNunker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

