<?php
/**
 * Created by Sajadweb.<sajadweb@outlook.com>
 * User: Sajjad Mohammadi
 */

namespace Api\Auth\Repository;


interface ClientInterface
{
    public function __construct();
    public function save($data);
    public function saveUpdate($data);
    public function findAll();
}
