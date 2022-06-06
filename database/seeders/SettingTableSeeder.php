<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
//            [
//                'name' => 'address',
//                'ar_value' => 'KSA',
//                'en_value' => 'KSA',
//                'type' => 'text',
//                'page' => 'إعدادات عامة',
//                'ar_title' => 'العنوان',
//                'en_title' => 'Address',
//                'slug' => 'address'
//            ],
//            [
//                'name' => 'phone',
//                'ar_value' => '+9665123250',
//                'en_value' => '+9665123560',
//                'type' => 'number',
//                'page' => 'إعدادات عامة',
//                'ar_title' => 'الهاتف',
//                'en_title' => 'phone',
//                'slug' => 'phone'
//            ],
            [
                'name' => 'mobile',
                'ar_value' => '+9665123250',
                'en_value' => '+9665123560',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الجوال',
                'en_title' => 'mobile',
                'slug' => 'mobile'
            ],
            [
                'name' => 'beneficial',
                'ar_value' => '111',
                'en_value' => '111',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'المستفيد',
                'en_title' => 'beneficial',
                'slug' => 'beneficial'
            ],
            [
                'name' => 'activities',
                'ar_value' => '111',
                'en_value' => '111',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'النشاط',
                'en_title' => 'activities',
                'slug' => 'activities'
            ],
            [
                'name' => 'years',
                'ar_value' => '111',
                'en_value' => '111',
                'type' => 'number',
                'page' => 'إعدادات عامة',
                'ar_title' => 'عدد السنوات',
                'en_title' => 'years',
                'slug' => 'years'
            ],
            [
                'name' => 'location',
                'ar_value' => 'location',
                'en_value' => 'location',
                'type' => 'url',
                'page' => 'إعدادات عامة',
                'ar_title' => 'الموقع على الخريطة ',
                'en_title' => 'location',
                'slug' => 'location'
            ],
//            [
//                'name' => 'facebook',
//                'ar_value' => 'https://www.facebook.com',
//                'en_value' => 'https://www.facebook.com',
//                'type' => 'url',
//                'page' => 'وسائل التواصل الاجتماعى',
//                'ar_title' => 'رابط الفيس بوك',
//                'en_title' => 'facebook',
//                'slug' => 'facebook'
//            ],
            [
                'name' => 'twitter',
                'ar_value' => 'https://www.twitter.com',
                'en_value' => 'https://www.twitter.com',
                'type' => 'url',
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط تويتر',
                'en_title' => 'twitter',
                'slug' => 'twitter'
            ],
            [
                'name' => 'youtube',
                'ar_value' => 'https://www.youtube.com',
                'en_value' => 'https://www.youtube.com',
                'type' => 'url',
                'page' => 'وسائل التواصل الاجتماعى',
                'ar_title' => 'رابط يوتيوب',
                'en_title' => 'youtube',
                'slug' => 'youtube'
            ],
//            [
//                'name' => 'instagram',
//                'ar_value' => 'https://www.instagram.com',
//                'en_value' => 'https://www.instagram.com',
//                'type' => 'url',
//                'page' => 'وسائل التواصل الاجتماعى',
//                'ar_title' => 'رابط  الانستجرام',
//                'en_title' => 'instagram',
//                'slug' => 'instagram'
//            ],
//            [
//                'name' => 'about',
//                'ar_value' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو وكأنها نص مقروء. ',
//                'en_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
//                'page' => 'الصفحات الثابتة',
//                'type' => 'long_text',
//                'ar_title' => 'من نحن',
//                'en_title' => 'Who-We-Are',
//                'slug' => 'about_us'
//            ],

            [
                'name' => 'homepage_text',
                'ar_value' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو وكأنها نص مقروء. ',
                'en_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'page' => 'الصفحات الثابتة',
                'type' => 'long_text',
                'ar_title' => 'دور الجمعية فى تحقيق رؤية الممكلة 2030',
                'en_title' => 'دور الجمعية فى تحقيق رؤية الممكلة 2030',
                'slug' => 'homepage_text'
            ],
            [
                'name' => 'association_role_image',
                'ar_value' => ' ',
                'en_value' => ' ',
                'page' => 'الصفحات الثابتة',
                'type' => 'file',
                'ar_title' => 'صورة دور الجمعية فى تحقيق رؤية الممكلة 2030',
                'en_title' => 'صورة دور الجمعية فى تحقيق رؤية الممكلة 2030',
                'slug' => 'association_role_image'
            ],
            [
                'name' => 'quran_mainpage',
                'ar_value' => '',
                'en_value' => '',
                'page' => 'إعدادات عامة',
                'type' => 'file',
                'ar_title' => 'الايه القرآنية فى الرئيسية',
                'en_title' => 'Home Page Quran',
                'slug' => 'quran_mainpage'
            ],

//            [
//                'name' => 'form_image',
//                'ar_value' => '',
//                'en_value' => '',
//                'page' => ' صورة الفورمة',
//                'type' => 'file',
//                'ar_title' => 'صورة الفورمة ',
//                'en_title' => 'form_image',
//                'slug' => 'form_image'
//            ],


        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

    }
}
