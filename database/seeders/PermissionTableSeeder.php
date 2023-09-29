<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [


        'إدارة المخزن',
        'إدارة الصادر',
        'تنزيل التقارير',
          'الصلاحيات',
        'النسخ الاحتياطي',
        'إدارة العملاء',
        'إدارة المسؤولين',



];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
