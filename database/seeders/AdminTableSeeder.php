<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id'=>1,'name'=>'Super Admin','type'=>'superadmin','mobile'=>'01985478963','email'=>'admin@gmail.com',
                'password'=>'$2a$12$8xZ.RZYolrIVhihEFDN/V.woQ/k/BGv7BA1vLk6siJh/Qek3q7s46','image'=>'','status'=>1],
        ];
        \App\Models\BackendAdmin\Admin::insert($adminRecords);
    }
}
