<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadCaptureTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_creates_a_new_lead(): void
    {
        $response = $this->post(route('contact.store'), [
            'client_name' => 'Mohamed Ali',
            'phone' => '01001234567',
            'business_activity' => 'سوبر ماركت',
            'interested_in' => 'Starter Retail Kit',
            'message' => 'عايز تركيب سريع خلال الأسبوع.',
        ]);

        $response
            ->assertRedirect(route('contact.create'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'client_name' => 'Mohamed Ali',
            'phone' => '01001234567',
            'interested_in' => 'Starter Retail Kit',
            'status' => Lead::STATUS_NEW,
        ]);
    }
}
