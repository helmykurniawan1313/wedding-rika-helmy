<?php

namespace Database\Seeders;

use App\Models\GalleryPhoto;
use App\Models\HeroCarouselPhoto;
use App\Models\SiteContent;
use App\Models\TimelineEntry;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        SiteContent::current();

        if (TimelineEntry::count() === 0) {
            $years = [
                ['y' => '2019', 't' => 'The Beginning', 'd' => 'Looking back to 2018, I remember our first encounters at UPNV Jatim campus. These random meetings transformed into moments we both eagerly anticipate.'],
                ['y' => '2020', 't' => 'Year of Adaptation', 'd' => 'The pandemic forced us apart in 2020, testing our bond with distance. Against all odds, we held on and survived it together.'],
                ['y' => '2021', 't' => 'New Normal, New Life', 'd' => '2021 tested us like never before. Adapting to post-pandemic life, career changes, and graduating from UPN, we faced our hardest challenges.'],
                ['y' => '2022', 't' => 'Breakthrough', 'd' => '2022 brought us closer. As one navigated job-hunting in Surabaya, the other pushed through to graduation. We became each other\'s strength.'],
                ['y' => '2023', 't' => 'One Step Closer', 'd' => 'When 2023 came, we knew it was time. The engagement was a recognition that we fit together flawlessly.'],
                ['y' => '2024', 't' => 'Commitment', 'd' => 'In 2024, we pledged our forever. As we count down to our 2025 wedding, every moment is filled with purpose—crafting our love story.'],
            ];

            foreach ($years as $i => $item) {
                TimelineEntry::create([
                    'year' => $item['y'],
                    'title' => $item['t'],
                    'description' => $item['d'],
                    'photo' => 'wedding/second/images/'.$item['y'].'.jpg',
                    'sort_order' => $i,
                ]);
            }
        }

        if (GalleryPhoto::count() === 0) {
            $photos = ['coll-1.jpg', 'coll-2.jpg', 'coll-3.jpg', 'col-7.jpg', 'col-8.jpg', 'col-9.jpg'];
            foreach ($photos as $i => $photo) {
                GalleryPhoto::create([
                    'path' => 'wedding/second/images/'.$photo,
                    'sort_order' => $i,
                ]);
            }
        }

        if (HeroCarouselPhoto::count() === 0) {
            $photos = ['foto5.jpg', 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg'];
            foreach ($photos as $i => $photo) {
                HeroCarouselPhoto::create([
                    'path' => 'wedding/second/images/'.$photo,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
