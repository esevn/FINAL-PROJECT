<?php
session_start();

require_once __DIR__ . '/../DB/Connection.php';

class Model extends Connection{

    public function create_data($data, $table){
        $value = array_values($data);
        $key =  array_keys($data);
        $key = implode(",", $key);
        $value = implode("','", $value);
        
        $query = "INSERT INTO $table ($key) VALUES ('$value')";
        // echo $query;
        $result = mysqli_query($this->db, $query);

        if($result){
            return $data;
        }else {
            return false;
        };
    }

    public function all_data($table){
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function index($table){
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);
  
        return $this->convert_data($result);
    }

    public function convert_data($datas){
        $data = [];
        while($row = mysqli_fetch_assoc($datas)){
            $data [] = $row;
        }

        return $data;
    }

    public function find_data($table, $id, $colomn){
        $query = " SELECT * FROM $table WHERE $colomn = $id";
        $result =  mysqli_query($this->db, $query);
        
        return $this->convert_data($result);
    }


    public function update_data($table, $id, $datas, $colomn){
        $key  = array_keys($datas);
        $value = array_values($datas);
        $query = "UPDATE $table SET ";
    
        for($i = 0; $i < count($key); $i++ ){
            $query .= $key[$i] . " = '" . $value[$i] . "'";
            if($i != count($key) - 1) {
                $query .= ", ";
            }
        }
    
        $query .= " WHERE {$colomn} = $id";  

        $result = mysqli_query($this->db, $query);
        
        if($result){
            return $result;
        }else {
            return false;
        };
    }
    

    public function delete_data($id, $colomn, $table){ 
        $query = " DELETE FROM $table WHERE $colomn = $id";
        $result =  mysqli_query($this->db, $query);
        return $result;   
    }

    public function search_data($keyword, $table){
        $query = "SELECT * FROM $table $keyword";
        $result = mysqli_query($this->db, $query);
        
        return $this->convert_data($result);
    }

    public function paginate_data($start, $limit, $table)
    {
        $query = "SELECT * FROM $table LIMIT $start, $limit";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }
}