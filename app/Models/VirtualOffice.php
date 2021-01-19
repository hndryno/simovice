<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualOffice extends Model
{
    use HasFactory;

    protected $table = 'virtual_offices';

    protected $fillable = ['company_id','pic','email','telepon', 'harga_vo', 'tanggal_aggrement', 'tanggal_selesai', 'fasilitas_meeting_room', 'fasilitas_konsultasi_pajak', 'fasilitas_private_office', 'papan_nama_perusahaan'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
