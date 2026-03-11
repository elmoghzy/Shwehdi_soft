@extends('layouts.marketing')

@section('title', 'المنظومات | أنظمة المبيعات')

@section('content')
    <section class="panel intro">
        <span class="eyebrow">Software Solutions</span>
        <h1>منظومة مبيعات وإدارة مصممة للنمو</h1>
        <p>
            إدارة نقاط البيع، المخازن، المشتريات، والعملاء من شاشة واحدة مع تقارير دقيقة تساعدك على زيادة الربحية.
        </p>
    </section>

    <section class="card-grid cols-3">
        <article class="card icon-card">
            <h3>نقاط بيع ذكية</h3>
            <p>سرعة في إصدار الفواتير مع دعم الباركود والخصومات.</p>
        </article>
        <article class="card icon-card">
            <h3>تعدد المخازن</h3>
            <p>متابعة حركة الأصناف بين الفروع والمستودعات لحظيًا.</p>
        </article>
        <article class="card icon-card">
            <h3>تقارير تنفيذية</h3>
            <p>مقارنة الأداء اليومي والشهري للمبيعات وهوامش الربح.</p>
        </article>
    </section>

    <section class="stack">
        <div class="section-head">
            <h2>منتجات البرامج</h2>
        </div>

        <div class="card-grid cols-2">
            @forelse ($softwareProducts as $product)
                <article class="card">
                    <div class="card-body">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description ?: 'منظومة قابلة للتخصيص حسب طبيعة نشاطك.' }}</p>
                    </div>
                    <div class="card-footer">
                        <span>{{ $product->category?->name }}</span>
                        <a href="{{ route('hardware.show', $product) }}">عرض المنتج</a>
                        <a href="{{ route('contact.create', ['interest' => $product->name]) }}">اطلب تجربة</a>
                    </div>
                </article>
            @empty
                <article class="card empty">
                    <p>لا توجد منظومات مضافة بعد. أضف منتجات برمجيات من لوحة التحكم.</p>
                </article>
            @endforelse
        </div>
    </section>
@endsection
