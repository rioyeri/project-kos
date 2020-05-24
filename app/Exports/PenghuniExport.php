<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenghuniExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function startCell()
    {
        return 'A3';
    }

    public function headings(): array
    {
        return [
            'No',
            'No Identitas',
            'Nama',
            'Jenis Kelamin',
            'Nomor HP',
            'Alamat',
            'Dokumen',
        ];
    }
}
