<?php

namespace App\Services;

abstract class BaseService
{
    protected $model;

    public function findId($id)
    {
        return $this->model->find($id);
    }

    public function find($name, $condition, $value)
    {
        return $this->model
                    ->where($name, $condition, $value)
                    ->get();
    }

    public function insert($id)
    {
        $data1 = ['tensp' => '1212', 'dongia' => '12', 'loai' => '12'];
        $data = $this->findId(1);
//        return $this->model->create($data);
        return $data->update($data1);
    }
}
