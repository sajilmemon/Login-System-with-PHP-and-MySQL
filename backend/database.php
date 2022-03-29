<?php
@session_start();

// Indian time zone
// date_default_timezone_set("Asia/Calcutta"); 

class database
{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect()
    {
        $this->host = 'localhost';
        $this->dbusername = 'root';
        $this->dbpassword = '';
        $this->dbname = 'studio';
        $con = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
        return $con;
    }
}

class query extends database
{
    public function getData($table, $field = '*', $condition_arr = '',$condition_search_arr='', $order_by_field = '', $order_by_type = 'desc', $limit = '', $offset= 0 )
    {
        $sql = "select $field from $table ";
        if ($condition_arr != '') {
            $sql .= ' where ';
            $c = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key='$val'";
                } else {
                    $sql .= "$key='$val' and ";
                }
                $i++;
            }
        }
        
        if ($condition_search_arr != '') {
            $sql .= ' where ';
            $c = count($condition_search_arr);
            $i = 1;
            foreach ($condition_search_arr as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key like '%$val%'";
                } else {
                    $sql .= "$key like '%$val%' OR ";
                }
                $i++;
            }
        }

        if ($order_by_field != '') {
            $sql .= " order by $order_by_field $order_by_type ";
        }

        if ($limit != '') {
            if($offset !=0)
            {
                $sql .= " limit $offset , $limit ";                
            }
            else
            {
                $sql .= " limit $limit ";
            }
        }
//        die($sql);
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return 0;
        }
    }
    public function get_safe_str($str)
    {
        if ($str != '') {
            return mysqli_real_escape_string($this->connect(), $str);
        }
    }
}
?>