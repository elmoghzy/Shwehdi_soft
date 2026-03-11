@extends('layouts.marketing')

@section('title', 'من نحن | Shwehdi Soft')

@section('content')
<div class="bg-slate-900 text-slate-100 font-sans antialiased">

    {{-- ============================================================ --}}
    {{-- 1. HERO SECTION                                               --}}
    {{-- ============================================================ --}}
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 overflow-hidden bg-slate-900">
        <div class="absolute -top-16 -right-16 h-72 w-72 rounded-full opacity-20 blur-3xl"
             style="background: radial-gradient(circle, #3b82f6, transparent 70%);"></div>
        <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full opacity-15 blur-3xl"
             style="background: radial-gradient(circle, #6366f1, transparent 70%);"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block rounded-full border border-blue-500/30 bg-blue-500/10 px-5 py-1.5 text-sm font-semibold text-blue-300 shadow-sm mb-6 backdrop-blur-sm">
                شريكك التقني الأول
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                نبني تقنية تنمو <br class="hidden md:block">
                <span class="bg-gradient-to-l from-blue-400 to-cyan-300 bg-clip-text text-transparent">مع طموحك</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg md:text-xl text-slate-300 leading-relaxed">
                لا نقدّم لك مجرد برنامج — بل منظومة متكاملة من <strong class="text-white">أنظمة ERP</strong> و<strong class="text-white">أجهزة POS</strong> احترافية تعمل بتناغم تام، حتى تركّز أنت على ما يهم: <span class="text-blue-300 font-semibold">تنمية أعمالك</span>.
            </p>
            <div class="mt-14 grid grid-cols-1 gap-5 sm:grid-cols-3 max-w-3xl mx-auto">
                <div class="group rounded-2xl border border-slate-700/80 bg-slate-800/60 backdrop-blur-sm px-6 py-6 shadow-sm transition-all duration-300 hover:border-blue-500/40 hover:bg-slate-800/80 hover:-translate-y-1">
                    <p class="text-4xl font-extrabold bg-gradient-to-l from-blue-400 to-cyan-300 bg-clip-text text-transparent">+99%</p>
                    <p class="mt-2 text-sm text-slate-400 font-medium">رضا العملاء</p>
                </div>
                <div class="group rounded-2xl border border-slate-700/80 bg-slate-800/60 backdrop-blur-sm px-6 py-6 shadow-sm transition-all duration-300 hover:border-blue-500/40 hover:bg-slate-800/80 hover:-translate-y-1">
                    <p class="text-4xl font-extrabold bg-gradient-to-l from-blue-400 to-cyan-300 bg-clip-text text-transparent">24/7</p>
                    <p class="mt-2 text-sm text-slate-400 font-medium">دعم فني بلا انقطاع</p>
                </div>
                <div class="group rounded-2xl border border-slate-700/80 bg-slate-800/60 backdrop-blur-sm px-6 py-6 shadow-sm transition-all duration-300 hover:border-blue-500/40 hover:bg-slate-800/80 hover:-translate-y-1">
                    <p class="text-4xl font-extrabold bg-gradient-to-l from-blue-400 to-cyan-300 bg-clip-text text-transparent">حل شامل</p>
                    <p class="mt-2 text-sm text-slate-400 font-medium">برمجيات + أجهزة من مصدر واحد</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 2. OUR STORY                                                  --}}
    {{-- ============================================================ --}}
    <section class="py-16 md:py-24 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">

                <div class="mb-12 lg:mb-0">
                    <span class="inline-block rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-blue-300 mb-4">قصتنا</span>
                    <h2 class="mt-3 text-3xl md:text-4xl font-bold text-white mb-6 leading-snug">
                        لأن التكامل ليس رفاهية —<br>
                        <span class="text-blue-400">بل هو أساس نجاح أعمالك</span>
                    </h2>
                    <div class="space-y-5 text-base text-slate-300 leading-[1.85]">
                        <p>
                            في <strong class="text-white font-semibold">Shwehdi Soft</strong> عشنا تحديات أصحاب الأعمال عن قرب — التعامل مع شركة للبرمجيات وأخرى للأجهزة وثالثة للدعم. فقررنا أن نقدم حلاً مختلفاً:
                            <span class="font-bold text-blue-400">"تسليم مفتاح"</span>
                            يشمل كل شيء من لحظة التحليل حتى التشغيل الفعلي والدعم المستمر.
                        </p>
                        <p>
                            نجمع بين أنظمة ERP المتقدمة وأفضل أجهزة السوق مثل
                            <strong class="text-white">Ultra POS</strong> و<strong class="text-white">Omega POS</strong> وطابعات <strong class="text-white">Xprinter</strong> — كلها متكاملة ومُختبرة ومدعومة من فريق واحد يعرف نظامك بالتفصيل.
                        </p>
                    </div>
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="rounded-xl border border-slate-600/80 bg-gradient-to-br from-slate-700 to-slate-800 p-5 transition-all duration-300 hover:border-blue-500/30">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="inline-flex h-7 w-7 items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                </span>
                                <p class="text-xs text-slate-400">الأجهزة المعتمدة</p>
                            </div>
                            <p class="font-bold text-white">Omega POS · Xprinter</p>
                        </div>
                        <div class="rounded-xl border border-slate-600/80 bg-gradient-to-br from-slate-700 to-slate-800 p-5 transition-all duration-300 hover:border-blue-500/30">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="inline-flex h-7 w-7 items-center justify-center rounded-lg bg-teal-500/10 text-teal-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </span>
                                <p class="text-xs text-slate-400">منهجية العمل</p>
                            </div>
                            <p class="font-bold text-white">تحليل · تنفيذ · دعم</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative overflow-hidden rounded-3xl border border-slate-600 bg-gradient-to-br from-slate-700 via-slate-800 to-slate-700 shadow-sm min-h-72 flex items-center justify-center p-8">
                        <div class="absolute inset-0 opacity-20"
                             style="background-image: radial-gradient(#475569 1px, transparent 1px); background-size: 22px 22px;"></div>
                        <div class="relative z-10 text-center">
                            <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-2xl border border-slate-600 bg-slate-800 shadow-sm">
                                <svg class="h-10 w-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="font-bold text-white text-lg">منظومة متكاملة</p>
                            <p class="mt-2 text-sm text-slate-400">ERP · POS · أجهزة طرفية · تقارير</p>
                            <div class="mt-5 flex flex-wrap justify-center gap-2 text-xs font-semibold">
                                <span class="rounded-lg border border-blue-500 bg-blue-900/50 px-3 py-1.5 text-blue-300">ERP</span>
                                <span class="rounded-lg border border-slate-600 bg-slate-700 px-3 py-1.5 text-slate-300">POS</span>
                                <span class="rounded-lg border border-blue-500 bg-blue-900/50 px-3 py-1.5 text-blue-300">Xprinter</span>
                                <span class="rounded-lg border border-slate-600 bg-slate-700 px-3 py-1.5 text-slate-300">Reports</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 3. WHY WE ARE DIFFERENT                                       --}}
    {{-- ============================================================ --}}
    <section class="py-16 md:py-24 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-block rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-blue-300 mb-4">لماذا نحن</span>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-white">ما الذي يميّز <span class="text-blue-400">Shwehdi Soft</span>؟</h2>
                <p class="mt-4 text-base text-slate-300 leading-relaxed max-w-xl mx-auto">
                    ثلاث ركائز تجعل تجربتك معنا مختلفة — حتى تنام مرتاح البال بدون أي قلق تقني.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="group relative overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 p-8 shadow-sm transition-shadow duration-300 hover:shadow-lg hover:border-slate-600">
                    <div class="absolute top-0 right-0 h-32 w-32 -translate-y-1/2 translate-x-1/2 rounded-full bg-blue-900 opacity-40 blur-2xl"></div>
                    <div class="relative">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-xl border border-blue-700 bg-blue-900/50 p-3">
                            <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">مورد واحد — راحة بال كاملة</h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            انسَ التعامل مع عدة جهات. النظام، الشاشة، الطابعة، والدعم الفني — كلها تأتيك من مصدر واحد يتحمل المسؤولية الكاملة.
                        </p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 p-8 shadow-sm transition-shadow duration-300 hover:shadow-lg hover:border-slate-600">
                    <div class="absolute top-0 right-0 h-32 w-32 -translate-y-1/2 translate-x-1/2 rounded-full bg-teal-900 opacity-40 blur-2xl"></div>
                    <div class="relative">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-xl border border-teal-700 bg-teal-900/50 p-3">
                            <svg class="h-6 w-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">دعم لا ينام — 24/7</h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            عطل في منتصف الليل؟ فريقنا جاهز. نحل المشاكل التقنية بسرعة واحترافية حتى لا تتوقف مبيعاتك لحظة واحدة.
                        </p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 p-8 shadow-sm transition-shadow duration-300 hover:shadow-lg hover:border-slate-600">
                    <div class="absolute top-0 right-0 h-32 w-32 -translate-y-1/2 translate-x-1/2 rounded-full bg-indigo-900 opacity-40 blur-2xl"></div>
                    <div class="relative">
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-xl border border-indigo-700 bg-indigo-900/50 p-3">
                            <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">أجهزة مُختبرة ومعتمدة 100%</h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            لا نبيع أي جهاز لم نختبره بأنفسنا. كل قطعة عتاد متوافقة تماماً مع أنظمتنا لضمان أعلى أداء تشغيلي من اليوم الأول.
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto">
                <div class="flex items-start gap-3 rounded-xl border border-slate-700 bg-slate-800 p-4 shadow-sm">
                    <span class="mt-0.5 inline-flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-900/60 text-emerald-400">
                        <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l4 4 10-10"/></svg>
                    </span>
                    <p class="text-sm text-slate-300 leading-relaxed">مورد واحد لكل احتياجاتك التقنية — بدلاً من تعدد الموردين وتضارب المسؤوليات.</p>
                </div>
                <div class="flex items-start gap-3 rounded-xl border border-slate-700 bg-slate-800 p-4 shadow-sm">
                    <span class="mt-0.5 inline-flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-900/60 text-emerald-400">
                        <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l4 4 10-10"/></svg>
                    </span>
                    <p class="text-sm text-slate-300 leading-relaxed">تنفيذ سريع بخطة واضحة: تحليل، تطوير، إطلاق، وتدريب عملي لفريقك.</p>
                </div>
                <div class="flex items-start gap-3 rounded-xl border border-slate-700 bg-slate-800 p-4 shadow-sm">
                    <span class="mt-0.5 inline-flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-900/60 text-emerald-400">
                        <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l4 4 10-10"/></svg>
                    </span>
                    <p class="text-sm text-slate-300 leading-relaxed">تكامل حقيقي بين البرنامج والأجهزة — أعطال أقل وخدمة عملاء أسرع.</p>
                </div>
                <div class="flex items-start gap-3 rounded-xl border border-slate-700 bg-slate-800 p-4 shadow-sm">
                    <span class="mt-0.5 inline-flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-emerald-900/60 text-emerald-400">
                        <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12l4 4 10-10"/></svg>
                    </span>
                    <p class="text-sm text-slate-300 leading-relaxed">دعم استباقي ومتابعة دورية تضمن استقرار نظامك وتوسّعك بثقة.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 4. GENTLE CTA                                                 --}}
    {{-- ============================================================ --}}
    <section class="py-20 bg-slate-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl border border-slate-600/50 bg-gradient-to-br from-slate-700 via-blue-900/30 to-slate-700 p-12 md:p-16 shadow-xl text-center">
                <div class="absolute -top-16 -left-16 h-56 w-56 rounded-full bg-blue-600 opacity-20 blur-3xl"></div>
                <div class="absolute -bottom-16 -right-16 h-56 w-56 rounded-full bg-indigo-600 opacity-15 blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-72 w-72 rounded-full bg-blue-500 opacity-5 blur-3xl"></div>
                <div class="relative">
                    <span class="inline-block rounded-full border border-blue-500/30 bg-blue-500/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-blue-300 mb-6">ابدأ الآن</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-5 leading-snug">
                        جاهز تنقل نشاطك التجاري<br class="hidden sm:block">
                        <span class="bg-gradient-to-l from-blue-400 to-cyan-300 bg-clip-text text-transparent">للمستوى التالي؟</span>
                    </h2>
                    <p class="text-base text-slate-300 mb-10 max-w-xl mx-auto leading-relaxed">
                        نساعدك تختار الباقة اللي تناسب طبيعة عملك — برمجيات وأجهزة بأسعار منافسة ودعم فني حقيقي على مدار الساعة.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                        <a href="{{ route('contact.create') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl px-8 py-3.5 text-base font-semibold text-white shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2" style="background: var(--primary);">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            تواصل معنا الآن
                        </a>
                        <a href="{{ route('bundles.index') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-500 bg-slate-700 px-8 py-3.5 text-base font-semibold text-slate-200 shadow-sm transition-colors duration-200 hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 focus:ring-offset-slate-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            استكشف الباقات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
