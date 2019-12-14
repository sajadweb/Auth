<?php


namespace Api\Auth\Repository;

use Api\Auth\Model\Client;

class ClientRepository implements ClientInterface
{

    /**
     * The model being queried.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct()
    {
        $this->model=new Client();
    }

    public function save($data)
    {
        return $this->model->create($data);
    }

    public function saveUpdate($data)
    {
        // TODO: Implement saveUpdate() method.
    }

    public function findAll()
    {
        return $this->model->get();
    }
}
