<?php
/**
 * Created by Sajadweb.<sajadweb@outlook.com>
 * User: Sajjad Mohammadi
 */

namespace Api\Auth\Repository;


use Api\Auth\Model\User;

interface UserInterface
{
    public function __construct();

    public function save($data);

    public function saveUpdate($data);

    public function findAll();

    public function find(string $key, string $value): User;
}
