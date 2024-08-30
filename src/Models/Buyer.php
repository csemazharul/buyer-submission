<?php

namespace App\Models;

use App\Database\DbConnection;

class Buyer
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    public function all($startDate = null, $endDate = null): array
    {
        $sql = 'SELECT * FROM buyers ORDER BY id DESC';

        if ($startDate && $endDate) {
            $sql .= " WHERE entry_at BETWEEN ? AND ?";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->execute([$startDate, $endDate]);
            return $stmt->fetchAll();
        }

        $stmt = $this->dbConnection->query($sql);

        return $stmt->fetchAll();

    }

    public function create($data): int
    {

        $fields = implode(', ', array_keys($data));

        $values = array_values($data);

        $placeholders = implode(', ', array_fill(0, count($values), '?'));

        $sql = "INSERT INTO buyers ($fields) VALUES ($placeholders)";

        $stmt = $this->dbConnection->prepare($sql);

        $stmt->execute(array_values($data));

        return $stmt->rowCount();

    }
}
