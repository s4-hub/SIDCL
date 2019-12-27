<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->username,
            $user->name,
            $user->email,
            $user->aktif,
            $user->role,
            $user->kantor->nama,
        ];
    }

    public function headings(): array
    {
        return [
            'USERNAME',
            'NAMA LENGKAP',
            'EMAIL',
            'STATUS AKTIF',
            'ROLE',
            'NAMA KANTOR',
        ];
    }    
}
