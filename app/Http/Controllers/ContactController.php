<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;

class ContactController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }

    public function store(StoreLeadRequest $request)
    {
        $data = $request->validated();

        $notes = 'النشاط التجاري: '.$data['business_activity'];

        if (! empty($data['message'])) {
            $notes .= PHP_EOL.'ملاحظة العميل: '.$data['message'];
        }

        Lead::query()->create([
            'client_name' => $data['client_name'],
            'phone' => $data['phone'],
            'interested_in' => $data['interested_in'],
            'status' => Lead::STATUS_NEW,
            'notes' => $notes,
        ]);

        return to_route('contact.create')
            ->with('success', 'تم إرسال بياناتك بنجاح. فريق المبيعات سيتواصل معك قريبًا.');
    }
}
