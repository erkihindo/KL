<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tests')->insert([
           'name' => 'Sissejuhatus',
            
        ]);
         
         DB::table('tests')->insert([
           'name' => 'Cats',
            
        ]);
         
         DB::table('tests')->insert([
           'name' => '1 Kodutöö',
            
        ]);
    
    }
}
