<?php
require_once 'Db.php';

class ORM extends Db
{
    protected $table;
    protected $select = ['*'];
    protected $where = [];
    protected $whereRaw = '';
    protected $params = [];
    protected $orderBy = [];

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

    // Add search conditions
    public function search($term, $columns = ['title', 'content'])
    {
        $conditions = [];
        foreach ($columns as $col) {
            $conditions[] = "$col LIKE ?";
            $this->params[] = "%$term%";
        }
        $this->whereRaw = '(' . implode(' OR ', $conditions) . ')';
        return $this;
    }

    // Add order by
    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBy[] = "$column $direction";
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
                $wheres[] = "$column = ?";
                $params[] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $wheres);
        }

        if (!empty($this->whereRaw)) {
            $connector = !empty($this->where) ? ' AND ' : ' WHERE ';
            $sql .= $connector . $this->whereRaw;
            $params = array_merge($params, $this->params);
        }

        if (!empty($this->orderBy)) {
            $sql .= " ORDER BY " . implode(', ', $this->orderBy);
        }

        // ✅ FIX: LIMIT & OFFSET must be injected as integers
        if ($limit !== null) {
            $limit = (int) $limit;
            $sql .= " LIMIT $limit";

            if ($offset !== null) {
                $offset = (int) $offset;
                $sql .= " OFFSET $offset";
            }
        }

        return ['sql' => $sql, 'params' => $params];
    }



    // Execute query
    public function get(?int $limit = null, ?int $offset = null)
    {
        $query = $this->toSqlSelect($limit, $offset);
        //die(var_dump($query['params']));
        $stmt = $this->connect()->prepare($query['sql']);
        $stmt->execute($query['params']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        return $this->get()[0] ?? [];
    }

    //insert 
    public function insert(array $data, bool $timestamp = false)
    {
        if ($timestamp) {
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
        }
        //generate the sql
        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(", ", array_keys($data)) . ') VALUES (:' . implode(", :", array_keys($data)) . ')';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($data);
        //return $this->connect()->lastInsertId()
    }
    public function update(array $data, array $conditions, bool $timestamp = false)
    {
        if ($timestamp) {
            $data['updated_at'] = date("Y-m-d H:i:s");
        }
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

    public function delete(array $conditions)
    {
        //generate the sql
        $whereParts = [];
        foreach ($conditions as $column => $value) {
            $whereParts[] = "$column = :where_$column";
        }
        $whereSql = implode(" AND ", $whereParts);

        $sql = "DELETE FROM " . $this->table . " WHERE $whereSql";

        $stmt = $this->connect()->prepare($sql);

        //bind parameters
        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":where_$column", $value);
        }

        return $stmt->execute();
    }
}
