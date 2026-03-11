@extends('layouts.marketing')

@section('title', $product->name.' | تفاصيل المنتج')

@section('content')
<div class="bg-slate-900 text-slate-100 font-sans antialiased">

    {{-- ============================================================ --}}
    {{-- PRODUCT HERO                                                  --}}
    {{-- ============================================================ --}}
    <section class="bg-slate-900 pt-20 pb-12 md:pt-28 md:pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
                <a href="{{ route('home') }}" class="hover:text-slate-300 transition-colors duration-150">الرئيسية</a>
                <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('hardware.index') }}" class="hover:text-slate-300 transition-colors duration-150">المنتجات</a>
                @if($product->category)
                    <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <a href="{{ route('hardware.index', ['category' => $product->category->slug]) }}" class="hover:text-slate-300 transition-colors duration-150">{{ $product->category->name }}</a>
                @endif
                <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-slate-400 truncate max-w-xs">{{ $product->name }}</span>
            </nav>

            <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-start">

                {{-- Image --}}
                <div class="mb-8 lg:mb-0">
                    <div class="relative overflow-hidden rounded-2xl border border-slate-700 bg-gradient-to-br from-slate-800 to-slate-700 aspect-square flex items-center justify-center">
                        @if($product->main_image)
                            <img
                                src="{{ asset('storage/'.$product->main_image) }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover rounded-2xl"
                            >
                        @else
                            <div class="flex flex-col items-center justify-center text-center">
                                <svg class="h-24 w-24 text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-sm text-slate-500">لا توجد صورة</p>
                            </div>
                        @endif

                        {{-- Stock badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-bold {{ $product->is_in_stock ? 'bg-emerald-900/80 text-emerald-300 border border-emerald-700' : 'bg-red-900/80 text-red-300 border border-red-700' }}">
                                <span class="h-1.5 w-1.5 rounded-full {{ $product->is_in_stock ? 'bg-emerald-400' : 'bg-red-400' }}"></span>
                                {{ $product->is_in_stock ? 'متوفر في المخزون' : 'غير متوفر حاليًا' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Info --}}
                <div>
                    @if($product->category)
                        <span class="inline-block rounded-full border border-blue-700 bg-blue-900/40 px-3 py-0.5 text-xs font-semibold text-blue-400 mb-3">
                            {{ $product->category->name }}
                        </span>
                    @endif

                    <h1 class="text-2xl md:text-3xl font-extrabold text-white leading-snug mb-3">{{ $product->name }}</h1>

                    @if($product->brand)
                        <p class="text-sm text-slate-400 mb-4">
                            الماركة: <span class="text-blue-400 font-semibold">{{ $product->brand }}</span>
                        </p>
                    @endif

                    @if($product->description)
                        <p class="text-slate-300 text-sm leading-relaxed mb-6">{{ $product->description }}</p>
                    @endif

                    {{-- Price --}}
                    <div class="rounded-xl border border-slate-700 bg-slate-800 p-4 mb-6">
                        <p class="text-xs text-slate-500 mb-1">السعر</p>
                        <p class="text-2xl font-extrabold {{ $product->price ? 'text-white' : 'text-slate-400' }}">
                            {{ $product->price ? number_format((float)$product->price, 2).' د.ل' : 'السعر حسب العرض' }}
                        </p>
                        @if(!$product->price)
                            <p class="text-xs text-slate-500 mt-1">تواصل معنا للحصول على أفضل سعر</p>
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('contact.create', ['interest' => $product->name]) }}"
                           class="inline-flex items-center gap-2 rounded-xl px-6 py-3 text-sm font-semibold text-white shadow-sm transition-colors duration-200" style="background: var(--primary);">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            أنا مهتم بهذا المنتج
                        </a>
                        <a href="{{ route('hardware.index') }}"
                           class="inline-flex items-center gap-2 rounded-xl border border-slate-600 bg-slate-800 px-5 py-3 text-sm font-semibold text-slate-300 transition-colors duration-200 hover:bg-slate-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            رجوع للمنتجات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SPECS & BUNDLES                                               --}}
    {{-- ============================================================ --}}
    <section class="py-12 md:py-16 bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12">

                {{-- Technical Specs --}}
                <div class="mb-10 lg:mb-0">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-blue-700 bg-blue-900/40">
                            <svg class="h-4 w-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </span>
                        المواصفات التقنية
                    </h2>

                    @forelse(($product->specs ?? []) as $key => $value)
                        <div class="flex items-start justify-between border-b border-slate-700 py-3 last:border-0">
                            <span class="text-sm text-slate-400 font-medium">{{ $key }}</span>
                            <span class="text-sm text-white font-semibold text-left max-w-xs">
                                {{ is_array($value) ? implode(' · ', $value) : $value }}
                            </span>
                        </div>
                    @empty
                        <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-6 text-center">
                            <p class="text-sm text-slate-500">لم يتم إدخال مواصفات تقنية بعد.</p>
                        </div>
                    @endforelse
                </div>


            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- RELATED PRODUCTS                                              --}}
    {{-- ============================================================ --}}
    @if($relatedProducts->isNotEmpty())
        <section class="py-12 md:py-16 bg-slate-900 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-xl font-bold text-white">منتجات مشابهة</h2>
                    @if($product->category)
                        <a href="{{ route('hardware.index', ['category' => $product->category->slug]) }}"
                           class="text-xs text-blue-400 hover:text-blue-300 transition-colors duration-150 flex items-center gap-1">
                            عرض الكل
                            <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('hardware.show', $related) }}"
                           class="group flex flex-col rounded-xl border border-slate-700 bg-slate-800 overflow-hidden hover:border-slate-500 transition-all duration-300">
                            <div class="relative h-32 bg-gradient-to-br from-slate-700 to-slate-800 flex items-center justify-center p-3">
                                @if($related->main_image)
                                    <img src="{{ asset('storage/'.$related->main_image) }}" alt="{{ $related->name }}"
                                         class="max-h-full max-w-full object-contain transition-transform duration-300 group-hover:scale-105">
                                @else
                                    <svg class="h-10 w-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                @endif
                            </div>
                            <div class="p-3">
                                <h3 class="text-xs font-semibold text-white line-clamp-2 leading-snug">{{ $related->name }}</h3>
                                @if($related->brand)
                                    <p class="text-[10px] text-blue-400 mt-1">{{ $related->brand }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</div>
@endsection
