@extends('layouts.marketing')

@section('title', 'الباقات | العروض المجمعة')

@section('content')
<div class="bg-slate-900 text-slate-100 font-sans antialiased">

    {{-- ============================================================ --}}
    {{-- HERO                                                          --}}
    {{-- ============================================================ --}}
    <section class="relative pt-20 pb-12 md:pt-28 md:pb-16 bg-slate-900 overflow-hidden">
        <div class="absolute -top-20 -left-20 h-72 w-72 rounded-full opacity-15 blur-3xl"
             style="background: radial-gradient(circle, #f97316, transparent 70%);"></div>
        <div class="absolute bottom-0 right-0 h-56 w-56 rounded-full opacity-10 blur-3xl"
             style="background: radial-gradient(circle, #3b82f6, transparent 70%);"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block rounded-full border border-slate-700 bg-slate-800 px-4 py-1 text-xs font-semibold text-slate-400 mb-4">
                Bundles &amp; Offers
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">الحل المتكامل لنشاطك</h1>
            <p class="text-slate-400 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                باقات مجمعة (جهاز + طابعة + برنامج) لتختصر وقت المقارنة وتبدأ التشغيل فورًا.
            </p>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- BUNDLES GRID                                                  --}}
    {{-- ============================================================ --}}
    <section class="py-10 md:py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($bundles->isEmpty())
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-700 bg-slate-800">
                        <svg class="h-8 w-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">لا توجد باقات متاحة حاليًا</h3>
                    <p class="text-slate-500 text-sm">سيتم إضافة باقات جديدة قريبًا، تابعنا!</p>
                    <a href="{{ route('home') }}" class="mt-6 rounded-lg px-5 py-2 text-sm font-semibold text-white transition-colors duration-150" style="background: var(--primary);">
                        العودة للرئيسية
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach ($bundles as $bundle)
                        <article class="group relative flex flex-col rounded-2xl border border-slate-700 bg-gradient-to-br from-slate-800 to-slate-800/50 overflow-hidden transition-all duration-300 hover:border-orange-500/40 hover:shadow-2xl hover:shadow-orange-500/10">

                            {{-- Top accent bar --}}
                            <div class="h-1 w-full" style="background: linear-gradient(90deg, #f97316, #fb923c, #f97316);"></div>

                            {{-- Image --}}
                            <div class="relative h-48 bg-gradient-to-br from-slate-700 to-slate-800 overflow-hidden">
                                @if($bundle->image)
                                    <img
                                        src="{{ asset('storage/'.$bundle->image) }}"
                                        alt="{{ $bundle->name }}"
                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="flex h-full items-center justify-center">
                                        <svg class="h-20 w-20 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                        </svg>
                                    </div>
                                @endif

                                {{-- Products count badge --}}
                                <span class="absolute top-3 left-3 rounded-full bg-orange-600/90 border border-orange-500 px-2.5 py-0.5 text-[10px] font-bold text-white">
                                    {{ $bundle->products->count() }} منتج
                                </span>
                            </div>

                            {{-- Body --}}
                            <div class="flex flex-1 flex-col p-5">
                                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-orange-400 transition-colors duration-200">
                                    {{ $bundle->name }}
                                </h3>
                                <p class="text-sm text-slate-400 leading-relaxed mb-4 line-clamp-2">
                                    {{ $bundle->description ?: 'باقة تشغيل كاملة مناسبة للمحلات والمطاعم — كل ما تحتاجه في عرض واحد.' }}
                                </p>

                                {{-- Products list --}}
                                <div class="mb-4 flex-1">
                                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500 mb-2">محتويات الباقة</p>
                                    <ul class="space-y-1.5">
                                        @forelse ($bundle->products as $product)
                                            <li class="flex items-center gap-2 text-sm text-slate-300">
                                                <span class="flex-shrink-0 h-1.5 w-1.5 rounded-full bg-orange-500"></span>
                                                <span>{{ $product->name }}</span>
                                                @if($product->pivot->quantity > 1)
                                                    <span class="text-[10px] text-orange-400 font-semibold">&times;{{ $product->pivot->quantity }}</span>
                                                @endif
                                            </li>
                                        @empty
                                            <li class="text-sm text-slate-500 italic">سيتم تحديث المحتويات قريبًا</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between border-t border-slate-700 px-5 py-4 bg-slate-800/50">
                                <div>
                                    <span class="text-xs text-slate-500">السعر الإجمالي</span>
                                    <p class="text-xl font-extrabold text-white">
                                        {{ number_format((float) $bundle->price, 0) }}
                                        <span class="text-sm font-normal text-slate-400">د.ل</span>
                                    </p>
                                </div>
                                <a href="{{ route('contact.create', ['bundle' => $bundle->name]) }}"
                                   class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-sm font-bold text-white transition-all duration-200 hover:scale-105 hover:shadow-lg"
                                   style="background: linear-gradient(135deg, #f97316, #ea580c);">
                                    أطلب الباقة
                                    <svg class="h-4 w-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($bundles->hasPages())
                    <div class="mt-12 flex justify-center">
                        <div class="flex items-center gap-1">
                            @if($bundles->onFirstPage())
                                <span class="rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-sm text-slate-600 cursor-not-allowed">السابق</span>
                            @else
                                <a href="{{ $bundles->previousPageUrl() }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">السابق</a>
                            @endif

                            @foreach($bundles->getUrlRange(1, $bundles->lastPage()) as $page => $url)
                                @if($page == $bundles->currentPage())
                                    <span class="rounded-lg px-4 py-2 text-sm font-bold text-white" style="background: var(--primary);">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if($bundles->hasMorePages())
                                <a href="{{ $bundles->nextPageUrl() }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">التالي</a>
                            @else
                                <span class="rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-sm text-slate-600 cursor-not-allowed">التالي</span>
                            @endif
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- CTA                                                           --}}
    {{-- ============================================================ --}}
    <section class="py-16 bg-slate-900">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="rounded-2xl border border-slate-700 bg-gradient-to-br from-slate-800 to-slate-800/50 p-8 md:p-12">
                <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">تحتاج باقة مخصصة؟</h2>
                <p class="text-slate-400 text-sm md:text-base mb-6 leading-relaxed">
                    تواصل معنا وسنجهّز لك عرض سعر يناسب احتياجك بالضبط — أجهزة + برمجيات + تركيب.
                </p>
                <a href="{{ route('contact.create') }}"
                   class="inline-flex items-center gap-2 rounded-xl px-6 py-3 text-sm font-bold text-white transition-all duration-200 hover:scale-105 hover:shadow-lg"
                   style="background: linear-gradient(135deg, #f97316, #ea580c);">
                    تواصل معنا الآن
                    <svg class="h-4 w-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
