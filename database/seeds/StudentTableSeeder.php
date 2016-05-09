<?php

use Illuminate\Database\Seeder;
use App\User;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::/*where('admin', false)->*/get();
        $i = 0;
        foreach($users as $user ) {
            $code = 136000 - $i;
            $i++;
            DB::table('students')->insert([
           'code' => $code . "IAPB",
            'user_id' => $user->id,
            
            ]);
        }
        
    }
}
