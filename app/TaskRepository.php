<?php

namespace App;

use Mysqli;
use Traversable;
use EmptyIterator;
use Db\Store;

class TaskRepository
{
    protected $db;
    protected $store;

    public function __construct()
    {
        $this->db = new Mysqli(
            getenv('DB_HOST'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD'),
            getenv('DB_DATABASE'),
            getenv('DB_PORT')
        );
        if (mysqli_connect_error()) {
            die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
        }
        if (!$this->db->set_charset('utf8mb4')) {
            die('Ошибка при загрузке набора символов utf8:' . $this->db->error);
        }
        $this->store = new Store($this->db);
    }

    public function getTasks(): Traversable
    {
        return $this->db->query('SELECT * FROM `tasks` WHERE `is_done` = 0  LIMIT 10') ?: new EmptyIterator;
    }

    public function addTask(string $name)
    {
        $item = [
            'name' => $name
        ];
        return $this->store->insert('tasks', $item);
    }
}
