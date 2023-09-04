<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TagSeeder::class);
         //php artisan db:seed untuk migrasi table tags dari seeds
         $this->call(UserSeeder::class);
         //php artisan migrate:fresh untuk memigrasi ulang database dan menghapus semua data
         //php artisan migrate:fresh --seed untuk memigrasi table yg ada di seed
         $this->call(AdminSeeder::class);
    }
}
