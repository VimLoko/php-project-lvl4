<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use function route;

class TaskStatusControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(VerifyCsrfToken::class);
        DB::beginTransaction();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreateWithoutAutorize()
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testCreateWithAutorize()
    {
        DB::beginTransaction();
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->get(route('task_statuses.create'));
        $this->assertAuthenticatedAs($user);
        $response->assertOk();
        DB::rollBack();
    }

    public function testStoreWithoutAutorize()
    {
        $taskStatus = ['name' => 'Test Task Status'];
        $response = $this->post(route('task_statuses.store'), $taskStatus);
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    public function testStoreWithAutorize()
    {
        $user = User::factory()->create();
        $taskStatus = ['name' => 'Test Task Status'];
        $response = $this->actingAs($user)
                         ->post(route('task_statuses.store'), $taskStatus);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('task_statuses', $taskStatus);
    }

    public function testEditWithoutAutorize()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->get(route('task_statuses.edit', $taskStatus->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testEditWithAuthUser()
    {
        $user = User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('task_statuses.edit', $taskStatus->id));
        $this->assertAuthenticatedAs($user);
        $response->assertOk();
    }

    public function testUpdateWithoutAutorize()
    {
        $taskStatus = TaskStatus::factory()->create();
        $taskStatusChanged = ['name' => 'Test Task Status Changed'];
        $response = $this->patch(route('task_statuses.update', $taskStatus, $taskStatusChanged));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testUpdateWithAuthUser()
    {
        $user = User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();
        $taskStatusChanged = TaskStatus::factory()->make()->toArray();
        $response = $this->actingAs($user)
            ->patch(route('task_statuses.update', $taskStatus), $taskStatusChanged);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('task_statuses', $taskStatusChanged);
    }

    public function testDeleteWithoutAutorize()
    {
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testDeleteWithAuthUser()
    {
        $user = User::factory()->create();
        $taskStatus = TaskStatus::factory()->create();
        $response = $this->actingAs($user)
            ->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseMissing('task_statuses', $taskStatus->toArray());
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }
}
