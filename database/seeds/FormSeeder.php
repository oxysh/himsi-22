<?php

use App\Form;
use App\FormJawaban;
use App\FormPenjawab;
use App\FormPertanyaan;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = new Form();
        $form->judul = 'Biodata';
        $form->pemilik = 'HIMSI';
        $form->deadline = '2021-02-18 00:00:00';
        $form->save();

        $pertanyaan = new FormPertanyaan();
        $pertanyaan->form_id = $form->id;
        $pertanyaan->tipe = 'text';
        $pertanyaan->pertanyaan = 'Siapa Namamu';
        $pertanyaan->save();

        $pertanyaann = new FormPertanyaan();
        $pertanyaann->form_id = $form->id;
        $pertanyaann->tipe = 'number';
        $pertanyaann->pertanyaan = 'Berapa Umurmu';
        $pertanyaann->save();

        $penjawab = new FormPenjawab();
        $penjawab->form_id = $form->id;
        $penjawab->token = '123';
        $penjawab->save();

        $jawaban = new FormJawaban();
        $jawaban->pertanyaan_id = $pertanyaan->id;
        $jawaban->penjawab_id = $penjawab->id;
        $jawaban->jawaban = 'admin';
        $jawaban->save();

        $jawabann = new FormJawaban();
        $jawabann->pertanyaan_id = $pertanyaann->id;
        $jawabann->penjawab_id = $penjawab->id;
        $jawabann->jawaban = 'admin';
        $jawabann->save();
    }
}
