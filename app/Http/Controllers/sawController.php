<?php

namespace App\Http\Controllers;

use App\Jurusan as AppJurusan;
use App\Kriteria as AppKriteria;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Model\Kriteria;
use App\NilaiUser;

class sawController extends Controller
{
    //
    public function get_matrix_nilai()
    {
        # code...
        $nilaiuser = NilaiUser::all();
        foreach ($nilaiuser as $key) {
            # code...
            preg_match_all('/[0-9]{3,}/m', $key->matematika, $matches, PREG_SET_ORDER, 0);
            $key->matematika = $key->Mtk;
            $key->ipa = $key->Ipa;
            $key->ips = $key->Ips;
            $key->bing = (float) filter_var($key->Bing, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
            $key->bindo = preg_replace('/\D/', '', $key->bindo);          
            $key->tik = $matches[0][0];
        }
        return $nilaiuser->all();
    }
    public function get_matrix_normalisasi()
    {
        # code...
        $options = \App\Setting::getAllKeyValue();

        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        $nilaiuser = $this->get_matrix_nilai();
        $temp_matematika = [];
        $temp_ipa = [];
        $temp_ipa = [];
        $temp_ips = [];
        $temp_bing = [];
        $temp_bindo = [];
        $temp_tik = [];
        foreach ($nilaiuser as $key) {
            # code...
            $temp_matematika[] = $key->matematika;
            $temp_ipa = $key->ipa;
            $temp_ips[] = $key->ips;
            $temp_bing[] = $key->bing;
            $temp_bindo[] = $key->bindo;
            $temp_tik[] = $key->tik;
        }
        foreach ($nilaiuser as $key) {
            # code...
            $key->n_matematika = ($c1->is_benefit) ? $key->matematika/max($temp_matematika) : min($temp_matematika)/($key->matematika);
            $key->n_ipa = ($c2->is_benefit) ? $key->ipa/max($temp_ipa) : min($temp_ipa)/($key->ipa);
            $key->n_ips = ($c3->is_benefit) ? $key->ips/max($temp_ips) : min($temp_ips)/($key->ips);
            $key->n_bing = ($c4->is_benefit) ? $key->bing/max($temp_bing) : min($temp_bing)/($key->bing);
            $key->n_bindo = ($c5->is_benefit) ? $key->bindo/max($temp_bindo) : min($temp_bindo)/($key->bindo);
            $key->n_tik = ($c6->is_benefit) ? $key->tik/max($temp_tik) : min($temp_tik)/($key->tik);
        }
        return $nilaiuser;
    }public function get_matrix_preferensi()
    {
        # code...
        $options = \App\Setting::getAllKeyValue();
        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        $nilaiuser = $this->get_matrix_normalisasi();
        foreach ($nilaiuser as $key) {
            # code...
            $key->b_matematika = $key->n_matematika*$c1->weight;
            $key->b_ipa = $key->n_ipa*$c2->weight;
            $key->b_ips = $key->n_ips*$c3->weight;
            $key->b_bing = $key->n_bing*$c4->weight;
            $key->b_bindo = $key->n_bindo*$c5->weight;
            $key->b_tik = $key->n_tik*$c5->weight;
            $key->nilai_preferensi = $key->b_matematika+$key->b_ipa+$key->b_ips+$key->b_bing+$key->b_bindo+$key->b_tik;

        }
        return $nilaiuser;
    }

    public function matrix_nilai()
    {
        # code...
        $nilaiuser = $this->get_matrix_nilai();
        return Datatables::of($nilaiuser)
                ->setRowId(function(NilaiUser $nilaiuser){
                    return $nilaiuser->id;
                })->make(true);
    }
    public function matrix_normalisasi()
    {
        # code...
        $nilaiuser = $this->get_matrix_normalisasi();
        return Datatables::of($nilaiuser)
                ->setRowId(function(NilaiUser $nilaiuser){
                    return $nilaiuser->id;
                })->make(true);
    }public function matrix_preferensi()
    {
        # code...
        $nilaiuser = $this->get_matrix_preferensi();
        return Datatables::of($nilaiuser)
                ->setRowId(function(NilaiUser $nilaiuser){
                    return $nilaiuser->id;
                })->addColumn('aksi','admin.saw.action-button2')
                ->rawColumns(['aksi'])->make(true);
    }
}
