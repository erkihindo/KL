<?php

use Illuminate\Database\Seeder;

class TextfieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('textfields')->insert([
           'hometext' => '<h1>Welcome</h1>
            <p class="lead">Esimene kodutöö läheneb.</p>',
             
            'abouttext' => '<h1>Kirjeldus</h1>
            <p>Loengutes selgitame kasutajaliideste arendamise
            põhimõtteid. Harjutustundide eesmärk on tutvustada laborite tegemiseks
            tarvilikke tehnilisi lahendusi. Praktikumis lahendame iga nädal mõnd
            konkreetset liidese ehitamisel ettetulevat probleemi (kui pole
            kodutööde esitamise nädal, sest siis tegeleme ainult sellega).</p>',
        ]);
    }
}
