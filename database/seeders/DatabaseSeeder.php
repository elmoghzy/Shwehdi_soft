<?php

namespace Database\Seeders;

use App\Models\Bundle;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
            ]
        );

        $categories = collect([
            ['name' => 'أجهزة الكاشير', 'slug' => 'pos-devices'],
            ['name' => 'الطابعات', 'slug' => 'printers'],
            ['name' => 'قوارئ الباركود', 'slug' => 'barcode-scanners'],
            ['name' => 'البرمجيات', 'slug' => 'software'],
            ['name' => 'الموازين', 'slug' => 'scales'],
            ['name' => 'أدراج النقود', 'slug' => 'cash-drawers'],
            ['name' => 'حماية الطاقة', 'slug' => 'power-protection'],
        ])->mapWithKeys(fn (array $item) => [
            $item['slug'] => Category::query()->updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'image' => null,
                ]
            ),
        ]);

        $products = [
            [
                'category_slug' => 'pos-devices',
                'name' => 'Omega POS AIO 1789 Aluminum 17"',
                'slug' => 'omega-pos-screen-15',
                'brand' => 'Omega',
                'description' => 'شاشة كاشير عملية للمحلات والمطاعم مع استجابة لمس عالية.',
                'specs' => [
                    'الموديل' => 'Omega POS AIO 1789 Aluminum',
                    'المعالج' => 'Celeron J4125',
                    'الذاكرة' => '4GB RAM',
                    'التخزين' => '64GB SSD',
                    'الشاشة' => '17 Inch 10P Touch',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/omega-pos-aio-1789.webp',
            ],
            [
                'category_slug' => 'pos-devices',
                'name' => 'Ultra POS (WGB) Aluminum 15"',
                'slug' => 'ultra-pos-all-in-one',
                'brand' => 'UltraPOS',
                'description' => 'جهاز كاشير متكامل مناسب للفروع سريعة الحركة.',
                'specs' => [
                    'الموديل' => 'Ultra POS (WGB) Aluminum',
                    'المعالج' => 'Celeron J4125',
                    'الذاكرة' => '4GB RAM',
                    'التخزين' => '128GB SSD',
                    'الشاشة' => '15 Inch 10P Touch',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/ultra-pos-wgb.webp',
            ],
            [
                'category_slug' => 'printers',
                'name' => 'Xprinter 58mm Portable Thermal Printer',
                'slug' => 'xprinter-58mm-portable',
                'brand' => 'Xprinter',
                'description' => 'حلول طباعة إيصالات محمولة وذكية لأعمالكم. طابعة حرارية محمولة بعرض 58mm مع اتصال موثوق وتصميم مدمج مثالي للمطاعم والتوصيل والمحلات.',
                'specs' => [
                    'عرض الورق' => '58mm',
                    'نوع الطباعة' => 'حرارية مباشرة',
                    'التصميم' => 'Portable & Compact',
                    'الاتصال' => 'Bluetooth / USB',
                    'الموثوقية' => 'Reliable Connectivity',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'printers',
                'name' => 'NT-PC301D-LN Label Printer',
                'slug' => 'nt-pc301d-ln',
                'brand' => 'NT',
                'description' => 'طابعة ملصقات حرارية مباشرة بدقة 300 DPI مع اتصال LAN وUSB. مثالية لطباعة ملصقات الباركود وعلامات الأسعار والشحن.',
                'specs' => [
                    'النوع' => 'Direct Thermal Label Printer',
                    'الدقة' => '300 DPI',
                    'عرض الطباعة' => '108mm',
                    'سرعة الطباعة' => '127mm/s',
                    'الاتصال' => 'LAN (Ethernet) + USB',
                    'التوافق' => 'Windows / Mac / Linux',
                    'أنواع الملصقات' => 'ملصقات حرارية، ملصقات باركود، شحن',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'printers',
                'name' => 'Xprinter XP-237B',
                'slug' => 'xprinter-xp-237b',
                'brand' => 'Xprinter',
                'description' => 'طابعة إيصالات حرارية بتصميم أنيق ومدمج مع اتصال USB وBluetooth. مثالية للمطاعم والمحلات الصغيرة.',
                'specs' => [
                    'عرض الورق' => '58mm',
                    'سرعة الطباعة' => '90mm/s',
                    'نوع الطباعة' => 'حرارية مباشرة',
                    'الاتصال' => 'USB + Bluetooth',
                    'التوافق' => 'Windows / Android / iOS',
                    'قطر لفة الورق' => '50mm max',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/xprinter-xp-237b.webp',
            ],
            [
                'category_slug' => 'printers',
                'name' => 'Xprinter POS-80C',
                'slug' => 'xprinter-pos-80c',
                'brand' => 'Xprinter',
                'description' => 'طابعة فواتير حرارية بعرض 80mm مع اتصال USB وLAN، مثالية لنقاط البيع والمطاعم والمحلات التجارية. سرعة طباعة عالية وموثوقية ممتازة.',
                'specs' => [
                    'عرض الورق' => '80mm',
                    'سرعة الطباعة' => '300mm/s',
                    'نوع الطباعة' => 'حرارية مباشرة',
                    'الاتصال' => 'USB + LAN (Ethernet)',
                    'التوافق' => 'Windows / Linux / Mac / Android',
                    'قطر لفة الورق' => '83mm max',
                    'عمر رأس الطباعة' => '150 كم',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/xprinter-xp-q807k.webp',
            ],
            [
                'category_slug' => 'printers',
                'name' => 'Xprinter XP-Q200',
                'slug' => 'xprinter-xp-q200',
                'brand' => 'Xprinter',
                'description' => 'طابعة فواتير حرارية بسرعة عالية واعتمادية ممتازة.',
                'specs' => [
                    'سرعة الطباعة' => '200mm/s',
                    'عرض الورق' => '80mm',
                    'المنافذ' => 'USB، LAN',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/xprinter-q200.webp',
            ],
            [
                'category_slug' => 'barcode-scanners',
                'name' => 'HandyScan HS-120',
                'slug' => 'handyscan-hs-120',
                'brand' => 'HandyScan',
                'description' => 'قارئ باركود سلكي مناسب للسوبرماركت والصيدليات.',
                'specs' => [
                    'النوع' => '1D/2D',
                    'طريقة الاتصال' => 'USB',
                    'المدى' => 'حتى 35 سم',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/handyscan-hs120.webp',
            ],
            [
                'category_slug' => 'software',
                'name' => 'Retail ERP Suite',
                'slug' => 'retail-erp-suite',
                'brand' => 'Smart Retail',
                'description' => 'منظومة إدارة مبيعات ومخازن وتقارير تشغيلية.',
                'specs' => [
                    'الموديولات' => 'نقطة بيع، مخازن، مشتريات، تقارير',
                    'نوع الترخيص' => 'سنوي',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/retail-erp.webp',
            ],
            [
                'category_slug' => 'scales',
                'name' => 'Hongta Scale CL5000J',
                'slug' => 'hongta-scale-cl5000j',
                'brand' => 'Hongta',
                'description' => 'ميزان إلكتروني احترافي بطابعة ملصقات مدمجة، مثالي للسوبرماركت والمحلات التجارية. دقة وموثوقية لعملكم.',
                'specs' => [
                    'الموديل' => 'CL5000J',
                    'الطاقة الاستيعابية' => '15 كيلوجرام',
                    'الدقة' => '5 جرام',
                    'الشاشة' => 'LCD مزدوجة',
                    'الطابعة' => 'طابعة ملصقات حرارية مدمجة',
                    'المنافذ' => 'USB، RS232',
                    'البطارية' => 'تعمل بالتيار الكهربائي والبطارية',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'scales',
                'name' => 'Scale Label Pro 15K PLU',
                'slug' => 'scale-label-pro-15k',
                'brand' => 'Label Pro',
                'description' => 'ميزان تسعير إلكتروني بطابعة ملصقات مدمجة مع لوحة مفاتيح PLU للمواد الغذائية. مثالي للمخابز والسوبرماركت والمحلات التجارية.',
                'specs' => [
                    'الطاقة الاستيعابية' => '15 كيلوجرام',
                    'الدقة' => '5 جرام',
                    'الشاشة' => 'LCD مزدوجة (للعميل والبائع)',
                    'الطابعة' => 'طابعة ملصقات حرارية مدمجة',
                    'مفاتيح PLU' => 'أزرار مباشرة للمواد الغذائية',
                    'الوظائف' => 'Print، Cash، PLU',
                    'البطارية' => 'تعمل بالتيار الكهربائي والبطارية',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'cash-drawers',
                'name' => 'GSAN Cash Drawer 410mm',
                'slug' => 'gsan-cash-drawer-410',
                'brand' => 'GSAN',
                'description' => 'درج نقود احترافي من GSAN بتصميم متين وأنيق. يتكامل بسهولة مع أنظمة POS مع نظام قفل مضاعف للأمان التام.',
                'specs' => [
                    'الأبعاد' => '410mm × 415mm',
                    'المواد' => 'هيكل معدني محكم',
                    'القفل' => 'نظام قفل مفتاحي مزدوج',
                    'الأقسام' => '5 أقسام للأوراق النقدية + أقسام للعملات المعدنية',
                    'التوافق' => 'يدعم الاتصال مع طابعات الفواتير وأنظمة POS',
                    'اللون' => 'أسود',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'power-protection',
                'name' => 'MAXMA UPS 850VA Line Interactive',
                'slug' => 'maxma-ups-850va',
                'brand' => 'MAXMA',
                'description' => 'احم أجهزتك الثمينة! UPS تفاعلي بقدرة 850VA مع وظيفة AVR لتنظيم الجهد الكهربائي. مثالي لأجهزة الكاشير وأجهزة الكمبيوتر.',
                'specs' => [
                    'الموديل' => 'Static Converter 850VA',
                    'النوع' => 'Line Interactive UPS',
                    'القدرة' => '850VA',
                    'الجهد المدخل' => '238V',
                    'الجهد المخرج' => '238V',
                    'وظيفة AVR' => 'مدمجة لتنظيم الجهد',
                    'الشاشة' => 'LED مؤشرات (Line، Battery، Fault، AVR)',
                    'الأبعاد' => '325 × 139 × 210 mm',
                    'الألوان المتاحة' => 'رمادي، فضي، أسود، أبيض',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'barcode-scanners',
                'name' => 'OMEGAPOS 2D Barcode Scanner',
                'slug' => 'omegapos-2d-barcode-scanner',
                'brand' => 'OMEGAPOS',
                'description' => 'قارئ باركود عالي الأداء يدعم 2D و1D بتقنية AI لمنع قراءة الباركود نفسه مرتين. يقرأ الباركود من الورق والشاشة.',
                'specs' => [
                    'النوع' => '2D Paper & Screen + 1D',
                    'تقنية AI' => 'منع قراءة الباركود نفسه مرتين',
                    'سرعة القراءة' => 'Fast Scan',
                    'أنواع الباركود' => 'جميع أنواع الباركود عالي الكثافة',
                    'اللغات المدعومة' => 'متعدد لغات لوحة المفاتيح',
                    'التوافق' => 'Windows، Mac، Linux، Android',
                    'طريقة الاتصال' => 'USB',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => null,
            ],
            [
                'category_slug' => 'software',
                'name' => 'Restaurant POS Pro',
                'slug' => 'restaurant-pos-pro',
                'brand' => 'Smart Retail',
                'description' => 'منظومة متخصصة لإدارة المطاعم والكافيهات والطلبات.',
                'specs' => [
                    'الموديولات' => 'إدارة الطاولات، الطباعة بالمطبخ، Delivery',
                    'التكامل' => 'يدعم نقاط البيع والطابعات الحرارية',
                ],
                'price' => null,
                'is_in_stock' => true,
                'main_image' => 'images/products/restaurant-pos.webp',
            ],
        ];

        $productsBySlug = collect($products)->mapWithKeys(function (array $item) use ($categories) {
            $category = $categories->get($item['category_slug']);

            // On first create: set all fields including main_image.
            // On subsequent runs: update everything EXCEPT main_image
            // so dashboard-uploaded images are never overwritten by the seeder.
            $product = Product::query()->firstOrCreate(
                ['slug' => $item['slug']],
                [
                    'category_id' => $category->id,
                    'name'        => $item['name'],
                    'brand'       => $item['brand'],
                    'description' => $item['description'],
                    'specs'       => $item['specs'],
                    'price'       => $item['price'],
                    'is_in_stock' => $item['is_in_stock'],
                    'main_image'  => $item['main_image'] ?? null,
                ]
            );

            $product->update([
                'category_id' => $category->id,
                'name'        => $item['name'],
                'brand'       => $item['brand'],
                'description' => $item['description'],
                'specs'       => $item['specs'],
                'price'       => $item['price'],
                'is_in_stock' => $item['is_in_stock'],
                // main_image intentionally excluded — preserves dashboard uploads
            ]);

            return [$item['slug'] => $product];
        });

        $bundleStarter = Bundle::query()->updateOrCreate(
            ['slug' => 'starter-retail-kit'],
            [
                'name' => 'Starter Retail Kit',
                'description' => 'شاشة كاشير + طابعة فواتير + منظومة مبيعات أساسية.',
                'price' => 24990,
                'image' => null,
            ]
        );

        $bundleAdvanced = Bundle::query()->updateOrCreate(
            ['slug' => 'advanced-multi-branch-kit'],
            [
                'name' => 'Advanced Multi-Branch Kit',
                'description' => 'حل للفروع المتعددة مع تقارير مركزية ومخازن.',
                'price' => 37990,
                'image' => null,
            ]
        );

        $bundleRestaurant = Bundle::query()->updateOrCreate(
            ['slug' => 'restaurant-operating-kit'],
            [
                'name' => 'Restaurant Operating Kit',
                'description' => 'باقة تشغيل كاملة للمطاعم والكافيهات.',
                'price' => 33990,
                'image' => null,
            ]
        );

        $bundleStarter->products()->sync([
            $productsBySlug['omega-pos-screen-15']->id => ['quantity' => 1],
            $productsBySlug['xprinter-xp-q200']->id => ['quantity' => 1],
            $productsBySlug['xprinter-pos-80c']->id => ['quantity' => 1],
            $productsBySlug['retail-erp-suite']->id => ['quantity' => 1],
        ]);

        $bundleAdvanced->products()->sync([
            $productsBySlug['ultra-pos-all-in-one']->id => ['quantity' => 2],
            $productsBySlug['xprinter-xp-q200']->id => ['quantity' => 2],
            $productsBySlug['retail-erp-suite']->id => ['quantity' => 1],
            $productsBySlug['handyscan-hs-120']->id => ['quantity' => 2],
        ]);

        $bundleRestaurant->products()->sync([
            $productsBySlug['ultra-pos-all-in-one']->id => ['quantity' => 1],
            $productsBySlug['xprinter-xp-q200']->id => ['quantity' => 2],
            $productsBySlug['restaurant-pos-pro']->id => ['quantity' => 1],
        ]);

        $settings = [
            'site_name' => 'شركة الشويهدي للبرمجيات',
            'sales_phone' => '0911202090',
            'support_phone' => '0921212090 - 0924172090',
            'whatsapp_number' => '0911202090',
            'email' => 'ShwehdiSoft@gmail.com',
            'address' => 'نهاية طريق غوط الشعال باتجاه كوبري الغيران - مقابل محطة الوقود الغيران (بن غرسة) - مركز بوابة التقنية',
            'facebook_url' => 'https://facebook.com/',
            'instagram_url' => 'https://instagram.com/',
            'logo_path' => 'images/shwehdi-soft-logo.png',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
