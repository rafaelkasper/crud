<?php
require_once 'models/Client.php';

class ClientDaoMysql
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateClient($array)
    {
        $u = new Client();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->name = $array['name'] ?? '';
        return $u;
    }


    public function findByEmail($email)
    {
        if (!empty($email)) {
            $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateClient($data);
                return $user;
            }
        }

        return false;
    }

    public function findById($id)
    {
        if (!empty($id)) {
            $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateClient($data);
                return $user;
            }
        }

        return false;
    }



    public function update(Client $u)
    {
        $sql = $this->pdo->prepare("UPDATE clientes SET 
            email = :email,
            name = :name
            WHERE id = :id");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':id', $u->id);
        $sql->execute();


        return true;
    }

    public function insert(Client $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO clientes (
            email,  name
        ) VALUES (
            :email,  :name
        )");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':name', $u->name);
        $sql->execute();

        return true;
    }



    public function findAll()
    {
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM clientes");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Client();
                $u->id = $item['id'];
                $u->name = $item['name'];
                $u->email = $item['email'];
                $array[] = $u;
            }
        }

        return $array;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
