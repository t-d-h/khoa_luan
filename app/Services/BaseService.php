<?php

namespace App\Services;

abstract class BaseService
{
    protected $model;

    public function findId($id)
    {
        return $this->model->findOrFail($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getAllByStatus()
    {
        return $this->model
                    ->where('status', 1)
                    ->get();
    }

    public function find($name, $condition, $value)
    {
        return $this->model
                    ->where($name, $condition, $value)
                    ->get();
    }

    public function insert($data)
    {
        $row = $this->model;
        foreach ($data as $key => $value) {
            $row->$key = $value;
        }
        $row->save();

        return $row;
    }

    public function insertMulti($data)
    {
        return $this->model->insert($data);
    }

    public function update($data, $id)
    {
        $row = $this->model->find($id);

        foreach ($data as $key => $value) {
            $row->$key = $value;
        }
        $row->save();

        return $row;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
