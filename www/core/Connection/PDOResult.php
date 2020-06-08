<?php 

namespace App\Core\Connection;

use Throwable;

class PDOResult implements ResultInterface
{

    protected $statement;

    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function getArrayResult(): array
    {
        return $this->statement->fetchAll();
    }

    public function getOneOrNullResult(): ?array
    {
        return $this->statement->fetch(); 
    }

    public function getValueResult()
    {
        return $this->statement->fetchColumn();
    }
}
