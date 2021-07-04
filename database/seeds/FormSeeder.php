<?php

use App\Form;
use App\FormJawaban;
use App\FormPenjawab;
use App\FormPertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
        $string = $i . '-' . Str::random(10);
            Form::create([
                'judul' => $string,
                'pemilik' => 'inibolehdicobasih',
                'deadline' => '2021-02-18 00:00:00',
                'deskripsi' => $string,
            ]);
        }
    }
}
