<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert([
            [
                'title' => 'Kesenian Wayang Kulit',
                'description' => 'Wayang kulit adalah salah satu kesenian tradisional Indonesia yang terkenal. Wayang kulit berasal dari Pulau Jawa dan dimainkan dengan menggunakan wayang yang terbuat dari kulit kerbau atau kulit sapi. Pertunjukan wayang kulit biasanya mengambil cerita dari Ramayana atau Mahabharata, dan sering kali disertai dengan musik gamelan.',
                'date' => Carbon::now()->subDays(5)->toDateTimeString(),
                'photo' => 'Wayang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Tari Pendet',
                'description' => 'Tari Pendet adalah tarian tradisional Bali yang dimainkan oleh sekelompok penari perempuan. Tarian ini biasanya dipentaskan sebagai tanda penyambutan tamu atau sebagai persembahan kepada para dewa. Gerakan tari Pendet sangat lembut dan anggun, dengan gerakan tangan yang khas. Tarian ini juga sering diiringi dengan musik gamelan.',
                'date' => Carbon::now()->subDays(4)->toDateTimeString(),
                'photo' => 'Nyepi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Rumah Adat Toraja',
                'description' => 'Rumah adat Toraja, disebut juga tongkonan, adalah rumah tradisional suku Toraja di Sulawesi Selatan. Tongkonan memiliki bentuk atap yang melengkung, yang konon menyerupai perahu. Rumah adat ini memiliki nilai budaya yang tinggi bagi masyarakat Toraja, karena dianggap sebagai simbol keberhasilan dan kekayaan.',
                'date' => Carbon::now()->subDays(3)->toDateTimeString(),
                'photo' => 'poster canva.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Batik Indonesia',
                'description' => 'Batik adalah seni membatik kain yang sudah lama dikenal di Indonesia. Batik merupakan warisan budaya tak benda dari Indonesia yang diakui oleh UNESCO. Motif batik bervariasi tergantung dari daerah asalnya, dan setiap motif memiliki makna dan filosofi tersendiri. Batik digunakan dalam berbagai macam pakaian tradisional maupun modern.',
                'date' => Carbon::now()->subDays(2)->toDateTimeString(),
                'photo' => 'Nusantara.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ritual Ma’Nene',
                'description' => 'Ma’Nene adalah ritual unik dari suku Toraja di Sulawesi Selatan, Indonesia. Ritual ini dilakukan untuk menghormati orang-orang yang telah meninggal dengan cara membersihkan dan mengenakan pakaian baru kepada jenazah yang telah diambil dari kubur. Ma’Nene biasanya dilakukan setahun sekali dan diiringi dengan berbagai upacara adat lainnya.',
                'date' => Carbon::now()->subDays(1)->toDateTimeString(),
                'photo' => 'Poster Teknologi Digital.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
