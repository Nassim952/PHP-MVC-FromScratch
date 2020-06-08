<?php

namespace App\Core\Connection;

interface BDDInterface
{
    public function connect();

    public function query(string $query, array $parameters = null);

}
