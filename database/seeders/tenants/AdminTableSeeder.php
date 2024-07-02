<?php
namespace Database\Seeders\tenants;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Support\Str;
class AdminTableSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('admins')->truncate();
        $admin = Admin::create([
            'name'          =>  'Mostafa',
            'email'         =>  'admin@admin.com',
            'password'      =>  bcrypt('123123'),
            'remember_token'=> Str::random(10),
            'status'        =>  'active',
        ]);
        env('APP_ENV') === 'local' ? Admin::factory()->count(10)->create() : $admin;
        Schema::enableForeignKeyConstraints();
    }
}