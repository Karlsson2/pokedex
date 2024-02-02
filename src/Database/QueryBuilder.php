<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class QueryBuilder
{
    private string $query;

    public function __construct(
        private PDO $database
    ) {
    }

    public function select(array $columns = ['*']): static
    {
        if ($columns === ['*']) {
            $this->query = 'SELECT *';
        } else {
            $columnsList = [];
            foreach ($columns as $alias => $column) {
                $columnsList[] = "$column AS $alias";
            }
            $this->query = 'SELECT ' . implode(', ', $columnsList);
        }
        return $this;
    }


    public function from(string $table): static
    {
        $this->query = sprintf('%s FROM %s', $this->query, $table);

        return $this;
    }
    public function limit(int $number): static
    {
        $this->query = sprintf('%s LIMIT %s', $this->query, $number);

        return $this;
    }
    public function orderBy(string $column, string $order): static
    {
        $this->query = sprintf('%s ORDER BY %s %s', $this->query, $column, $order);

        return $this;
    }
    public function where(string $column, string $operator, string $value): static
    {
        $this->query = sprintf('%s WHERE %s %s %s', $this->query, $column, $operator, $value);

        return $this;
    }
    public function innerJoin(string $column, string $operator, string $value): static
    {
        $this->query = sprintf('%s INNER JOIN %s %s %s', $this->query, $column, $operator, $value);

        return $this;
    }
    public function first()
    {
        $statement = $this->database->prepare($this->query);

        $statement->execute();

        if ($result = $statement->fetch(PDO::FETCH_OBJ)) {

            return $result;
        }

        return [];
    }

    public function get(): array
    {
        $statement = $this->database->prepare($this->query);

        $statement->execute();

        if ($result = $statement->fetchAll(PDO::FETCH_CLASS)) {
            return $result;
        }
        return [];
    }
}
