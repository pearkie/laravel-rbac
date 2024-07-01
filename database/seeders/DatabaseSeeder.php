<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Book;
use App\Models\UserInfo;
use App\Models\Permission;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $adminRole      = Role::create(['name' => 'admin']);
        $acctgRole      = Role::create(['name' => 'bookeeper']);
        $acctgAuditRole = Role::create(['name'=>'auditor']);
        $acctgAudAsstRole = Role::create(['name'=>'audasst']);
        $prodRole       = Role::create(['name' => 'assembler']);

        $createPermission = Permission::create(['name'=>'can_create']);
        $updatePermission = Permission::create(['name'=>'can_update']);
        $viewAllPermission   = Permission::create(['name'=>'can_view_all']);
        $viewDetailPermission = Permission::create(['name'=>'can_view_detail']);
        $deletePermission = Permission::create(['name'=>'can_delete']);
        $adminPermission  = Permission::create(['name'=>'can_manage']);

        $adminRole->permissions()->attach($adminPermission);
        $acctgRole->permissions()->attach($createPermission);
        $acctgRole->permissions()->attach($updatePermission);
        $acctgAuditRole->permissions()->attach($viewAllPermission);
        $acctgAuditRole->permissions()->attach($viewDetailPermission);
        $acctgAudAsstRole->permissions()->attach($viewAllPermission);
        $prodRole->permissions()->attach($viewAllPermission);
        $prodRole->permissions()->attach($createPermission);
        $prodRole->permissions()->attach($updatePermission);

        $admin = User::create(['name'=>'rab', 'password'=>'usjr1234', 'email' => 'admin@example.com']);
        $admin->roles()->attach($adminRole);

        $acctgUser = User::create(['name'=>'jcg', 'password'=>'usjr1234', 'email' => 'acctguser@example.com']);
        $acctgUser->roles()->attach($acctgRole);

        $auditorUser = User::create(['name'=>'vfp', 'password'=>'usjr1234', 'email' => 'acctgauditoruser@example.com']);
        $auditorUser->roles()->attach($acctgAuditRole);

        $auditorAsstUser = User::create(['name'=>'ldm', 'password'=>'usjr1234', 'email' => 'acctgauditorasst@example.com']);
        $auditorAsstUser->roles()->attach($acctgAudAsstRole);

        $prodUser = User::create(['name'=>'jlg', 'password'=>'usjr1234', 'email' => 'produser@example.com']);
        $prodUser->roles()->attach($prodRole);

        UserInfo::create([
            'user_firstname'=>'Roderick',
            'user_lastname'=>'Bandalan',
            'user_id'=>$admin->id
        ]);
        // $firstEmployee->user_id = $admin->id;

        UserInfo::create([
            'user_firstname'=>'Jeoffrey',
            'user_lastname'=>'Gudio',
            'user_id'=>$acctgUser->id
        ]);
        // $firstEmployee->user_id = $acctgUser->id;

        UserInfo::create([
            'user_firstname'=>'John Leeroy',
            'user_lastname'=>'Gadiane',
            'user_id'=>$prodUser->id
        ]);
        // $firstEmployee->user_id = $prodUser->id;
        UserInfo::create([
            'user_firstname'=>'Lorna',
            'user_lastname'=>'Miro',
            'user_id'=>$auditorAsstUser->id
        ]);

        UserInfo::create([
            'user_firstname'=>'Vicente',
            'user_lastname'=>'Patalita III',
            'user_id'=>$auditorUser->id
        ]);
        // $firstEmployee->user_id = $auditorUser->id;

        Book::create([
            'entry'=>'Initial Balance',
            'amount'=>2500.90,
            'user_id'=>$acctgUser->id,
        ]);

        Book::create([
            'entry'=>'Second Deposit',
            'amount'=>20025.90,
            'user_id'=>$acctgUser->id
        ]);
    }
}
