<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Berita;
use App\Models\Kuesioner;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0
        ]);
        Kuesioner::create([
            'judul' => 'Kuesioner Alumni 2034',
            'deskripsi' => '<p> membantu ppg unesa untuk mendata </p>'
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Apakah pendidikan yang Anda dapat di PPG Unesa relevan dengan pekerjaan Anda ?',
            'pilihan_jawaban' => json_encode(['ya', 'tidak']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'essai', 'pertanyaan' => 'Dari pengalaman Anda bekerja, apa saran praktis Anda untuk pendidikan di PPG Unesa
        ]); dalam rangka meningkatkan kesesuaian antara pendidikan dengan lapangan pekerjaan ?',
            'pilihan_jawaban' => json_encode(['null']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'number', 'pertanyaan' => 'Berapa perusahaan/instansi/institusi yang sudah Anda lamar (lewat surat atau e-mail) sebelum Anda memeroleh pekerjaan pertama ?',
            'pilihan_jawaban' => json_encode(['null']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'number',
            'pertanyaan' => 'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran Anda ?',
            'pilihan_jawaban' => json_encode(['null']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'number',
            'pertanyaan' => 'Berapa banyak perusahaan/instansi/institusi yang mengundang Anda untuk wawancara ?',
            'pilihan_jawaban' => json_encode(['null']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Saat baru lulus, sejauh mana Anda merasa mampu bersaing dng lulusan perguruan tinggi lain ?',
            'pilihan_jawaban' => json_encode(['Sangat Mampu', 'Mampu', 'Kurang Mampu', 'Sangat Tidak Mampu']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan',
            'pertanyaan' => 'Sejauh ini, menurut Anda lulusan PPG Unesa
        ]); yang bagaimana yg diperlukan oleh pasar/lapangan kerja ?',
            'pilihan_jawaban' => json_encode(['Generik (umum)', 'Spesifik']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan pada disiplin ilmu Anda ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan diluar disiplin ilmu Anda ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan Umum ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Bahasa Inggris ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Keterampilan Internet ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Keterampilan Komputer diluar matakuliah ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Berpikir Kritis ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Metodologi penelitian ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Analisa masalah ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan Komunikasi Lisan ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan Komunikasi tertulis ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kerjasama tim ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => ' Bekerja di bawah tekanan ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Toleransi ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan adaptasi ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Loyalitas ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Integritas ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Inisiatif ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Manajemen organisasi ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => ' Kepemimpinan/leadership ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan mempresentasikan ide/laporan ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Manajemen Proyek/program ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);

        Pertanyaan::create([
            'kuesioner_id' => 1,
            'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan belajar sepanjang hayat ?',
            'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan pada disiplin ilmu Anda ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan diluar disiplin ilmu Anda ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Pengetahuan Umum ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Bahasa Inggris ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Keterampilan Internet ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Keterampilan Komputer diluar matakuliah ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Berpikir Kritis ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Metodologi penelitian ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Analisa masalah ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan Komunikasi Lisan ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan Komunikasi tertulis ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Kerjasama tim ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => ' Bekerja di bawah tekanan ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Toleransi ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan', 'pertanyaan' => 'Kemampuan adaptasi ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Loyalitas ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Integritas ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Inisiatif ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Manajemen organisasi ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => ' Kepemimpinan/leadership ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Kemampuan mempresentasikan ide/laporan ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Manajemen Proyek/program ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);

        // Pertanyaan::create([
        //     'kuesioner_id' => 1,
        //     'jenis' => 'pilihan',
        //     'pertanyaan' => 'Kemampuan belajar sepanjang hayat ?',
        //     'pilihan_jawaban' => json_encode(['[4] Sangat Tinggi', '[3] Tinggi', '[2] Sedang', '[1] Rendah']),
        // ]);
        Berita::create([
            'judul' => 'Capaian Tracer Study Unesa 2023: 62% Alumni Program Magister-Doktor Telah Mengisi Kuesioner di Triwulan III',
            'isi' => 'Surabaya 30 September 2023, Capaian Tracer Study-User Survey (TS-US) Tahun 2023 pada Triwulan 3 (Magister-Doktor 2023) per tanggal 30 September 2023 pukul 07.00 WIB. Alumni yang telah mengisi kuesioner Tracer Study sejumlah 62% dengan rincian sebagai berikut: 1. Responsrate tertinggi diperoleh oleh FIP dan disusul oleh FMIPA, FBS, FISH, FEB, FIKK dan PPs 2. Gold Standard tertinggi diperoleh oleh FIP dan disusul oleh FBS, FISH, FMIPA, FEB, FIKK dan PPs Terima kasih kami haturkan kepada Bapak/Ibu Wakil Dekan I, Koorprodi, PIC Fakultas, PIC Program Studi selingkung Unesa yang telah bekerja keras dan bekerja sama untuk pemenuhan IKU 1 Unesa pada Triwulan 4. Mari kita tingkatkan kembali Respons Rate dan Gold Standard setiap Prodi dan Fakultas. #StayConnected (acs)',
            'kategori' => 'Pendidikan',
            'gambar' =>'berita_upload/1.jpg',
        ]);
        Berita::create([
            'judul' => 'Direktorat Kemahasiswaan dan Alumni Laksanakan Sosialisasi Tracer Study di Yudisium 107 Fakultas Selingkung Unesa untuk Tingkatkan Hubungan dan Informasi Karir bagi Alumni',
            'isi' => 'Surabaya  28-31 Agustus 2023, Halo, rekan-rekan Alumni Unesa, Direktorat Kemahasiswaan dan Alumni melalui tim Tracer Study Universitas melakukan Sosialisasi Tracer Study pada Yudisium 107 di Fakultas Selingkung Unesa, kegiatan sosialisasi diharapkan dapat memberikan informasi dan wawasan para Alumni terkait pentingnya penelusuran alumni. Tetap terhubung dengan kami melalui akun resmi Tracer Study Universitas Negeri Surabaya @tracerstudy.unesa. Yuk, lakukan pengisian Tracer Study untuk membantu Unesa lebih baik lagi. #StayConnected (acs)',
            'kategori' => 'Pendidikan',
            'gambar' =>'berita_upload/2.jpg',
        ]);
        Berita::create([
            'judul' => 'Dalam Rangka Peningkatan Kualitas IKU 1, Direktorat Kemahasiswaan dan Alumni berkolaborasi dengan Direktorat LPSP Unesa selenggarakan Sosialisasi PPG Prajabatan 2023 bagi Alumni',
            'isi' => 'Surabaya 22 Juni 2023, Sosialisasi PPG Prajabatan Tahun 2023 dilaksanakan secara daring dengan mengundang Wakil Rektor I, Wakil Dekan I selingkung Unesa, PIC TS-US Fakultas, PIC TS-US Program Studi dan Alumni (Lulusan 2022 dan 2023). Kegiatan dibuka oleh Wakil Rektor I, Prof. Dr. Madlazim, M.Si. menyampaikan “mari kita tingkatkan kualitas dan kuantitas kepesertaan PPG Prajabatan di Unesa, harapannya alumni Unesa dapat diprioritaskan PPG Prajabatan di Unesa”. Kegiatan sosialisasi menyampaikan beberapa ketentuan dan mekanisme PPG Prajabatan dengan materi Pentingnya PPG Prajabatan bagi Alumni dan Beasiswa Alumni oleh Direktur Kemahasiswaan dan Alumni, Dr. Muhamad Sholeh, M.Pd. materi kedua oleh Direktur LPSP yang diwakili oleh Dr. Julianto, M.Pd. menyampaikan materi mekanisme dan ketentuan PPG Prajabatan di Unesa, materi ketiga tentang pentingnya Tracer Study alumni oleh Kasi Tracer Study, Aditya Chandra Setiawan, M.Pd dan materi terakhir terkait Karir dan Layanan BK. Harapannya banyak alumni yang mengikuti PPG Prajabatan di Unesa dan alumni memperoleh pekerjaan yang layak dengan karir yang cemerlang. (acs)',
            'kategori' => 'Pendidikan',
            'gambar' =>'berita_upload/3.jpg',
        ]);
    }
}
