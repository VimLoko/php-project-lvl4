<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use function route;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutMiddleware(VerifyCsrfToken::class);
        DB::beginTransaction();
    }

    public function testTaskIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreateWithoutAutorize()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testCreateWithAutorize()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('tasks.create'));
        $this->assertAuthenticatedAs($user);
        $response->assertOk();
    }

    public function testStoreWithoutAutorize()
    {
        $task = Task::factory()->make();
        $response = $this->post(route('tasks.store'), $task->toArray());
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    public function testStoreWithAutorize()
    {
        $user = User::factory()->create();
        $task = Task::factory()->make()->toArray();
        $response = $this->actingAs($user)
            ->post(route('tasks.store'), $task);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('tasks', $task);
    }

    public function testEditWithoutAutorize()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.edit', $task));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testEditWithAuthUser()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('tasks.edit', $task));
        $this->assertAuthenticatedAs($user);
        $response->assertOk();
    }

    public function testDeleteWithoutAutorize()
    {
        $taskStatus = Task::factory()->create();
        $response = $this->delete(route('tasks.destroy', $taskStatus));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function testDeleteWithUserWhoNotCreatedRecord()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $response = $this->actingAs($user)
            ->delete(route('tasks.destroy', $task));
        $response->assertStatus(403);
    }

    public function testDeleteWithUserWhoCreatedRecord()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'created_by_id' => $user
        ]);
        $response = $this->actingAs($user)
            ->delete(route('tasks.destroy', $task));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseMissing('tasks', $task->toArray());
    }

    public function testTaskShow(): void
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.show', $task));
        $response->assertOk();
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }
}
