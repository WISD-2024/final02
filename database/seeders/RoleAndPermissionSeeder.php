<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // 角色                     firstOrCreate->避免重複創建
        //$admin = Role::firstOrCreate(['name' => 'admin']);
        $seller = Role::firstOrCreate(['name' => 'seller']);
        //$visitor = Role::firstOrCreate(['name' => 'visitor']);
        
        // 權限
        $viewProducts = Permission::firstOrCreate(['name' => 'view products']);
        $editProducts = Permission::firstOrCreate(['name' => 'edit products']);
        $deleteProducts = Permission::firstOrCreate(['name' => 'delete products']);
        
        // 分配權限
        //$admin->givePermissionTo($viewProducts, $editProducts, $deleteProducts);
        $seller->givePermissionTo($viewProducts, $editProducts);
        //$visitor->givePermissionTo($viewProducts);

        // 分配角色
        //$adminUser = User::find(1); 
        //$adminUser->assignRole('admin');

        $sellerUser = User::find(1); 
        $sellerUser->assignRole('seller');
        
        //$visitorUser = User::find(3); 
        //$visitorUser->assignRole('visitor');
    }
}
