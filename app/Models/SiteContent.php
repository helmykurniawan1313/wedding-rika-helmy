<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = [
        'groom_name', 'groom_parents', 'bride_name', 'bride_parents', 'groom_photo', 'bride_photo',
        'wedding_date', 'hero_image_mobile', 'hero_image_desktop',
        'intro_text',
        'akad_date', 'akad_time', 'akad_venue_label', 'akad_address',
        'resepsi_date', 'resepsi_time', 'resepsi_venue_label', 'resepsi_address',
        'maps_embed_url', 'maps_link_url',
        'bank_name', 'bank_account_number', 'bank_account_owner', 'gift_address', 'gift_address_owner',
        'verse_text', 'verse_reference',
        'footer_greeting', 'footer_bg_image',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'groom_name' => 'Helmy Kurniawan',
            'groom_parents' => 'Bapak Suyanto & Ibu Endang',
            'bride_name' => 'Rika Eko Wahyuni',
            'bride_parents' => 'Bapak Jamil & Ibu Kasinik',
            'groom_photo' => 'wedding/second/images/helmys.png',
            'bride_photo' => 'wedding/second/images/rikas.png',
            'wedding_date' => 'Sabtu, 12 April 2025',
            'hero_image_mobile' => 'img/first/web5-portrait.png',
            'hero_image_desktop' => 'img/first/web5.png',
            'intro_text' => "Dengan penuh rasa syukur kepada Allah SWT yang telah menganugerahkan rahmat dan kasih-Nya, kami dipertemukan dalam ikatan suci pernikahan. Dengan kerendahan hati, kami mengundang Bapak/Ibu/Saudara/i untuk berkenan hadir dan memberikan doa restu dalam acara pernikahan kami, yang akan diadakan pada:",
            'akad_date' => 'Jumat, 11 April 2025',
            'akad_time' => '10.00 WIB – Selesai',
            'akad_venue_label' => 'di Rumah Mempelai Wanita',
            'akad_address' => 'Dsn. Ngrayung, Ds. Brayung, Kec. Puri, Kab. Mojokerto',
            'resepsi_date' => 'Sabtu, 12 April 2025',
            'resepsi_time' => '14.00 – Selesai',
            'resepsi_venue_label' => 'di Rumah Mempelai Wanita',
            'resepsi_address' => 'Dsn. Ngrayung, Ds. Brayung, Kec. Puri, Kab. Mojokerto',
            'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d22375.38105618856!2d112.43404625349918!3d-7.5262439030032455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzEnNDAuNCJTIDExMsKwMjYnMDguOSJF!5e0!3m2!1sid!2sid!4v1743066839297!5m2!1sid!2sid',
            'maps_link_url' => 'https://maps.app.goo.gl/Dw8Amr8Kx6tHrAFL8',
            'bank_name' => 'BCA',
            'bank_account_number' => '7625097487',
            'bank_account_owner' => 'a.n Helmy Kurniawan',
            'gift_address' => 'Dsn. Ngrayung, Ds. Brayung, Kec. Puri, Kab. Mojokerto, Jawa Timur 61363',
            'gift_address_owner' => 'u.p Keluarga Mempelai Wanita',
            'verse_text' => 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir.',
            'verse_reference' => 'Q.S. Ar-Rum: 21',
            'footer_greeting' => "Wassalamu'alaikum warahmatullahi wabarakatuh",
            'footer_bg_image' => 'wedding/second/images/foto5.jpg',
        ]);
    }

    public function groomPhotoUrl(): string
    {
        return $this->resolveImageUrl($this->groom_photo);
    }

    public function bridePhotoUrl(): string
    {
        return $this->resolveImageUrl($this->bride_photo);
    }

    public function heroImageMobileUrl(): string
    {
        return $this->resolveImageUrl($this->hero_image_mobile);
    }

    public function heroImageDesktopUrl(): string
    {
        return $this->resolveImageUrl($this->hero_image_desktop);
    }

    public function footerBgImageUrl(): string
    {
        return $this->resolveImageUrl($this->footer_bg_image);
    }

    protected function resolveImageUrl(?string $path): string
    {
        if (! $path) {
            return '';
        }

        if (str_starts_with($path, 'wedding-content/')) {
            return asset('storage/'.$path);
        }

        return asset($path);
    }
}
