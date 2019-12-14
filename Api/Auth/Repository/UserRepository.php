<?php


namespace Api\Auth\Repository;


use Api\Auth\Model\User;

class UserRepository implements UserInterface
{

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct()
    {
        $this->model=new User();
    }

    public function save($data)
    {
        return $this->model->create($data);
    }

    public function saveUpdate($data)
    {
        return $this->model->update($data);
    }

    public function findAll()
    {
        return $this->model->get();
    }
    public function find(string $key, string $value):User
    {
        $key= mb_strtolower(trim($key));
        $value= mb_strtolower(trim($value));
        return $this->model->whereRaw("json_contains(`data`, '{\"type\" : \"$key\"}')")
            ->whereRaw("json_contains(`data`, '{\"$key\" : \"$value\"}')")
            ->first();
    }
}
