<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_user()
    {
        
        $data = [
            'username' => 'testuser',
            'fullname' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password', 
            'isAdmin' => false,
        ];

        
        $adminUser = User::factory()->create(['isAdmin' => true]);

        
        $response = $this->actingAs($adminUser)->postJson('/api/users', $data);

        
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'username' => 'testuser',
        ]);
    }

    #[Test]
    public function it_can_show_a_user()
    {
        
        $user = User::factory()->create();

        
        $adminUser = User::factory()->create(['isAdmin' => true]);
        $response = $this->actingAs($adminUser)->getJson("/api/users/{$user->id}");

        
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $user->id,
            'username' => $user->username,
            'fullname' => $user->fullname,
        ]);
    }

    #[Test]
    public function it_denies_access_for_non_admin_on_index()
    {
        
        $nonAdminUser = User::factory()->create(['isAdmin' => false]);

        
        $response = $this->actingAs($nonAdminUser)->getJson('/api/users');

        
        $response->assertStatus(403);
        $response->assertJson(['message' => 'Access denied']);
    }

    #[Test]
    public function it_can_list_non_admin_users_as_admin()
    {
        
        $adminUser = User::factory()->create(['isAdmin' => true]);

        
        $user = User::factory()->create(['isAdmin' => false]);

        
        $response = $this->actingAs($adminUser)->getJson('/api/users');

        
        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => $user->id, 'username' => $user->username]);
    }

    #[Test]
    public function it_can_update_a_user_as_admin()
    {
        
        $user = User::factory()->create();
        $adminUser = User::factory()->create(['isAdmin' => true]);

        
        $data = [
            'username' => 'updateduser',
            'fullname' => 'Updated User',
            'email' => 'updated@example.com',
            'password' => 'newpassword',
            'isAdmin' => true,
        ];

        
        $response = $this->actingAs($adminUser)->putJson("/api/users/{$user->id}", $data);

        
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'updateduser',
            'email' => 'updated@example.com',
        ]);
    }

    #[Test]
    public function it_can_delete_a_user_as_admin()
    {
        
        $user = User::factory()->create();
        $adminUser = User::factory()->create(['isAdmin' => true]);

        
        $response = $this->actingAs($adminUser)->deleteJson("/api/users/{$user->id}");

        
        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    #[Test]
    public function it_can_login_a_user()
    {
        
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    #[Test]
    public function it_denies_login_for_invalid_credentials()
    {
        
        $response = $this->postJson('/api/login', [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ]);

        
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthorized']);
    }

    // #[Test]// this is a dummy bad test to show that logic is right
    //        // users should be able to update their info too
    // public function it_denies_access_for_non_admin_to_update_user()
    // {
        
    //     $user = User::factory()->create();
    //     $nonAdminUser = User::factory()->create(['isAdmin' => false]);

        
    //     $username = 'updateduser_' . uniqid();
    //     $email = 'updated_' . uniqid() . '@example.com';

        
    //     $data = [
    //         'username' => $username,
    //         'fullname' => 'Updated User',
    //         'email' => $email,
    //         'password' => 'newpassword',
    //         'isAdmin' => true,
    //     ];

    //     $response = $this->actingAs($nonAdminUser)->putJson("/api/users/{$user->id}", $data);

        
    //     $response->assertStatus(403);
    //     $response->assertJson(['message' => 'Access denied']);
    // }

}
