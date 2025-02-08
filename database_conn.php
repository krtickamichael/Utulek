<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

define("DEBUG", true);

class Db
{
    private static DB $instance;
    private PDO $pdo;
    private PDOStatement $query;
    private array $results = [];
    protected string $table;
    private bool $error = true;

    private function __construct()
    {
        try {
            if (file_exists(__DIR__ . ".env_secrets")) {
                $dotenv = Dotenv::createImmutable(__DIR__, ".env_secrets");
            } else {
                $dotenv = Dotenv::createImmutable(__DIR__, ".env");
            }
            $dotenv->load();

            $this->pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";charset=utf8", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

            if (DEBUG) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $exception) {
            if (DEBUG) {
                die($exception->getMessage());
            } else {
                die('Database connection error.');
            }
        }
    }

    public static function getInstance(): DB
    {
        if (!isset($instance)) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    private function __clone()
    {
        throw new Exception("klonování není povoleno");
    }
    final public function __wakeup()
    {
        throw new Exception('Deserializace není povolena');
    }

    public function query(string $sql, array $params = [], ?string $orderBy = null)
    {
        $this->error = false;

        if ($orderBy !== null) {
            $sql .= " ORDER BY $orderBy";
        }

        $this->query = $this->pdo->prepare($sql);
        if ($this->query->execute($params)) {
            $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
        }
        return $this;
    }

    public function select(array $fields, array $conditions = [], ?string $orderBy = null): DB
    {
        $conditionsString = '';
        $fieldsString = '';

        foreach ($fields as $field) {
            $fieldsString .= $field . ", ";
        }
        $fieldsString = rtrim($fieldsString, ', ');

        if (!empty($conditions)) {
            $conditionsString .= 'WHERE';
            foreach ($conditions as $field => $bind) {
                $conditionsString .= " " . $field . " = :" . $field . " AND";
            }
        }
        $conditionsString = rtrim($conditionsString, ' AND');

        $sql = "SELECT $fieldsString FROM $this->table $conditionsString";
        $this->query($sql, $conditions, $orderBy);
        return $this;
    }

    public function setTable(string $table): DB
    {
        $this->table = $table;
        return $this;
    }

    public function results(): array
    {
        return $this->results;
    }

    public function insert(array $params)
    {
        $fieldString = '';
        $valueString = '';
        foreach ($params as $field => $value) {
            $fieldString .= '`' . $field . '`,';
            $valueString .= ':' . $field . ',';
        }

        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');

        $sql = "INSERT INTO {$this->table} ({$fieldString}) VALUES ({$valueString})";
        return  $this->runQueryAndCheckForErrors($sql, $params);
    }

    public function runQueryAndCheckForErrors(string $sql, array $params)
    {
        if (!$this->query($sql, $params)->error()) {
            return true;
        }
        return false;
    }

    public function error()
    {
        return $this->error;
    }

    public function update(int $id, $params)
    {
        $updateFieldsString = '';
        foreach (array_keys($params) as $field) {
            $updateFieldsString .= "`$field` = :$field, ";
        }
        $updateFieldsString = rtrim($updateFieldsString, ', ');
        $params['id'] = $id;
        $sql = "UPDATE {$this->table} SET $updateFieldsString WHERE id_$this->table = :id";
        return $this->runQueryAndCheckForErrors($sql, $params);
    }

    public function delete(int $id)
    {
        $params = ['id' => $id];
        $sql = "DELETE FROM $this->table WHERE id_$this->table = :id";
        return $this->runQueryAndCheckForErrors($sql, $params);
    }
}
