<?php
// database/seeders/TriageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Triages;

class TriageSeeder extends Seeder
{
    public function run()
    {
        $triages = [
            
                // PRIORITAS TINGGI
                ['name' => 'Cardiac arrest', 'priority_score' => 100, 'description' => 'Henti jantung, memerlukan CPR segera.'],
                ['name' => 'STEMI', 'priority_score' => 100, 'description' => 'ST-Elevation Myocardial Infarction, serangan jantung akut.'],
                ['name' => 'Stroke', 'priority_score' => 100, 'description' => 'Iskemik atau hemoragik, membutuhkan penanganan cepat.'],
                ['name' => 'Sepsis berat', 'priority_score' => 100, 'description' => 'Infeksi sistemik berat, risiko syok septik.'],
                ['name' => 'Pulmonary embolism', 'priority_score' => 100, 'description' => 'Emboli paru, gangguan sirkulasi paru serius.'],
                ['name' => 'Head trauma berat', 'priority_score' => 100, 'description' => 'Cedera kepala berat, risiko perdarahan otak.'],
                ['name' => 'Cerebral hemorrhage', 'priority_score' => 100, 'description' => 'Perdarahan di otak, kondisi gawat darurat.'],
                ['name' => 'Shock kardiogenik', 'priority_score' => 100, 'description' => 'Gangguan sirkulasi akibat fungsi jantung.'],
                ['name' => 'Airway compromise', 'priority_score' => 100, 'description' => 'Obstruksi jalan napas, risiko gagal napas.'],
                ['name' => 'Multiple trauma', 'priority_score' => 100, 'description' => 'Cedera multipel, kondisi kritis dan kompleks.'],
                ['name' => 'Anaphylaxis', 'priority_score' => 100, 'description' => 'Reaksi alergi berat, risiko syok anafilaktik.'],
                ['name' => 'Kejang aktif', 'priority_score' => 100, 'description' => 'Status epileptikus, kejang terus-menerus.'],
    
                // PRIORITAS SEDANG
                ['name' => 'Chest pain (non-STEMI)', 'priority_score' => 70, 'description' => 'Nyeri dada tanpa elevasi segmen ST.'],
                ['name' => 'NSTEMI', 'priority_score' => 70, 'description' => 'Non-ST Elevation Myocardial Infarction.'],
                ['name' => 'Asthma attack', 'priority_score' => 70, 'description' => 'Serangan asma akut yang membutuhkan bronkodilator.'],
                ['name' => 'Pneumonia berat', 'priority_score' => 70, 'description' => 'Infeksi paru berat yang mengganggu oksigenasi.'],
                ['name' => 'Penurunan kesadaran', 'priority_score' => 70, 'description' => 'Altered mental status mendadak.'],
                ['name' => 'Burns sedang', 'priority_score' => 70, 'description' => 'Luka bakar tingkat sedang.'],
                ['name' => 'Fraktur terbuka/dislokasi', 'priority_score' => 70, 'description' => 'Cedera ekstremitas berat.'],
                ['name' => 'Abdominal pain akut', 'priority_score' => 70, 'description' => 'Nyeri perut parah, kemungkinan peritonitis.'],
                ['name' => 'Obstetrik darurat', 'priority_score' => 70, 'description' => 'Preeklampsia, perdarahan kehamilan.'],
                ['name' => 'Intoksikasi', 'priority_score' => 70, 'description' => 'Keracunan bahan kimia atau obat.'],
    
                // PRIORITAS RENDAH
                ['name' => 'Infeksi pernapasan ringan', 'priority_score' => 40, 'description' => 'ISPA ringan, vital stabil.'],
                ['name' => 'Demam tanpa syok', 'priority_score' => 40, 'description' => 'Demam tinggi tanpa tanda dehidrasi/komplikasi.'],
                ['name' => 'Nyeri perut ringan', 'priority_score' => 40, 'description' => 'Keluhan ringan, bisa ditangani rawat jalan.'],
                ['name' => 'Cedera ringan', 'priority_score' => 40, 'description' => 'Tanpa perdarahan aktif atau fraktur serius.'],
                ['name' => 'Epilepsi terkontrol', 'priority_score' => 40, 'description' => 'Riwayat epilepsi, tidak sedang kejang.'],
                ['name' => 'Kondisi vital stabil', 'priority_score' => 40, 'description' => 'Keluhan umum dengan tanda vital normal.'],
                ['name' => 'Pasien kontrol ringan', 'priority_score' => 40, 'description' => 'Pemeriksaan rutin tanpa keluhan berat.'],
    
        ];

        foreach ($triages as $triage) {
            Triages::create($triage);
        }
    }
}
