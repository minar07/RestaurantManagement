<?php

use Illuminate\Database\Seeder;
use App\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'See only Listing Of User'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
            [
                'name' => 'item-list',
                'display_name' => 'Display Item Listing',
                'description' => 'See only Listing Of Item'
            ],
            [
                'name' => 'item-create',
                'display_name' => 'Create Item',
                'description' => 'Create New Item'
            ],
            [
                'name' => 'item-edit',
                'display_name' => 'Edit Item',
                'description' => 'Edit Item'
            ],
            [
                'name' => 'item-delete',
                'display_name' => 'Delete Item',
                'description' => 'Delete Item'
            ],
            [
                'name' => 'buy-list',
                'display_name' => 'Display Bought Item Listing',
                'description' => 'See only Listing Of Bought Item'
            ],
            [
                'name' => 'buy-create',
                'display_name' => 'Create Bought Item',
                'description' => 'Create New Bought Item'
            ],
            [
                'name' => 'buy-edit',
                'display_name' => 'Edit Bought Item',
                'description' => 'Edit Bought Item'
            ],
            [
                'name' => 'buy-delete',
                'display_name' => 'Delete Bought Item',
                'description' => 'Delete Bought Item'
            ],
            [
                'name' => 'sale-list',
                'display_name' => 'Display Sold Item Listing',
                'description' => 'See only Listing Of Sold Item'
            ],
            [
                'name' => 'sale-create',
                'display_name' => 'Create Sold Item',
                'description' => 'Create New Sold Item'
            ],
            [
                'name' => 'sale-edit',
                'display_name' => 'Edit Sold Item',
                'description' => 'Edit Sold Item'
            ],
            [
                'name' => 'sale-delete',
                'display_name' => 'Delete Sold Item',
                'description' => 'Delete Sold Item'
            ],
            [
                'name' => 'rawMaterial-list',
                'display_name' => 'Display Raw Material Listing',
                'description' => 'See only Listing Of Raw Material Item'
            ],
            [
                'name' => 'rawMaterial-create',
                'display_name' => 'Create Raw Material Item',
                'description' => 'Create New Raw Material Item'
            ],
            [
                'name' => 'rawMaterial-edit',
                'display_name' => 'Edit Raw Material Item',
                'description' => 'Edit Raw Material Item'
            ],
            [
                'name' => 'rawMaterial-delete',
                'display_name' => 'Delete Raw Material Item',
                'description' => 'Delete Raw Material Item'
            ],
            [
                'name' => 'sellableItem-list',
                'display_name' => 'Display Sellable Listing',
                'description' => 'See only Listing Of Sellable Item'
            ],
            [
                'name' => 'sellableItem-create',
                'display_name' => 'Create Sellable Item',
                'description' => 'Create New Sellable Item'
            ],
            [
                'name' => 'sellableItem-edit',
                'display_name' => 'Edit Sellable Item',
                'description' => 'Edit Sellable Item'
            ],
            [
                'name' => 'sellableItem-delete',
                'display_name' => 'Delete Sellable Item',
                'description' => 'Delete Sellable Item'
            ],
        	[
        		'name' => 'production-list',
        		'display_name' => 'Display Production Listing',
        		'description' => 'See only Listing Of Production Item'
        	],
        	[
        		'name' => 'production-create',
        		'display_name' => 'Create Production Item',
        		'description' => 'Create New Production Item'
        	],
        	[
        		'name' => 'production-edit',
        		'display_name' => 'Edit Production Item',
        		'description' => 'Edit Production Item'
        	],
        	[
        		'name' => 'production-delete',
        		'display_name' => 'Delete Production Item',
        		'description' => 'Delete Production Item'
        	],
            [
                'name' => 'category-list',
                'display_name' => 'Display Category Listing',
                'description' => 'See only Listing Of Category'
            ],
            [
                'name' => 'category-create',
                'display_name' => 'Create Category',
                'description' => 'Create New Category'
            ],
            [
                'name' => 'category-edit',
                'display_name' => 'Edit Category',
                'description' => 'Edit Category'
            ],
            [
                'name' => 'category-delete',
                'display_name' => 'Delete Category',
                'description' => 'Delete Category'
            ],
            [
                'name' => 'menu-list',
                'display_name' => 'Display Menu Listing',
                'description' => 'See only Listing Of Menu'
            ],
            [
                'name' => 'menu-create',
                'display_name' => 'Create Menu',
                'description' => 'Create New Menu'
            ],
            [
                'name' => 'menu-edit',
                'display_name' => 'Edit Menu',
                'description' => 'Edit Menu'
            ],
            [
                'name' => 'menu-delete',
                'display_name' => 'Delete Menu',
                'description' => 'Delete Menu'
            ]
        ];


        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
