<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Setting::exists())) {
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
                    'en' => '<br /><br />
                    Gedik Holding is a Turkish company headquartered in Istanbul successfully continuing its activities with Gedik Welding, Gedik Advanced Casting Technologies, Gedik Termo Valve, Gedik Health Services Companies, Istanbul Gedik University, Gedik Test Center, Gedik Art and Radio Gedik with more than 1600 employees since 1963.
                    <br /><br />
                    Over the years, we have not only created many "firsts", but also became one of the most valuable exporters of Turkey. Now we are on all continents with more than 100 countries.
                    <br /><br />
                    While developing a truly global brand, we continuously adapt to the New World with innovative ideas as we strengthen our sustainability.<br /><br />
                    ',
                    'az' => '<br /><br />
                    100-dən çox ölkəyə ixrac edilir 1963 I Peşəkarlıq və böyük təcrübə GEDIK QAYNAQ, Avropanın ən böyük istehsalçılarından biridir və beynəlxalq səviyyədə tanınmış GeKa®, GeKaTec® və GeKaMac® brendləri altında dünyanın 100-dən çox ölkəsinə qaynaq materialları və qaynaq avadanlığını ixrac edir.
                    <br /><br />
                    Şirkət həmçinin robotik həllər təklif edir və RoboWELD® brendi altında həm Türkiyədə, həm də xaricdə müxtəlif sahələrdə qaynaq avtomatizasiyası üçün avadanlıq istehsal edir.
                    <br /><br />
                    GEDİK QAYNAQ 1963-cü ildə yaradılmışdır və bu gün qaynaq materialları və avadanlıq növləri sahəsində dünyada liderdir.
                    <br /><br />
                    Şirkət, ildə 100.000 ton keyfiyyətli örtüklü qaynaq elektrodları, lehimləmə çubuqları, təmir və texniki xidmət üçün xüsusi əşyalar, həmçinin qorunan qaz mühitində arklar, flüsaltı arklar, toz qaynaq məftilləri, düzəldicilər, qorunan qaz mühitində və flüsaltı arklar üçün generatorlar istehsal edir.<br /><br />
                    ',
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
                    'en' => ' A Timeline of Vision, Agility, Persistence, Innovation and Growth
                            <br /><br />
                            For more than 60 years, our engineers, our employees, our researchers have been working hard to make a difference for a variety of manufacturing sectors to assure the dynamic world we are in takes us to the global arena to make the world a better place.
                            <br /><br />
                            Our roots have been planted in Turkey with the exceptional vision of our founder, “Halil Kaya Gedik”, in a country that is called the “center of the earth” for being a bridge between continents. This position led us to reaching over 100 countries on all continents and continuing to grow. As we are expanding our horizons, we have also established Gedik locations in countries such as Holland, Serbia, Azerbaijan, UAE and India.
                            <br /><br />
                            Throughout the years, we developed a unique structure where welding engineering, valve production, advanced casting technologies as well as educational facilities including Gedik University to raise the best minds to grow and offer effective solutions to our partners while we try make the world a better place for all humankind.
                            <br /><br />
                            Continuing Education is our foremost criterion for success because we believe that education and training solve the world’s greatest challenges.
                            <br /><br />
                            Our division, Gedik ART, is also a unique feature for us. Welding engineering requires creativity and is considered both as “art” and technology. Furthermore, ART penetrates through all employees providing creative thinking, compassion and camaraderie.
                            <br /><br />
                            Our value for the sectors we serve represents immaculate engineering, innovative thinking, and a focus on safety on an interconnected platform- and that makes us the only company that can serve these values connectedly. ',
                    'az' => ' "Vizyon, Çeviklik, Davamlılıq İnnovasiya - İnkişafımızın xronologiyasıdır!
                            <br /><br />
                            60 ildən artıqdır ki,mühəndislərimiz, əməkdaşlarımız və tədqiqatçılarımız dinamik dünyamızda Gedik markasının qloballaşmasını gücləndirmək, müxtəlif aşkın süredir mühendislerimiz, çalışanlarımız, araştırmacılarımız, dinamik dünyamızda Gedik markasının qloballaşmasını gecləndirmək müxtəlif istehsal sektorlarında fərq yaratmaq və dünyaya fayda və dəyər təqdim etmək üçün çalışırlar.
                            <br /><br />
                            Köklərimiz, qurucumuz Halil Kaya Gedikin fövqəladə dünya görüşü və yerinə görə qitələr arasında körpü olması həm də dünyanın mərkəzi kimi Türkiyədə qoyulmuşdur. Bu mövqeyimiz, bütün qitələrdə 100dən çox ölkəyə çatmağa və böyüməyə davam etməyimizə rəhbərlik etti.
                            <br /><br />
                            Bundan əlavə, üfiqlərimizi genişləndirmək üçün Hollandiya, Serbiya, Azərbaycan, BƏƏ və Hindistan kimi ölkələrdə Gedik məkanları qurduq və 2025-ci il planlarımızda bu siyahıya yeni bazarlar əlavə etməyə davam edirik.
                            <br /><br />
                            Bu illər ərzində biz qaynaq mühəndisliyi,klapan istehsalı və qabaqcıl tökmə texnologiyalarını, həmçinin Gedik Təhsil Vəqfinin çətiri altında Gedik Test Mərkəzi və Gedik Universiteti kimi təhsil müəssisələrini özündə birləşdirən unikal struktur inkişaf etdirdik. Bu bağlayıcı struktur sayəsində biz daha da böyüməyi və tərəfdaşlarımıza effektiv həllər təqdim etməyi hədəfləyirik. Yol xəritəmizin əsas hissəsi təhsilə yönəlib və ən yaxşı beyinləri yetişdirmək üçün çalışırıq.Bu səbəbdən təhsilin davam etdirilməsi bizim ən mühüm uğur meyarımızdır, çünki təhsil və təlimin dünyanın ən böyük problemlərini həll edə biləcəyinə inanırıq.
                            <br /><br />
                            Gedik Sənət ilə yaradıcılığımızı inkişaf etdiririk və sənətin birləşdirici və yaxşılaşdıran gücünə olan inancımızı vurğulayırıq. Radio Gedik ilə işçilərimizin həyatın bütün sahələrində biliklərinin artırılmasına töhfə veririk.
                            <br /><br />
                            Xidmət etdiyimiz sektorlar üçün dəyərimiz qüsursuz mühəndislik, yenilikçi düşüncə və bir-birine bağlı platformada təhlükəsizliyə diqqət yetirməkdir. Bu da bizi Gedik olaraq digərlərindən daha fərqli edir.. '
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
                'logo_dark' => '/client/assets/images/logo/logo_dark.png',
                'logo_light' => '/client/assets/images/logo/logo_light.png',
                'favicon' => '/client/assets/images/favicon.ico',
                'iframe_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.8638179382419!2d49.83870372851556!3d40.397872498207725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d7b10b31bbf%3A0xb8a84dda46c78a5!2sADAS%2F%20Azerbaijan%20Digital%20Arts%20School!5e1!3m2!1str!2saz!4v1720423635494!5m2!1str!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ]);
        }
    }
}
