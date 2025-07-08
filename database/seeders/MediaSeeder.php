<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $media = [
            [
                'mahasiswa_id' => 1,
                'kategori_id' => 2,
                'judul' => 'Video Pembelajaran Menulis Teks Prosedur',
                'gambar_cover' => 'media_covers/IZMXwUPBsBOpoVfruumuJyeJD6VJ2KVYpXVucL7n.jpg',
                'slug' => 'video-pembelajaran-menulis-teks-prosedur',
                'deskripsi' => 'Video animasi edukatif untuk siswa SMP kelas 7 yang menjelaskan langkah-langkah menulis teks prosedur secara efektif dan menyenangkan.',
                'judul_penelitian' => 'Pengembangan Media Video Edukasi untuk Meningkatkan Keterampilan Menulis Teks Prosedur Siswa SMP',
                'tahun_terbit' => 2024,
                'link_media' => 'https://www.youtube.com/watch?v=OGAqzvV6jCk&ab_channel=TangkasDigitalEducation',
            ],
            [
                'mahasiswa_id' => 2,
                'kategori_id' => 4,
                'judul' => 'E-Modul Apresiasi Puisi Berbasis Flipbook',
                'gambar_cover' => 'media_covers/EcJMTTucQxYeMdVfG1GnARbgcYELBiPSJPdy9hwu.jpg',
                'slug' => 'e-modul-apresiasi-puisi-berbasis-flipbook',
                'deskripsi' => 'Modul ajar digital interaktif untuk SMA yang membahas teori dan praktik dalam mengapresiasi karya sastra puisi.',
                'judul_penelitian' => 'Efektivitas Penggunaan E-Modul Berbasis Flipbook dalam Pembelajaran Apresiasi Puisi',
                'tahun_terbit' => 2024,
                'link_media' => 'https://anyflip.com/myakr/mdpy/basic/101-124',
            ],
            [
                'mahasiswa_id' => 6,
                'kategori_id' => 3,
                'judul' => 'E-Book Siklus Akuntansi Perusahaan Jasa',
                'gambar_cover' => 'media_covers/ng25qMEAhYu0LvBQSax0dcnaPgFtw1uzC4NLAwDb.png',
                'slug' => 'e-book-siklus-akuntansi-perusahaan-jasa',
                'deskripsi' => 'Sebuah E-Book yang memvisualisasikan alur siklus akuntansi pada perusahaan jasa agar mudah dipahami.',
                'judul_penelitian' => 'Pengaruh Media E-Book terhadap Pemahaman Konsep Siklus Akuntansi Mahasiswa Pendidikan Ekonomi',
                'tahun_terbit' => 2025,
                'link_media' => 'https://online.fliphtml5.com/jmsmao/opxp/#p=1',
            ],
            [
                'mahasiswa_id' => 7,
                'kategori_id' => 1,
                'judul' => 'Animasi Pembangkit Listrik Sederhana',
                'gambar_cover' => 'media_covers/nji621qcd7TxPwifbbUir3edyapMYAbThm4VgFsq.jpg',
                'slug' => 'animasi-pembangkit-listrik-sederhana',
                'deskripsi' => 'Video animasi untuk mendemonstrasikan prinsip kerja pembangkit listrik tenaga air skala kecil.',
                'judul_penelitian' => 'Implementasi Animasi Pembangkit Listrik Sederhana untuk Menumbuhkan Minat Belajar Fisika Siswa SMA',
                'tahun_terbit' => 2023,
                'link_media' => 'https://www.youtube.com/watch?v=FB_unX1TzPI&ab_channel=IreksaEngineer',
            ],
            [
                'mahasiswa_id' => 8,
                'kategori_id' => 1,
                'judul' => 'Animasi Kisah Teladan 25 Nabi dan Rasul',
                'gambar_cover' => 'media_covers/TjbhMfvqEk1GBKvOi5pqDBujlQv6DeGMGRXwb0Qb.jpg',
                'slug' => 'animasi-kisah-teladan-25-nabi-dan-rasul',
                'deskripsi' => 'Video animasi singkat yang menceritakan kisah-kisah teladan para nabi dan rasul untuk anak-anak TPA/SD.',
                'judul_penelitian' => 'Pengembangan Video Edukasi Kisah Nabi untuk Pendidikan Karakter Anak Usia Dini',
                'tahun_terbit' => 2024,
                'link_media' => 'https://www.youtube.com/watch?v=Dkz8EJHP6Es&ab_channel=Mahasantri',
            ],
            [
                'mahasiswa_id' => 1,
                'kategori_id' => 5,
                'judul' => 'Analisis Unsur Intrinsik Cerpen Interaktif',
                'gambar_cover' => 'media_covers/acoAdC0CfcHkCthMYXibATFUOhD09Ny28KgRqz3R.jpg',
                'slug' => 'analisis-unsur-intrinsik-cerpen-interaktif',
                'deskripsi' => 'Sebuah media berbasis web yang memungkinkan siswa untuk menganalisis unsur intrinsik sebuah cerpen secara interaktif.',
                'judul_penelitian' => 'Pengembangan Media Interaktif Analisis Cerpen untuk Meningkatkan Kemampuan Literasi Kritis Siswa',
                'tahun_terbit' => 2024,
                'link_media' => 'https://www.youtube.com/watch?v=WHgkTci0E7U&ab_channel=ILMCIINDONESIA',
            ],
            [
                'mahasiswa_id' => 3,
                'kategori_id' => 3,
                'judul' => 'Modul Praktikum Desain Grafis dengan Canva',
                'gambar_cover' => 'media_covers/oFTB21YFfPjFSte2kLuW6GIcUJJJShRoyKqPGgIv.png',
                'slug' => 'modul-praktikum-desain-grafis-dengan-canva',
                'deskripsi' => 'Modul PDF berisi tutorial dan latihan praktik desain grafis dasar menggunakan platform Canva untuk pemula.',
                'judul_penelitian' => 'Penyusunan Modul Ajar Digital Desain Grafis untuk Menunjang Kreativitas Siswa di Era Digital',
                'tahun_terbit' => 2025,
                'link_media' => 'https://id.scribd.com/document/736622059/Modul-Canva',
            ],
        ];

        foreach ($media as $item) {
            Media::create($item);
        }
    }
}
