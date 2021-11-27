<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryContract;
use App\Models\Task;

class TaskRepository implements TaskRepositoryContract
{
    /**
     * @var Task
     */
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task->latest()->get();
    }

    public function createWithFactory($data = [])
    {
        return $this->task->factory()->create($data);
    }

    public function makeTaskObject($data = [])
    {
        return $this->task->factory()->make($data);
    }

    public function totalRecords()
    {
        return $this->getAll()->count();
    }

    public function create($data = [])
    {
        return $this->task->create($data);
    }

    public function update($id, $data = [])
    {
        return $this->task->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->task->where('id', $id)->delete();
    }
}
