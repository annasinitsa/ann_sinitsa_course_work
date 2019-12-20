<?php

//class to communicate with db
class MyDB
{
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new MyDB();
        }

        return self::$instance;
    }

    public function disconnect()
    {
        if ($this->cn_state) {
            mysqli_close($this->conn);
        }
    }

    public function getResult()
    {
        return $this->result;
    }

    public function delete($table, $where = null)
    {
        if ($this->tableExists($table) == true) {
            $delete = 'DELETE FROM ' . $table;

            if ($where != null)
                $delete .= ' WHERE ' . $where;
            //echo $delete;
            $del = @mysqli_query($this->conn, $delete);
            if ($del) {
                return true;
            } else {
                error_log("Deleting finished with error " . mysqli_error($this->conn) .", sql: " . $delete);
                return false;
            }
        }
    }

    public function call($proc, $parameters = null)
    {
        $this->result = null;
        if ($this->procExists($proc) == true) {

            $call = 'CALL ' . $proc;
            if ($parameters != null)
                $call .= ' ' . $parameters;
            //echo $call;
            $query = mysqli_multi_query($this->conn, $call);


            $set = 0;

            if ($result = mysqli_store_result($this->conn)) {
                do {

                    // Store first result set
                    $i = 0;
                    $this->numResults = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {

                        if ($set == 0) {

                            $key = array_keys($row);
                            for ($x = 0; $x < count($key); $x++) {
                                // Sanitizes keys so only alphavalues are allowed
                                if (!is_int($key[$x])) {
                                    if (mysqli_num_rows($result) > 1) {
                                        $this->result[$i][$key[$x]] = $row[$key[$x]];
                                    } elseif (mysqli_num_rows($result) < 1) {
                                        $this->result = null;
                                    } else {
                                        $this->result[$key[$x]] = $row[$key[$x]];
                                    }
                                }
                            }
                        }
                        // Free result set
                        $i++;
                    }
                    $set++;
                } while (mysqli_more_results($this->conn) && mysqli_next_result($this->conn));
                //mysqli_free_result($result);
            }

            if ($query != false) {
                return true;
            } else {
                error_log("Call finished with error " . mysqli_error($this->conn) .", sql: " . $call);
                return false;
            }
        }
        return false;

    }

    public function query(string $query) : bool
    {
        $result = @mysqli_query($this->conn, $query);

        if ($result == false) {
            error_log(__FUNCTION__ . " failed with error " . mysqli_error($this->conn) . " query = $query");
        }
        return $result;
    }

    public function select($table, $rows = '*', $where = null, $group = null, $order = null, $limit = null)
    {
        $this->result = null;

        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($group != null)
            $q .= ' GROUP BY ' . $group;
        if ($order != null)
            $q .= ' ORDER BY ' . $order;
        if ($limit != null)
            $q .= ' LIMIT ' . $limit;

        //echo $q."<br>";
        if ($this->tableExists($table)) {
            $query = @mysqli_query($this->conn, $q);
            if ($query) {
                $this->numResults = mysqli_num_rows($query);
                for ($i = 0; $i < $this->numResults; $i++) {
                    $r = mysqli_fetch_array($query);
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++) {
                        // Sanitizes keys so only alphavalues are allowed
                        if (!is_int($key[$x])) {
                            if (mysqli_num_rows($query) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]]; elseif (mysqli_num_rows($query) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]];
                        }
                    }
                }
                return true;
            } else {
                error_log("Select finished with error " . mysqli_error($this->conn) .", sql: " . $q);
                return false;
            }
        } else
            return false;
    }

    private function tableExists($table)
    {

        $tablesInDb = @mysqli_query($this->conn, 'SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');

        if (mysqli_num_rows($tablesInDb) == 1) {
            return true;
        } else {
            return false;
        }

    }

    private function procExists($proc)
    {
        //echo 'SHOW PROCEDURE STATUS LIKE "' . $proc . '"';
        $procsInDb = @mysqli_query($this->conn, 'SHOW PROCEDURE STATUS LIKE "' . $proc . '"');

        if (mysqli_num_rows($procsInDb) >= 1) {
            return true;
        } else {
            return false;
        }

    }

    private function connect()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        mysqli_set_charset($this->conn, "utf8");
        if ($this->conn->connect_error) {
            $this->cn_state = false;
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            $this->cn_state = true;
            return true;
        }
    }

    protected function __construct()
    {
        $st = Settings::getInstance();
        $this->db_host = "77.47.192.87:33321";
        $this->db_user = "ka7514";
        $this->db_pass = "123456";
        $this->db_name = "ka7514";

        $this->connect();

    }

    protected function __deconstruct()
    {
        $this->disconnect();
    }


}