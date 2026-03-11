<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        @php
            $headLogoPath = $siteSettings['logo_path'] ?? null;
            $headHasLogo = $headLogoPath && file_exists(public_path($headLogoPath));
            $headLogoDisplayPath = null;
            $headLogoType = null;

            if ($headHasLogo) {
                $headLogoDisplayPath = $headLogoPath;

                if (preg_match('/\.(png|jpe?g)$/i', $headLogoPath)) {
                    $headWebpCandidate = preg_replace('/\.(png|jpe?g)$/i', '.webp', $headLogoPath);

                    if ($headWebpCandidate && file_exists(public_path($headWebpCandidate))) {
                        $headLogoDisplayPath = $headWebpCandidate;
                        $headLogoType = 'image/webp';
                    }
                }
            }
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'أنظمة المبيعات وأجهزة الكاشير')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Changa:wght@600;700&display=swap" rel="stylesheet">
        @if ($headLogoDisplayPath)
            <link rel="preload" as="image" href="{{ asset($headLogoDisplayPath) }}" @if ($headLogoType) type="{{ $headLogoType }}" @endif fetchpriority="high">
        @endif

        {{-- Apply saved theme immediately to prevent flash --}}
        <script>
            (function() {
                var t = localStorage.getItem('theme');
                if (!t) t = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', t);
            })();
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @php
            $brandName = $siteSettings['site_name'] ?? 'Shwehdi Soft';
            $logoPath = $siteSettings['logo_path'] ?? null;
            $hasLogo = $logoPath && file_exists(public_path($logoPath));
            $logoDisplayPath = $logoPath;

            if ($hasLogo && preg_match('/\.(png|jpe?g)$/i', $logoPath)) {
                $webpCandidate = preg_replace('/\.(png|jpe?g)$/i', '.webp', $logoPath);

                if ($webpCandidate && file_exists(public_path($webpCandidate))) {
                    $logoDisplayPath = $webpCandidate;
                }
            }

            $salesPhone = $siteSettings['sales_phone'] ?? '0911202090';
            $supportPhone = $siteSettings['support_phone'] ?? '0921212090 - 0924172090';
            $siteEmail = $siteSettings['email'] ?? 'ShwehdiSoft@gmail.com';
            $siteAddress = $siteSettings['address'] ?? 'نهاية طريق غوط الشعال باتجاه كوبري الغيران - مقابل محطة الوقود الغيران (بن غرسة) - مركز بوابة التقنية';
            $siteCity = $siteSettings['city'] ?? 'طرابلس، ليبيا';
            $waRaw = $siteSettings['whatsapp_number'] ?? $salesPhone;
            $waNumber = preg_replace('/\D+/', '', $waRaw);
            // Libyan numbers start with 0 — replace with country code 218
            if (str_starts_with($waNumber, '0')) {
                $waNumber = '218' . substr($waNumber, 1);
            }
            $waUrl = $waNumber ? 'https://wa.me/'.$waNumber : null;
        @endphp

        <div class="site-bg"></div>

        <header class="site-header">
            <div class="container nav-wrap">

                {{-- Brand: always visible --}}
                <a class="brand" href="{{ route('home') }}">
                    @if ($hasLogo)
                        <img class="brand-logo" src="{{ asset($logoDisplayPath) }}" alt="{{ $brandName }} logo" width="40" height="40" loading="eager" decoding="async" fetchpriority="high">
                    @else
                        <span class="brand-badge">SH</span>
                    @endif
                    <span>{{ $brandName }}</span>
                </a>

                {{-- Desktop: centered nav links --}}
                <nav class="main-nav" id="mainNav">
                    <a @class(['active' => request()->routeIs('home')]) href="{{ route('home') }}">الرئيسية</a>
                    <a @class(['active' => request()->routeIs('software.index')]) href="{{ route('software.index') }}">المنظومات</a>
                    <a @class(['active' => request()->routeIs('hardware.*')]) href="{{ route('hardware.index') }}">المنتجات</a>

                    <a @class(['active' => request()->routeIs('about')]) href="{{ route('about') }}">من نحن</a>
                    <a @class(['active' => request()->routeIs('contact.*')]) href="{{ route('contact.create') }}">تواصل</a>

                    {{-- Theme toggle lives inside the drawer on mobile, bottom of nav --}}
                    <div class="nav-theme-row">
                        <span class="nav-theme-label">تبديل المظهر</span>
                        <button class="theme-toggle" id="themeToggle" aria-label="تبديل المظهر">
                            <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                            <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                        </button>
                    </div>
                </nav>

                {{-- Desktop theme toggle (hidden on mobile) --}}
                <button class="theme-toggle desktop-theme-toggle" id="themeToggleDesktop" aria-label="تبديل المظهر">
                    <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                    <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                </button>

                {{-- Hamburger: mobile only --}}
                <button class="nav-toggle" id="navToggle" aria-label="فتح القائمة" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>

            </div>
        </header>

        <main class="container page-shell">
            @yield('content')
        </main>

        {{-- ===== LOCATION SECTION ===== --}}
        <section class="location-section">
            <div class="container">
                <div class="location-header">
                    <h2>موقعنا</h2>
                    <p>نسعد بزيارتكم في مقرنا الرئيسي</p>
                </div>

                <div class="location-card">
                    <div class="location-map">
                        <iframe
                            src="https://www.google.com/maps?q=مركز+بوابة+التقنية+غوط+الشعال+طرابلس+ليبيا&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <a class="map-open-btn" href="https://www.google.com/maps/search/مركز+بوابة+التقنية+غوط+الشعال+طرابلس+ليبيا" target="_blank" rel="noopener noreferrer">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            فتح في خرائط جوجل
                        </a>
                    </div>

                    <div class="location-info">
                        <div class="location-badge">
                            <span class="badge-icon">🏢</span>
                            <span>المقر الرئيسي</span>
                        </div>

                        <div class="location-detail">
                            <div class="detail-icon">📍</div>
                            <div>
                                <strong>العنوان</strong>
                                <p>{{ $siteAddress }}</p>
                                <p>{{ $siteCity }}</p>
                            </div>
                        </div>

                        <div class="location-detail">
                            <div class="detail-icon">📞</div>
                            <div>
                                <strong>المبيعات</strong>
                                <p><a href="tel:{{ $salesPhone }}">{{ $salesPhone }}</a></p>
                            </div>
                        </div>

                        <div class="location-detail">
                            <div class="detail-icon">🛠</div>
                            <div>
                                <strong>الدعم الفني</strong>
                                <p>{{ $supportPhone }}</p>
                            </div>
                        </div>

                        <div class="location-detail">
                            <div class="detail-icon">📧</div>
                            <div>
                                <strong>البريد الإلكتروني</strong>
                                <p><a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="site-footer">
            <div class="container footer-grid">
                <div>
                    <h4>تواصل معنا</h4>
                    <p>
                        <span>📞 المبيعات: <a href="tel:{{ $salesPhone }}">{{ $salesPhone }}</a></span>
                        <span>🛠 الدعم الفني: {{ $supportPhone }}</span>
                        <span>📧 {{ $siteEmail }}</span>
                    </p>
                </div>
                <div>
                    <h4>العنوان</h4>
                    <p>
                        <span>📍 {{ $siteAddress }}</span>
                        <span>{{ $siteCity }}</span>
                    </p>
                </div>
                <div>
                    <h4>روابط سريعة</h4>
                    <p>
                        <a href="{{ route('home') }}">الرئيسية</a>
                        <a href="{{ route('hardware.index') }}">المنتجات</a>
                        <a href="{{ route('about') }}">من نحن</a>
                        <a href="{{ route('contact.create') }}">طلب استشارة</a>
                    </p>
                </div>
            </div>
            <div class="container footer-copy">
                <p>© {{ date('Y') }} {{ $brandName }} — جميع الحقوق محفوظة | #شركة_الشويهدي</p>
            </div>
        </footer>

        @if ($waUrl)
            <a class="floating-wa" href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" aria-label="واتساب">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </a>
        @endif
    </body>
</html>
