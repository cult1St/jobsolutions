<?php
require_once 'Db.php';

class ORM extends Db
{
    protected $table;
    protected $select = ['*'];
    protected $where = [];

    // Factory method to set table
    public static function table(string $tablename)
    {
        $instance = new self();
        $instance->table = $tablename;
        return $instance;
    }

    // Select columns
    public function select(array $columns = ['*'])
    {
        $this->select = $columns;
        return $this;
    }

    // Add where conditions
    public function where(array $conditions)
    {
        $this->where = $conditions;
        return $this;
    }

    // Build SQL and params for PDO
    public function toSqlSelect(?int $limit = null, ?int $offset = null)
    {
        $sql = "SELECT " . implode(", ", $this->select) . " FROM {$this->table}";

        $params = [];
        if (!empty($this->where)) {
            $wheres = [];
            foreach ($this->where as $column => $value) {
                $placeholder = ":" . $column;
                $wheres[] = "$column = $placeholder";
                $params[$placeholder] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $wheres);
        }

        if ($limit) {
            $sql .= " LIMIT :limit";
            $params['limit'] = $limit;
        }
        return ['sql' => $sql, 'params' => $params];
    }

    // Execute query
    public function get(?int $limit = null, ?int $offset = null)
    {
        $query = $this->toSqlSelect($limit, $offset);
        $stmt = $this->connect()->prepare($query['sql']);
        $stmt->execute($query['params']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        return $this->get()[0] ?? [];
    }

    //insert 
    public function insert(array $data)
    {
        //generate the sql
        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(", ", array_keys($data)) . ') VALUES (:' . implode(", :", array_keys($data)) . ')';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($data);
        //return $this->connect()->lastInsertId()
    }
    public function update(array $data, array $conditions)
    {
        //generate the sql
        $setParts = [];
        foreach ($data as $column => $value) {
            $setParts[] = "$column = :set_$column";
        }
        $setSql = implode(", ", $setParts);

        $whereParts = [];
        foreach ($conditions as $column => $value) {
            $whereParts[] = "$column = :where_$column";
        }
        $whereSql = implode(" AND ", $whereParts);

        $sql = "UPDATE " . $this->table . " SET $setSql WHERE $whereSql";

        $stmt = $this->connect()->prepare($sql);

        //bind parameters
        foreach ($data as $column => $value) {
            $stmt->bindValue(":set_$column", $value);
        }
        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":where_$column", $value);
        }

        return $stmt->execute();
    }
}
