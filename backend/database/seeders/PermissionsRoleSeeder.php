<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsRoleSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions'
        // $permission1 = Permission::create(['name' => 'akses_manajemen_jurusan']);
        // $permission2 = Permission::create(['name' => 'kelola_penasehat_akademik']);
        // $permission3 = Permission::create(['name' => 'kelola_tahap_skripsi']);
        // $permission4 = Permission::create(['name' => 'kelola_template_penilaian']);
        // $permission5 = Permission::create(['name' => 'kelola_template_catatan']);
        // $permission6 = Permission::create(['name' => 'kelola_template_file_registrasi']);
        // $permission7 = Permission::create(['name' => 'kelola_periode_pendaftaran']);
        // $permission8 = Permission::create(['name' => 'kelola_kepanitiaan_ujian']);
        // $permission9 = Permission::create(['name' => 'kelola_pendaftaran_ujian']);
        // $permission10 = Permission::create(['name' => 'kelola_seminar_ujian']);
        // $permission11 = Permission::create(['name' => 'kelola_yudisium_sarjana']);
        // $permission12 = Permission::create(['name' => 'kelola_artikel']);
        // $permission13 = Permission::create(['name' => 'kelola_pembimbing']);
        // $permission14 = Permission::create(['name' => 'kelola_alumni']);
        // $permission15 = Permission::create(['name' => 'kelola_predikat']);
        // $permission16 = Permission::create(['name' => 'kelola_yudisium_sarjana']);
        // $permission17 = Permission::create(['name' => 'kelola_dokumen']);
        // $permission18 = Permission::create(['name' => 'kelola_yudisium']);
        // $permission19 = Permission::create(['name' => 'kelola_rekomendasi']);
        // $permission19 = Permission::create(['name' => 'kelola_bypass']);
        // $permission19 = Permission::create(['name' => 'kelola_laporan']);
        $permission19 = Permission::create(['name' => 'kelola_revisi']);
        


        // create roles and assign existing permissions
        // $role1 = Role::create(['name' => 'admin']);
        
        // $role2 = Role::create(['name' => 'personnel']);

        // $role3 = Role::create(['name' => 'student']);

        // create demo users

        // $user = User::create([
        //     'username' => 'admin',
        //     'email' => 'admin@app.id',
        //     'password' => Hash::make('password')
        // ]);

        // $user->assignRole($role1);

        // $user = User::create([
        //     'username' => 'personil',
        //     'email' => 'personil@app.id',
        //     'password' => Hash::make('password')
        // ]);

        // $user->assignRole($role2);
        // $user->givePermissionTo($permission1);
        
        // $user = User::create([
        //     'username' => '531411130',
        //     'email' => 'student@app.id',
        //     'password' => Hash::make('password')
        // ]);

        // $user->assignRole($role3);
    }
}