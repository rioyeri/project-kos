<?php

namespace App\Imports;

use App\Models\Penghuni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenghuniImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tgl = date('Y-m-d', strtotime($row['tanggal_lahir']));
        return new Penghuni([
            'nama'        => $row['nama'],
            'noKTP'       => $row['no_ktp'],
            'jenisKelamin'=> $row['jenis_kelamin'],
            'tempatLahir' => $row['tempat_lahir'],
            'tanggalLahir'=> $tgl,
            'noHP'        => $row['no_hp'],
            'pekerjaan'   => $row['pekerjaan'],
            'alamatAsli'  => $row['alamat_asli']
        ]);
    }
}
