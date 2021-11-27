<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sepet extends Model
{
    use SoftDeletes;

    protected $table = "sepet";

    protected $guarded = [];

    const CREATED_AT = "olusturulma_tarihi";
    const UPDATED_AT = "guncellenme_tarihi";
    const DELETED_AT = "silinme_tarihi";

    public function siparis()
    {
        return $this->hasOne("App\Models\Siparis");
    }

    public static function aktif_sepet_id()
    {
        DB::table("sepet as s")
            ->leftJoin("siparis as si","si.sepet_id","s.id")
            ->where("s.kullanici_id",auth()->id())
            ->whereRaw("si.id is null")
            ->orderByDesc("s.olusturulma_tarihi")
            ->select("s.id")
            ->first();
    }

    public function sepet_urunler()
    {
        return $this->hasMany("App\Models\SepetUrun");
    }

    public function kullanici()
    {
        return $this->belongsTo("App\Models\Kullanici");
    }
}
