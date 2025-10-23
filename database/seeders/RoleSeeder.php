<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role
        $adminRole = Role::create(['name' => 'admin']);
        $kepalaRole = Role::create(['name' => 'kepala_dinas']);

        // Buat User Admin
        $admin = User::create([
            'nip' => '1234567890',
            'name' => 'Admin Sistem',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole($adminRole);

        // Buat User Kepala Dinas
        $kepala = User::create([
            'nip' => '9876543210',
            'name' => 'Kepala Dinas',
            'password' => Hash::make('kepala123'),
        ]);
        $kepala->assignRole($kepalaRole);
    }
}
