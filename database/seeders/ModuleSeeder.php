<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulesDefault = [
            [
                'name' => 'Dashboard',
                'level' => 0,
                'icon' => 'nav-icon fas fa-tachometer-alt'
            ],
            [
                'name' => 'Empresas',
                'level' => 0,
                'icon' => 'fas fa-building',
                'children' => true
            ],
            [
                'name' => 'Bonos y Descuentos',
                'level' => 0,
                'icon' => 'fas fa-file-signature',
                'children' => true
            ],
            [
                'name' => 'Planillas',
                'level' => 0,
                'icon' => 'fas fa-file-alt',
                'children' => true
            ],
            [
                'name' => 'Reportes',
                'level' => 0,
                'path' => '/reports',
                'icon' => 'fas fa-user-tie',
                'children' => false
            ],
            [
                'name' => 'Usuarios y Roles',
                'level' => 0,
                'icon' => 'fas fa-users-cog',
                'children' => true
            ],
            [
                'name' => 'Sistema',
                'level' => 0,
                'icon' => 'fas fa-tools',
                'children' => true
            ],
            [
                'name' => 'Roles',
                'level' => 1,
                'path' => '/roles',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 6
            ],
            [
                'name' => 'Modules',
                'level' => 1,
                'path' => '/modules',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 6
            ],
            [
                'name' => 'Usuarios',
                'level' => 1,
                'path' => '/users',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 6
            ],
            [
                'name' => 'Empresas',
                'level' => 1,
                'path' => '/companies',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 2
            ],
            [
                'name' => 'Empleados',
                'level' => 1,
                'path' => '/employees',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 2
            ],
            [
                'name' => 'Planillas',
                'level' => 1,
                'path' => '/documents',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 4
            ],
            [
                'name' => 'Detalle Planilla',
                'level' => 1,
                'path' => '/detailsheets',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 4
            ],
            [
                'name' => 'Validacion de Planilla',
                'level' => 1,
                'path' => '/checksheets',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 4
            ],
            [
                'name' => 'Bonos',
                'level' => 1,
                'path' => '/bonus',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 3
            ],
            [
                'name' => 'Descuentos',
                'level' => 1,
                'path' => '/discounts',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 3
            ],
            [
                'name' => 'Parametros',
                'level' => 1,
                'path' => '/parameters',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 7
            ],
            [
                'name' => 'Rangos Salariales',
                'level' => 1,
                'path' => '/salary_ranges',
                'icon' => 'far fa-circle nav-icon',
                'module_id' => 7
            ]
        ];

        foreach ($modulesDefault as $key => $module) {
            Module::create($module);
        }
    }
}
