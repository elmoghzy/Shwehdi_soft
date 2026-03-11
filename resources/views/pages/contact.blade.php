@extends('layouts.marketing')

@section('title', 'تواصل معنا | اترك بياناتك')

@section('content')
    <section class="panel intro">
        <span class="eyebrow">Lead Capture</span>
        <h1>تواصل معنا الآن</h1>
        <p>اترك بياناتك وسيقوم فريق المبيعات بالتواصل معك خلال وقت قصير.</p>
    </section>

    @if (session('success'))
        <div class="flash success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="flash error">
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="split">
        <form class="panel form-panel" method="POST" action="{{ route('contact.store') }}">
            @csrf

            <label>
                <span>الاسم</span>
                <input type="text" name="client_name" value="{{ old('client_name') }}" required>
            </label>

            <label>
                <span>رقم الهاتف</span>
                <input type="text" name="phone" value="{{ old('phone') }}" required>
            </label>

            <label>
                <span>النشاط التجاري</span>
                <input type="text" name="business_activity" value="{{ old('business_activity') }}" placeholder="مثال: سوبر ماركت" required>
            </label>

            <label>
                <span>مهتم بأي عرض؟</span>
                <input type="text" name="interested_in" value="{{ old('interested_in', request('bundle', request('interest'))) }}" required>
            </label>

            <label>
                <span>ملاحظات إضافية</span>
                <textarea name="message" rows="4" placeholder="أي تفاصيل إضافية عن احتياجك">{{ old('message') }}</textarea>
            </label>

            <button class="btn btn-primary" type="submit">إرسال البيانات</button>
        </form>

        <aside class="panel contact-side">
            @php
                $salesPhone = $siteSettings['sales_phone'] ?? '0911202090';
                $supportPhone = $siteSettings['support_phone'] ?? '0921212090 - 0924172090';
                $siteEmail = $siteSettings['email'] ?? 'ShwehdiSoft@gmail.com';
                $siteAddress = $siteSettings['address'] ?? 'نهاية طريق غوط الشعال باتجاه كوبري الغيران - مقابل محطة الوقود الغيران (بن غرسة) - مركز بوابة التقنية';
                $siteCity = $siteSettings['city'] ?? 'طرابلس، ليبيا';
            @endphp

            <h3>📞 أرقام التواصل</h3>
            <p><strong>المبيعات:</strong> <a href="tel:{{ $salesPhone }}">{{ $salesPhone }}</a></p>
            <p><strong>الدعم الفني:</strong> {{ $supportPhone }}</p>

            <h3>📧 البريد الإلكتروني</h3>
            <p><a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a></p>

            <h3>📍 العنوان</h3>
            <p>{{ $siteAddress }}</p>
            <p>{{ $siteCity }}</p>

            <p style="margin-top: 10px;">يمكنك أيضًا التواصل عبر زر واتساب العائم.</p>
        </aside>
    </section>
@endsection
