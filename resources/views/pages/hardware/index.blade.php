@extends('layouts.marketing')

@section('title', 'المنتجات | كتالوج شامل')

@section('content')
<div class="bg-slate-900 text-slate-100 font-sans antialiased">

    {{-- ============================================================ --}}
    {{-- HERO                                                          --}}
    {{-- ============================================================ --}}
    <section class="relative pt-20 pb-12 md:pt-28 md:pb-16 bg-slate-900 overflow-hidden">
        <div class="absolute -top-20 -right-20 h-72 w-72 rounded-full opacity-15 blur-3xl"
             style="background: radial-gradient(circle, #3b82f6, transparent 70%);"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block rounded-full border border-slate-700 bg-slate-800 px-4 py-1 text-xs font-semibold text-slate-400 mb-4">
                Products Catalog
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">كتالوج المنتجات</h1>
            <p class="text-slate-400 text-base max-w-2xl leading-relaxed">
                استعرض المنظومات والأجهزة في مكان واحد، مع مواصفات واضحة تساعدك تختار الحل المناسب لنشاطك.
            </p>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- FILTERS                                                       --}}
    {{-- ============================================================ --}}
    <section class="bg-slate-800 border-b border-slate-700 sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <form method="GET" action="{{ route('hardware.index') }}" class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-2">
                {{-- Search --}}
                <div class="relative w-full sm:flex-1 sm:min-w-52">
                    <input
                        type="text"
                        name="q"
                        value="{{ $search ?? '' }}"
                        placeholder="ابحث عن منتج..."
                        class="w-full rounded-lg border border-slate-600 bg-slate-700 px-4 py-2 text-sm text-slate-100 placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    >
                </div>

                {{-- Category filters --}}
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('hardware.index', array_merge(request()->except('category', 'page'), [])) }}"
                       class="rounded-lg px-3 py-1.5 text-xs font-semibold transition-colors duration-150 {{ !$activeCategory ? 'text-white' : 'bg-slate-700 text-slate-300 hover:bg-slate-600' }}"
                       @if(!$activeCategory) style="background: var(--primary);" @endif>
                        الكل
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('hardware.index', array_merge(request()->except('category', 'page'), ['category' => $cat->slug])) }}"
                           class="rounded-lg px-3 py-1.5 text-xs font-semibold transition-colors duration-150 {{ $activeCategory === $cat->slug ? 'text-white' : 'bg-slate-700 text-slate-300 hover:bg-slate-600' }}"
                           @if($activeCategory === $cat->slug) style="background: var(--primary);" @endif>
                            {{ $cat->name }}
                            <span class="opacity-60">({{ $cat->products_count }})</span>
                        </a>
                    @endforeach
                </div>

                @if($search)
                    <button type="submit" class="rounded-lg px-4 py-2 text-xs font-semibold text-white transition-colors duration-150" style="background: var(--primary);">
                        بحث
                    </button>
                    <a href="{{ route('hardware.index') }}" class="rounded-lg border border-slate-600 px-3 py-2 text-xs text-slate-400 hover:text-slate-200 transition-colors duration-150">
                        مسح
                    </a>
                @else
                    <button type="submit" class="rounded-lg px-4 py-2 text-xs font-semibold text-white transition-colors duration-150" style="background: var(--primary);">
                        بحث
                    </button>
                @endif
            </form>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- PRODUCTS GRID                                                 --}}
    {{-- ============================================================ --}}
    <section class="py-10 md:py-14 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($products->isEmpty())
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-2xl border border-slate-700 bg-slate-800">
                        <svg class="h-8 w-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">لا توجد منتجات</h3>
                    <p class="text-slate-500 text-sm">جرّب تغيير الفلتر أو كلمة البحث.</p>
                    <a href="{{ route('hardware.index') }}" class="mt-6 rounded-lg px-5 py-2 text-sm font-semibold text-white transition-colors duration-150" style="background: var(--primary);">
                        عرض جميع المنتجات
                    </a>
                </div>
            @else
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-slate-400">
                        @if($search)
                            نتائج البحث عن "<span class="text-white font-semibold">{{ $search }}</span>" —
                        @endif
                        {{ $products->total() }} منتج
                        @if($activeCategory)
                            في <span class="text-blue-400">{{ $categories->where('slug', $activeCategory)->first()?->name }}</span>
                        @endif
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @foreach($products as $product)
                        <article class="group relative flex flex-col rounded-2xl border border-slate-700 bg-slate-800 overflow-hidden transition-all duration-300 hover:border-slate-500 hover:shadow-xl hover:shadow-slate-900/50">

                            {{-- Image --}}
                            <div class="relative h-44 bg-gradient-to-br from-slate-700 to-slate-800 overflow-hidden">
                                @if($product->main_image)
                                    <img
                                        src="{{ asset('storage/'.$product->main_image) }}"
                                        alt="{{ $product->name }}"
                                        class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="flex h-full items-center justify-center">
                                        <svg class="h-16 w-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif

                                {{-- Stock badge --}}
                                <span class="absolute top-3 left-3 rounded-full px-2.5 py-0.5 text-[10px] font-bold {{ $product->is_in_stock ? 'bg-emerald-900/80 text-emerald-300 border border-emerald-700' : 'bg-red-900/80 text-red-300 border border-red-700' }}">
                                    {{ $product->is_in_stock ? 'متوفر' : 'غير متوفر' }}
                                </span>

                                {{-- Category badge --}}
                                @if($product->category)
                                    <span class="absolute top-3 right-3 rounded-full bg-slate-900/80 border border-slate-600 px-2.5 py-0.5 text-[10px] font-semibold text-slate-300">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                            </div>

                            {{-- Body --}}
                            <div class="flex flex-1 flex-col p-4">
                                @if($product->brand)
                                    <p class="text-[11px] font-semibold uppercase tracking-wider text-blue-400 mb-1">{{ $product->brand }}</p>
                                @endif
                                <h3 class="text-base font-bold text-white leading-snug mb-2 line-clamp-2">{{ $product->name }}</h3>
                                <p class="text-xs text-slate-400 leading-relaxed line-clamp-3 flex-1">
                                    {{ $product->description ?: 'استعرض تفاصيل المنتج لمعرفة المواصفات الكاملة.' }}
                                </p>
                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between border-t border-slate-700 px-4 py-3">
                                <span class="text-sm font-bold {{ $product->price ? 'text-white' : 'text-slate-500' }}">
                                    {{ $product->price ? number_format((float)$product->price, 0).' د.ل' : 'حسب العرض' }}
                                </span>
                                <a href="{{ route('hardware.show', $product) }}"
                                   class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-white transition-colors duration-150" style="background: var(--primary);">
                                    التفاصيل
                                    <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                    <div class="mt-10 flex justify-center">
                        <div class="flex items-center gap-1">
                            {{-- Previous --}}
                            @if($products->onFirstPage())
                                <span class="rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-sm text-slate-600 cursor-not-allowed">السابق</span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">السابق</a>
                            @endif

                            {{-- Pages --}}
                            @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if($page == $products->currentPage())
                                    <span class="rounded-lg px-4 py-2 text-sm font-bold text-white" style="background: var(--primary);">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}" class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 transition-colors duration-150">التالي</a>
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
    <section class="py-14 bg-slate-800 border-t border-slate-700">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-white mb-3">مش لاقي اللي تحتاجه؟</h2>
            <p class="text-slate-400 text-sm mb-6 leading-relaxed">تواصل معنا وسنساعدك في إيجاد الحل الأمثل لنشاطك التجاري.</p>
            <a href="{{ route('contact.create') }}"
               class="inline-flex items-center gap-2 rounded-xl px-7 py-3 text-sm font-semibold text-white shadow-sm transition-colors duration-200" style="background: var(--primary);">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                تواصل معنا
            </a>
        </div>
    </section>

</div>
@endsection
