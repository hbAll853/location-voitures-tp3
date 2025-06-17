<?php
namespace App\Models;

use PDO;

abstract class CRUD extends PDO {
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function __construct() {
        parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
    }

    public function select($order='asc') {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->primaryKey} {$order}";
        $stmt = $this->query($sql);
        return $stmt ? $stmt->fetchAll() : false;
    }

    public function selectId($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert($data) {
        $keys = array_intersect_key($data, array_flip($this->fillable));
        $fields = implode(', ', array_keys($keys));
        $placeholders = ':'.implode(', :', array_keys($keys));
        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";
        $stmt = $this->prepare($sql);
        foreach($keys as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }
        return $stmt->execute() ? $this->lastInsertId() : false;
    }

    public function update($data, $id) {
        $keys = array_intersect_key($data, array_flip($this->fillable));
        $set = '';
        foreach($keys as $field => $value) {
            $set .= "$field = :$field, ";
        }
        $set = rtrim($set, ', ');
        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->primaryKey} = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        foreach($keys as $field => $value) {
            $stmt->bindValue(":$field", $value);
        }
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
