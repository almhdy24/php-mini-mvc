<?php
namespace App\Core;

use PDO;
use PDOException;

abstract class Model
{
  protected static ?PDO $db = null;

  protected string $table;
  protected string $primaryKey = 'id';

  protected function db(): PDO
  {
    if (!self::$db) {
      $config = require dirname(__DIR__, 2) . '/config/app.php';

      try {
        self::$db = new PDO('sqlite:' . $config['db']['database']);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new \Exception('DB connection failed: ' . $e->getMessage());
      }
    }

    return self::$db;
  }


  public function all(): array
  {
    $stmt = $this->db()->query("SELECT * FROM {$this->table}");
    return $stmt->fetchAll();
  }


  public function find($id): ?array
  {
    $stmt = $this->db()->prepare(
      "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1"
    );
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?: null;
  }


  public function create(array $data): bool
  {
    $fields = array_keys($data);
    $columns = implode(',', $fields);
    $placeholders = ':' . implode(', :', $fields);

    $stmt = $this->db()->prepare(
      "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})"
    );

    return $stmt->execute($data);
  }
}