<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list_events()
    {
        $adminUser = User::factory()->create(['isAdmin' => true]);
        $event = Event::factory()->create();

        $response = $this->actingAs($adminUser)->getJson('/api/events');

        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $event->id, 'eventTitle' => $event->eventTitle]);
    }

    public function test_it_can_show_an_event()
    {
        $event = Event::factory()->create();
        $adminUser = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($adminUser)->getJson("/api/events/{$event->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $event->id,
            'eventTitle' => $event->eventTitle,
        ]);
    }

    public function test_it_can_create_an_event()
    {
        $adminUser = User::factory()->create(['isAdmin' => true]);

        $data = [
            'eventDate' => '2025-02-18',
            'phoneNumber' => '1234567890',
            'eventTitle' => 'Test Event',
            'request' => 'Test Request',
        ];

        $response = $this->actingAs($adminUser)->postJson('/api/events', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('events', [
            'eventTitle' => 'Test Event',
        ]);
    }

    public function test_it_can_delete_an_event()
    {
        $adminUser = User::factory()->create(['isAdmin' => true]);
        $event = Event::factory()->create();

        $response = $this->actingAs($adminUser)->deleteJson("/api/events/{$event->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
        ]);
    }

    public function test_it_can_export_events()
    {
        $adminUser = User::factory()->create(['isAdmin' => true]);//creates a user randomly

        $response = $this->actingAs($adminUser)->getJson('/api/events/export');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_it_denies_export_for_non_admin()
    {
        $nonAdminUser = User::factory()->create(['isAdmin' => false]);

        $response = $this->actingAs($nonAdminUser)->getJson('/api/events/export');

        $response->assertStatus(403);
        $response->assertJson(['message' => 'Access denied']);
    }
}
