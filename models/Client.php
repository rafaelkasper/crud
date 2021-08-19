<?php
class Client
{
    public $id;
    public $email;
    public $name;
}

interface ClientDAO
{
    public function update(Client $c);
    public function insert(Client $c);
}
