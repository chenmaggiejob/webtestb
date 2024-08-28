<?php
session_start();

class DB
{

    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db10";
    protected $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "select * from `$this->table`";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(2);
    }

    function find($arg)
    {
        $sql = "select * from `$this->table`";

        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` = '$arg' ";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(2);
    }

    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = $this->a2s($arg);
            $sql = "update `$this->table` set" . join(",", $tmp) . " where `id` = '{$arg['id']}'";
        } else {
            $keys = array_keys($arg);
            $sql = "insert into `$this->table` (`" . join("`,`", $keys) . "`)
                    values ('" . join("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from `$this->table`";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function del($arg)
    {
        $sql = "delete from `$this->table`";

        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` = '$arg' ";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }
}

$Users = new DB('users');
// $data = $Users->count(['acc' => 'admin']);

function to($url)
{
    header("location:" . $url);
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

// dd($data);
