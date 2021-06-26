<?php 


class Database{

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'cms_form';

    private $result = array();
    private $conn = false;
    private $mysqli = '';

    // Create Connection
    function __construct(){
        if(!$this->conn){ 
            $this->mysqli = new Mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn = true;

            if($this->mysqli->connect_error){ // Check Connection Error.
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
        }else {
            return true;
        }      
    }

    // Fetch Data From Database
    function select($table,$row = '*',$where = null, $order = null, $limit = null, $join1 = null, $join2 = null, $join3 = null){
        if($this->table_exist($table)){
            $sql = "SELECT {$row} FROM {$table} ";
        }
        if($join1 !=null){
            $sql .= "JOIN {$join1} ";
        }
        
        if($join2 !=null){
            $sql .= "JOIN {$join2} ";
        }
        
        if($join3 !=null){
            $sql .= "JOIN {$join3} ";
        }
        if($where!=null){
            $sql .= "WHERE {$where} ";
        }
        if($order != null){
            $sql .= "ORDER BY {$order} ";
        }
        if($limit !=null){

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $start = ($page - 1) * $limit;
            $sql .= "LIMIT {$start},{$limit}";
        }
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }



    }

    // Pagination a
    function pagination($url,$table,$where = null, $limit = null, $join1 = null, $join2 = null, $join3 = null){
        if($this->table_exist($table)){
            if($limit != null){
                $sql = "SELECT COUNT(*) FROM {$table} ";
                if($where != null){
                    $sql .= "WHERE {$where} ";
                }
                if($join1 != null){
                        $sql .= "JOIN {$join1} ";
                    }
                    
                if($join2 != null){
                        $sql .= "JOIN {$join2} ";
                    }
                    
                    if($join3 != null){
                        $sql .= "JOIN {$join3} ";
                    }
                $query = $this->mysqli->query($sql);
                $total_records = $query->fetch_array();
                $total_records = $total_records[0];
                $total_pages = ceil($total_records / $limit);

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                if($total_records > $limit){
                    $output = "<ul class='pagination'>";
                    // Previous Page
                    if($page > 1){
                        $output .= "<li><a href='$url?page=". ($page - 1) ."'>Prev</a></li>";
                    }

                      for($i=1; $i < $total_pages; $i++){
                        $active = ($i == $page)? "class='active'" : '';
                        $output .= "<li><a {$active} href='{$url}?page={$i}'>{$i}</a></li>";
                       }
                    // Next Page
                    if($total_pages > $page){
                         $output .= "<li><a href='$url?page=". ($page + 1) ."'>Next</a></li>";
                    }
                    $output .= "</ul>";
                    echo $output;
                }
             
            }else{
                return false;
            }
        }
    }
    // Fetch Data From Database on Condition
    function sql($sql){
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    // Insert Data Into Database
    function insert($table, $param = array()){
        if($this->table_exist($table)){
            $table_keys = implode(", ", array_keys($param));
            $table_vals = implode("', '",$param);

            $sql = "INSERT INTO {$table}({$table_keys}) 
                    VALUES('{$table_vals}')";
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }      
    }

    // Update Data From Database
    function update($table,$param = array(),$where = null){
        if($this->table_exist($table)){
         
            $arg = array();
            foreach($param as $key => $val){
               $arg[] = "{$key} = '{$val}'";
            }
           
           $sql = "UPDATE {$table} SET " . implode(", ", $arg);
           if($where != null){
               $sql .= "WHERE {$where}";
           }
            if($this->mysqli->query($sql)){
                echo 'Updated';
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }

    // Delete Data From Database
    function delete($table, $where){
        if($this->table_exist($table)){
            $sql = "DELETE FROM {$table} ";
            if($where != null){
                $sql .= "WHERE {$where}";
            }else{
                array_push($this->result,'Where class is missing in delete query');
                return false;
            } 
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }

    // Check Table Exist
    private function table_exist($table){
        $sql = "SHOW TABLES FROM {$this->db_name} LIKE '{$table}'";
        $db_table_name =  $this->mysqli->query($sql);
        if($db_table_name){
            if($db_table_name->num_rows == 1){
               return true;
            }else{
              array_push($this->result, $table.' Table Does not exist');
              return false;
           }
        }
    }
    // Show Result 
    function get_result(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    // Connection Close
    function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }else{
            return false;
        }
    }

}




?>