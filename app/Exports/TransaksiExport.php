<?php

namespace App\Exports;

use App\Models\Transaksi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::select(
            'history.id',
            'history.id_unik',
            'kupon.kodeunik',
            'users.name as name',
            'users.outlet',
            'history.jenis_mitra',
            'history.nama_user',
            'history.no_hp',
            'kupon.expired_at',
            'history.created_at',
            'history.updated_at',
        )
            ->join('users', 'users.id', '=', 'history.id_user')
            ->join('kupon', 'kupon.id', '=', 'history.id_kupon')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID Unik',
            'Kode Unik',
            'Nama Admin',
            'Outlet',
            'Jenis Mitra',
            'Nama Customer',
            'No HP',
            'Expired',
            'Dibuat pada',
            'Terakhir Update',
        ];
    }
}
