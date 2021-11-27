<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\Services\UserTestService;
use Tests\TestCase;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = TaskService::getTaskRepository();
        $this->userRepository = UserTestService::getUserRepository();
    }

    /**
     * User can read all the tasks
     *
     * @test
     */
    public function user_can_read_all_the_tasks()
    {
        $task = $this->taskRepository->createWithFactory();

        $response = $this->get(route('tasks.index'));

        $response->assertSee($task->title);
    }

    /**
     * User can read single task
     *
     * @test
     */
    public function user_can_read_single_task()
    {
        $task = $this->taskRepository->createWithFactory();

        $response = $this->get(route('tasks.show', $task->id));

        $response->assertSee($task->title)
            ->assertSee($task->description);
    }

    /**
     * Authenticated user can create a new task
     *
     * @test
     */
    public function authenticated_users_can_create_a_new_task()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);

        $task = $this->taskRepository->makeTaskObject();

        $this->post(route('tasks.store'), $task->toArray());

        $this->assertEquals(1, $this->taskRepository->totalRecords());

    }

    /**
     * Unauthenticated users cannot create a new task
     *
     * @test
     */
    public function unauthenticated_users_cannot_create_a_new_task()
    {
        $task = $this->taskRepository->makeTaskObject();

        $this->post(route('tasks.store'), $task->toArray())->assertRedirect('/login');
    }

    /**
     * Task requires a title
     *
     * @test
     */
    public function a_task_requires_a_title()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);

        $task = $this->taskRepository->makeTaskObject(['title' => null]);

        $this->post(route('tasks.store'), $task->toArray())
            ->assertSessionHasErrors('title');
    }

    /**
     * Task requires a description
     *
     * @test
     */
    public function a_task_requires_a_description()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);

        $task = $this->taskRepository->makeTaskObject(['description' => null]);

        $this->post(route('tasks.store'), $task->toArray())
            ->assertSessionHasErrors('description');
    }

    /**
     * Authentcated user can update the task
     *
     * @test
     */
    public function authenticated_user_can_update_the_task()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);

        $task = $this->taskRepository->createWithFactory(['user_id' => Auth::id()]);
        $newTitle = "Updated Title";
        $task->title = $newTitle;
        $task->save();

        $this->put(route('tasks.update', $task->id), $task->toArray());

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => $newTitle
        ]);

        $this->assertEquals(1, $this->taskRepository->totalRecords());
    }

    /**
     * Unauthenticated user cannot update the task
     *
     * @test
     */
    public function unauthenticated_user_cannot_update_the_task()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);
        $task = $this->taskRepository->createWithFactory();
        $task->title = "Updated Title";
        $response = $this->put(route('tasks.update', $task->id), $task->toArray());
        $response->assertStatus(403);
    }

    /**
     * Authenticated user can delete the task
     *
     * @test
     */
    public function authenticated_user_can_delete_the_task()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);
        $task = $this->taskRepository->createWithFactory(['user_id' => Auth::id()]);
        $this->delete(route('tasks.destroy', $task->id));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /**
     * Unauthenticated user cannot delete the task
     *
     * @test
     */
    public function unauthenticated_user_cannot_delete_the_task()
    {
        $user = $this->userRepository->createWithFactory();
        $this->actingAs($user);
        $task = $this->taskRepository->createWithFactory();
        $response = $this->delete(route('tasks.destroy', $task->id));
        $response->assertStatus(403);
    }

}
