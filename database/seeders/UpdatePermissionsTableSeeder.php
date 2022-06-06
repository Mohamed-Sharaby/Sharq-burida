<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Admins'=> 'التعامل مع المديرين',
            'Roles' => 'التعامل مع الصلاحيات والمناصب',
            'Achievements'=> 'التعامل مع الانجازات ',
            'Administrations'=> 'التعامل مع الطاقم الادارى',
            'Ideas'=> 'التعامل مع المقترحات ',
            'Media'=> 'التعامل مع المركز الاعلامى  ',
            'Policy'=> 'التعامل مع اللوائح والسياسات ',
            'Profile'=> 'التعامل مع البروفايل',
            'Rate'=> 'التعامل مع التقييم',
            'Settings'=> 'التعامل مع الاعدادات',
            'Sliders'=> 'التعامل مع السلايدر',
            'Donates'=> 'التعامل مع التبرعات',
            'SiteRoles'=> 'التعامل مع دور الجمعية',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::where('name', $key)->update(['ar_name' => $permission]);
        }
    }
}
