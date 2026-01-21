<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_logo', 'value' => null, 'group' => 'general', 'type' => 'file'],

            // Hero Section
            ['key' => 'hero_badge', 'value' => 'Portal Pelayanan Terpadu Satu Pintu', 'group' => 'home', 'type' => 'text'],
            ['key' => 'hero_title', 'value' => 'Pemetaan Potensi di Biak Numfor', 'group' => 'home', 'type' => 'text'],
            ['key' => 'hero_description', 'value' => 'Sistem Informasi Pelayanan Perizinan Terpadu Antar Satuan Kerja (SIPINTAS) Kabupaten Biak Numfor. Memudahahkan masyarakat dalam pengurusan izin usaha dan non-usaha.', 'group' => 'home', 'type' => 'textarea'],
            ['key' => 'hero_image', 'value' => null, 'group' => 'home', 'type' => 'file'],

            // About Section
            ['key' => 'about_badge', 'value' => 'Tentang Kami', 'group' => 'home', 'type' => 'text'],
            ['key' => 'about_title', 'value' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'group' => 'home', 'type' => 'text'],
            ['key' => 'about_description', 'value' => 'Menjadi garda terdepan dalam pelayanan perizinan dan investasi di Kabupaten Biak Numfor. Kami berkomitmen menghadirkan layanan yang transparan, akuntabel, dan berbasis teknologi untuk kemudahan masyarakat.', 'group' => 'home', 'type' => 'textarea'],
            ['key' => 'stat_1_label', 'value' => 'Indeks Kepuasan Masyarakat', 'group' => 'home', 'type' => 'text'],
            ['key' => 'stat_1_value', 'value' => '98%', 'group' => 'home', 'type' => 'text'],
            ['key' => 'stat_2_label', 'value' => 'Jenis Layanan Perizinan', 'group' => 'home', 'type' => 'text'],
            ['key' => 'stat_2_value', 'value' => '50+', 'group' => 'home', 'type' => 'text'],

            // Kawasan Section
            ['key' => 'kawasan_badge', 'value' => 'Kawasan Strategis', 'group' => 'home', 'type' => 'text'],
            ['key' => 'kawasan_title', 'value' => 'Kawasan Ekonomi Khusus (KEK) Biak', 'group' => 'home', 'type' => 'text'],
            ['key' => 'kawasan_description', 'value' => 'Pusat pertumbuhan ekonomi masa depan di Indonesia Timur. Dilengkapi infrastruktur modern untuk mendukung industri perikanan dan logistik internasional.', 'group' => 'home', 'type' => 'textarea'],
            ['key' => 'kawasan_stat_1_label', 'value' => 'Total Luas Lahan', 'group' => 'home', 'type' => 'text'],
            ['key' => 'kawasan_stat_1_value', 'value' => '400 Ha', 'group' => 'home', 'type' => 'text'],
            ['key' => 'kawasan_stat_2_label', 'value' => 'Potensi Investasi', 'group' => 'home', 'type' => 'text'],
            ['key' => 'kawasan_stat_2_value', 'value' => 'Rp 5T', 'group' => 'home', 'type' => 'text'],

            // CTA Section
            ['key' => 'cta_title', 'value' => 'Siap Mengurus Perizinan Anda?', 'group' => 'home', 'type' => 'text'],
            ['key' => 'cta_description', 'value' => 'Daftarkan usaha Anda sekarang juga melalui sistem online kami yang terintegrasi. Mudah, cepat, dan aman.', 'group' => 'home', 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
