<?php

namespace App\Contracts;

interface TaskRepositoryContract
{
    public function getAll();

    public function createWithFactory($data = []);

    public function makeTaskObject($data = []);

    public function totalRecords();

    public function create($data = []);

    public function update($id, $data = []);

    public function delete($id);
}
