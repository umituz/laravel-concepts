<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    public static function getTaskRepository()
    {
        return new TaskRepository(new Task());
    }
}
