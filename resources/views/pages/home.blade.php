@extends('layouts.marketing')

@section('title', 'الشويهدي سوفت | منظومة الشويهدي لإدارة المبيعات والمخازن')

@section('content')
    @php
        $heroLogoPath = $siteSettings['logo_path'] ?? null;
        $hasHeroLogo = $heroLogoPath && file_exists(public_path($heroLogoPath));
        $heroLogoDisplayPath = $heroLogoPath;

        if ($hasHeroLogo && preg_match('/\.(png|jpe?g)$/i', $heroLogoPath)) {
            $heroWebpCandidate = preg_replace('/\.(png|jpe?g)$/i', '.webp', $heroLogoPath);

            if ($heroWebpCandidate && file_exists(public_path($heroWebpCandidate))) {
                $heroLogoDisplayPath = $heroWebpCandidate;
            }
        }

        $heroBrandName = $siteSettings['site_name'] ?? 'Shwehdi Soft';

        $homeBenefits = [
            [
                'title' => 'تشغيل سريع بدون تعقيد',
                'text' => 'نركب النظام بالكامل ونضبط الأجهزة والفواتير من أول يوم.',
            ],
            [
                'title' => 'منظومة واحدة لكل الفروع',
                'text' => 'إدارة الفروع والمخزون والتقارير من لوحة مركزية موحدة.',
            ],
            [
                'title' => 'دعم فني مستمر',
                'text' => 'فريق دعم جاهز للمساعدة وحل الأعطال ومتابعة الأداء يوميًا.',
            ],
        ];

        $implementationSteps = [
            [
                'title' => 'فهم احتياج نشاطك',
                'text' => 'نحدد نوع النشاط وحجم المبيعات ونختار الأجهزة والمنظومة المناسبة.',
            ],
            [
                'title' => 'تركيب وتجهيز كامل',
                'text' => 'تركيب الأجهزة وربط الباركود والطابعة وإعداد المستخدمين والصلاحيات.',
            ],
            [
                'title' => 'تدريب فريق العمل',
                'text' => 'تدريب عملي على البيع اليومي والجرد والتقارير لضمان تشغيل سلس.',
            ],
            [
                'title' => 'متابعة وتطوير',
                'text' => 'نراقب الأداء ونقترح تحسينات تساعدك تزود المبيعات وتقلل الأخطاء.',
            ],
        ];

        $faqItems = [
            [
                'question' => 'هل النظام مناسب للمحلات الصغيرة والكبيرة؟',
                'answer' => 'نعم، لدينا حلول مرنة تبدأ من نقطة بيع واحدة وتدعم التوسع لعدة فروع ومخازن.',
            ],

            [
                'question' => 'هل يوجد تدريب بعد التركيب؟',
                'answer' => 'نعم، نقدم تدريبًا عمليًا للموظفين على الفواتير، الجرد، وإدارة التقارير اليومية.',
            ],
            [
                'question' => 'ماذا يحدث إذا حصل عطل؟',
                'answer' => 'يوجد دعم فني سريع عبر الهاتف وواتساب مع متابعة مباشرة حتى حل المشكلة بالكامل.',
            ],
            [
                'question' => 'هل أقدر أطلب باقة جاهزة بدل شراء كل جهاز وحده؟',
                'answer' => 'بالتأكيد، يمكنك اختيار باقات متكاملة تشمل الأجهزة والبرنامج مع سعر أوفر.',
            ],
        ];
    @endphp

    <section class="home-hero panel">
        <div class="hero-copy">
            <h1>جهز نشاطك بمنظومة احترافية تدير البيع والمخزون بدقة</h1>
            <p>حل متكامل يجمع البرنامج والأجهزة والتدريب والدعم الفني، لتبدأ التشغيل بسرعة وتتابع مبيعاتك لحظة بلحظة.</p>

            <div class="hero-points">
                <span>تركيب ة</span>
                <span>تدريب فريق العمل</span>
                <span>تقارير لحظية دقيقة</span>
            </div>

            <div class="hero-actions">
                <a class="btn btn-primary" href="{{ route('contact.create') }}">اطلب عرض سعر</a>
                <a class="btn btn-secondary" href="{{ route('hardware.index') }}">شاهد المنتجات</a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-logo-stage">
                <span class="orbit orbit-one"></span>
                <span class="orbit orbit-two"></span>

                <div class="hero-brand-row">
                    <div class="hero-logo-shell">
                        @if ($hasHeroLogo)
                            <img class="hero-logo" src="{{ asset($heroLogoDisplayPath) }}" alt="{{ $heroBrandName }} logo" width="160" height="160" loading="eager" decoding="async" fetchpriority="high">
                        @else
                            <span class="hero-logo-fallback">SH</span>
                        @endif
                    </div>

                    <div class="hero-brand-copy">
                        <strong>{{ $heroBrandName }}</strong>
                        <p>أنظمة كاشير متكاملة مصممة لتسهيل التشغيل اليومي وتسريع خدمة العملاء.</p>
                    </div>
                </div>

                <span class="pulse-dot pulse-left"></span>
                <span class="pulse-dot pulse-right"></span>
            </div>

            <div class="hero-metrics">
                <article>
                    <strong>{{ number_format($totalProducts) }}</strong>
                    <p>منتج في الكتالوج</p>
                </article>
                <article>
                    <strong>{{ number_format($inStockProducts) }}</strong>
                    <p>منتج متوفر الآن</p>
                </article>
                <article>
                    <strong>{{ number_format($totalCategories) }}</strong>
                    <p>قسم مختلف</p>
                </article>
            </div>
        </div>
    </section>

    <section class="stack">
        <div class="section-head">
            <h2>لماذا تختارنا؟</h2>
        </div>
        <div class="card-grid cols-3">
            @foreach ($homeBenefits as $benefit)
                <article class="card icon-card feature-card">
                    <h3>{{ $benefit['title'] }}</h3>
                    <p>{{ $benefit['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="stack">
        <div class="section-head">
            <h2>منتجات مختارة</h2>
            <a href="{{ route('hardware.index') }}">عرض الكتالوج الكامل</a>
        </div>

        <div class="card-grid cols-3 home-products-grid">
            @forelse ($featuredProducts as $product)
                <a href="{{ route('hardware.show', $product) }}" class="product-card-link">
                <article class="card product-showcase">
                    <div class="product-showcase-media">
                        @if ($product->main_image)
                            <img src="{{ asset('storage/'.$product->main_image) }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                            <div class="product-showcase-fallback">بدون صورة</div>
                        @endif

                        <span @class(['product-state', 'in' => $product->is_in_stock, 'out' => !$product->is_in_stock])>
                            {{ $product->is_in_stock ? 'متوفر' : 'غير متوفر' }}
                        </span>
                    </div>

                    <div class="card-body">
                        <p class="product-category">{{ $product->category?->name ?? 'منتجات متنوعة' }}</p>
                        <h3>{{ $product->name }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($product->description ?: 'جهاز عملي يدعم بيئة البيع اليومية مع أداء ثابت وسريع.', 110) }}</p>
                    </div>

                    <div class="card-footer">
                        <strong class="product-price">{{ $product->price ? number_format((float) $product->price, 0).' د.ل' : 'حسب العرض' }}</strong>
                        <span class="card-details-btn">التفاصيل</span>
                    </div>
                </article>
                </a>
            @empty
                <article class="card empty">
                    <p>لا توجد منتجات مميزة الآن. يمكنك إضافة منتجات من لوحة التحكم.</p>
                </article>
            @endforelse
        </div>
    </section>

    <section class="stack panel">
        <div class="section-head">
            <h2>توزيع المنتجات حسب الأقسام</h2>
            <a href="{{ route('hardware.index') }}">فتح صفحة المنتجات</a>
        </div>

        <div class="stats-grid home-category-grid">
            @forelse ($categoryStats as $category)
                <a href="{{ route('hardware.index', ['category' => $category->slug]) }}" class="category-card-link">
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->products_count }} منتج</p>
                    <span>{{ $category->products_count > 1 ? 'خيارات متعددة' : 'خيار متخصص' }}</span>
                </a>
            @empty
                <article>
                    <h3>جاهز للإطلاق</h3>
                    <p>ابدأ بإضافة الأقسام من لوحة التحكم.</p>
                    <span>سيظهر التصنيف هنا تلقائيًا</span>
                </article>
            @endforelse
        </div>
    </section>

    <section class="stack">
        <div class="section-head">
            <h2>كيف يتم التنفيذ؟</h2>
        </div>

        <div class="process-grid">
            @foreach ($implementationSteps as $step)
                <article class="process-step">
                    <span class="step-index">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="stack panel">
        <div class="section-head">
            <h2>الأسئلة الشائعة (FAQ)</h2>
        </div>

        <div class="faq-list">
            @foreach ($faqItems as $item)
                <details class="faq-item" @if ($loop->first) open @endif>
                    <summary>{{ $item['question'] }}</summary>
                    <p>{{ $item['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </section>

    <section class="panel home-cta-band">
        <h2>جاهز تطور نظام البيع عندك؟</h2>
        <p>احجز مكالمة سريعة مع فريقنا لتحديد أفضل منظومة وأجهزة مناسبة لنشاطك.</p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="{{ route('contact.create') }}">ابدأ الآن</a>
            <a class="btn btn-secondary" href="{{ route('bundles.index') }}">شاهد الباقات</a>
        </div>
    </section>
@endsection
