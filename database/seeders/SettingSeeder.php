<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the settings record exists, and if not, create it
        if (!Setting::exists()) {
            Setting::create([
                'fb' => '#',
                'tw' => '#',
                'in' => '#',
                'inst' => '#',
                'yt' => '#',
                'image_logo_light' => '/client/assets/images/logo/full_logo_light.png',
                'image_logo_dark' => '/client/assets/images/logo/full_logo_dark.png',
                'home_about_title' => [
                    'en' => 'Gedik HOLDING is 60 years old!',
                    'az' => '100-dən çox ölkəyə ixrac etmə',
                ],
                'home_about_subtitle' => [
                    'en' => '1963 We are Proudly Celebrating...',
                    'az' => '1963 Qürurla Qeyd Edirik…',
                ],
                'home_about_desc' => [
                    'en' => 'Gedik Holding is a Turkish company headquartered in Istanbul successfully continuing its activities...',
                    'az' => '100-dən çox ölkəyə ixrac edilir 1963 I Peşəkarlıq və böyük təcrübə GEDIK QAYNAQ, Avropanın ən böyük istehsalçılarından biridir...',
                ],
                'footer_title' => [
                    'en' => 'Be aware of the innovations in Gedik World.',
                    'az' => 'Gedik dünyasındakı yeniliklərdən xəbərdar olun.',
                ],
                'address' => [
                    'en' => 'Ankara Caddesi No:306 Şeyhli Pendik 34906 İSTANBUL / TÜRKİYE',
                    'az' => 'Gedik, Azərbaycan',
                ],
                'phone' => '+994123456789',
                'fax' => '#',
                'email' => 'gedik@gedik.com.tr',
                'about_banner' => '#',
                'about_title' => [
                    'en' => 'Who We Are',
                    'az' => 'Biz Kimik',
                ],
                'about_desc' => [
                    'en' => 'A Timeline of Vision, Agility, Persistence, Innovation and Growth...',
                    'az' => 'Vizyon, Çeviklik, Davamlılıq İnnovasiya - İnkişafımızın xronologiyasıdır...',
                ],
                'about_iframe' => '<iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" height="400" src="https://www.youtube.com/embed/S45lRvc3uFs?si=pM8V2UixW5O_1x4R" width="100%"></iframe>',
                'contact_title' => [
                    'en' => 'Contact',
                    'az' => 'Bizimlə Əlaqə'
                ],
                'contact_image' => '/client/assets/images/kariyer-banner.jpg',
                'categories_title' => [
                    'en' => 'Categories',
                    'az' => 'Kateqoriyalar'
                ],
                'home_banner' => '/client/assets/images/presentation3.jpg',
                'logo_dark' => '/client/assets/images/logo/logo_dark.png',
                'logo_light' => '/client/assets/images/logo/logo_light.png',
                'favicon' => '/client/assets/images/favicon.ico',
                'iframe_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6076.261910844228!2d49.815549153506474!3d40.405949624831614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2saz!4v1722256752486!5m2!1str!2saz" loading="lazy" width="470" height="310" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ]);
        }
    }
}
