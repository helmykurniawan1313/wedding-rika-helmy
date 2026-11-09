<?php

namespace Database\Seeders;

use App\Models\Remark;
use Illuminate\Database\Seeder;

class RemarkSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = [
            'Budi', 'Siti', 'Agus', 'Dewi', 'Rizky', 'Putri', 'Andi', 'Maya', 'Eko', 'Rina',
            'Fajar', 'Lestari', 'Dian', 'Wulan', 'Hendra', 'Sari', 'Yusuf', 'Indah', 'Bayu', 'Nia',
            'Taufik', 'Ayu', 'Dedi', 'Fitri', 'Arif', 'Mega', 'Irfan', 'Lina', 'Rudi', 'Novi',
            'Hadi', 'Tika', 'Wahyu', 'Ratna', 'Doni', 'Yuni', 'Fauzan', 'Dina', 'Kurnia', 'Sinta',
            'Rahmat', 'Melati', 'Surya', 'Intan', 'Galih', 'Citra', 'Yoga', 'Anisa', 'Dimas', 'Wati',
        ];

        $lastNames = [
            'Santoso', 'Wijaya', 'Kurniawan', 'Pratama', 'Saputra', 'Hidayat', 'Nugraha', 'Setiawan',
            'Permata', 'Handoko', 'Firmansyah', 'Maharani', 'Susanto', 'Rahayu', 'Gunawan', 'Puspita',
            'Hakim', 'Utami', 'Pangestu', 'Anggraini', 'Wibowo', 'Lestari', 'Siregar', 'Hutapea',
            'Simatupang', 'Amelia', 'Fauzi', 'Oktaviani', 'Ramadhan', 'Safitri',
        ];

        $descriptions = [
            'Teman SMA', 'Teman Kuliah', 'Rekan Kerja', 'Teman Kantor', 'Sahabat', 'Keluarga Besar',
            'Tetangga', 'Teman SMP', 'Saudara', 'Teman Kampus', 'Rekan Bisnis', 'Teman Dekat',
            'Teman Main', 'Alumni Sekolah', 'Komunitas', 'Teman Lama',
        ];

        $greetings = [
            'Selamat menempuh hidup baru, semoga menjadi keluarga yang sakinah, mawaddah, warahmah.',
            'Barakallahu lakuma wa baraka alaikuma wa jamaa bainakuma fii khair. Selamat ya!',
            'Selamat berbahagia untuk kalian berdua, semoga pernikahan ini membawa banyak kebahagiaan.',
            'Semoga menjadi pasangan yang saling melengkapi dan langgeng sampai kakek nenek.',
            'Selamat menempuh hidup baru! Semoga selalu diberkahi dan dilimpahkan rezeki.',
            'Happy wedding! Semoga menjadi keluarga yang harmonis dan penuh cinta.',
            'Selamat menikah, semoga rumah tangganya selalu dipenuhi kebahagiaan dan kehangatan.',
            'Doa terbaik untuk kalian berdua, semoga pernikahannya diridhoi Allah SWT.',
            'Selamat atas pernikahannya, semoga menjadi pasangan yang saling mendukung selamanya.',
            'Turut berbahagia, semoga cinta kalian terus bertumbuh seiring berjalannya waktu.',
            'Selamat menempuh hidup baru, semoga segera diberikan momongan yang sholeh/sholehah.',
            'Congratulations! Wishing you both a lifetime of love and happiness.',
            'Selamat ya, semoga menjadi pasangan yang langgeng dan selalu diberi keberkahan.',
            'Semoga pernikahan ini menjadi awal dari cerita indah kalian berdua.',
            'Selamat berbahagia, semoga cintanya abadi sampai akhir hayat.',
            'Barakallah, semoga menjadi keluarga yang penuh berkah dan rahmat.',
            'Selamat menikah, semoga selalu rukun dan saling menyayangi.',
            'Doa terbaik menyertai kalian berdua, semoga bahagia dunia akhirat.',
            'Selamat atas hari bahagianya, semoga Allah selalu melindungi rumah tangga kalian.',
            'Semoga menjadi pasangan yang selalu kompak dan penuh tawa setiap hari.',
            'Selamat menempuh hidup baru, jangan lupa bahagia terus ya!',
            'Wishing you both endless love, laughter, and happiness together.',
            'Selamat menikah, semoga menjadi teladan keluarga yang baik untuk orang sekitar.',
            'Semoga pernikahan kalian dipenuhi dengan cinta, kesabaran, dan pengertian.',
            'Selamat berbahagia, semoga selalu diberi kemudahan dalam menjalani rumah tangga.',
        ];

        $ids = [];
        for ($i = 1; $i <= 100; $i++) {
            $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];

            $ids[] = [
                'name' => $name,
                'description' => $descriptions[array_rand($descriptions)],
                'remark' => $greetings[array_rand($greetings)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Remark::insert($ids);
    }
}
