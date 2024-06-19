<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use App\Models\Role; // Pastikan namespace untuk kelas Role diatur dengan benar
use App\Models\User; // Jika digunakan dalam seeder
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $ownerRole = Role::create(['name' => 'owner']);
        $studentRole = Role::create(['name' => 'student']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $userOwner= User::create([
            'name' => 'Angga',
            'occupation' => 'Educator',
            'avatar' => 'iamges/default-avatar.png',
            'email' => 'angga@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $userOwner->assignRole($ownerRole);
    }
}
