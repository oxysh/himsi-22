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
        $form->judul = 'Pendaftaran Kepengurusan HIMSI';
        $form->pemilik = 'HIMSI';
        $form->deadline = '2021-02-18 00:00:00';
        $form->token = true;
        $form->save();

        $pertanyaan = new FormPertanyaan();
        $pertanyaan->form_id = $form->id;
        $pertanyaan->tipe = 'text';
        $pertanyaan->pertanyaan = 'NAMA';
        $pertanyaan->save();

        $pertanyaann = new FormPertanyaan();
        $pertanyaann->form_id = $form->id;
        $pertanyaann->tipe = 'text';
        $pertanyaann->pertanyaan = 'NIM';
        $pertanyaann->save();

        $penjawab = new FormPenjawab();
        $penjawab->form_id = $form->id;
        $penjawab->token = '123';
        $penjawab->save();

        $jawaban = new FormJawaban();
        $jawaban->pertanyaan_id = $pertanyaan->id;
        $jawaban->penjawab_id = $penjawab->id;
        $jawaban->jawaban = 'ADMIN HIMSI';
        $jawaban->save();

        $jawabann = new FormJawaban();
        $jawabann->pertanyaan_id = $pertanyaann->id;
        $jawabann->penjawab_id = $penjawab->id;
        $jawabann->jawaban = '081911633046';
        $jawabann->save();
    }
}
