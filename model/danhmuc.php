<?php 
    require_once "pdo.php";

    function danhmuc_get_all_home(){
        $sql = "SELECT * FROM danhmuc ORDER BY ID DESC LIMIT 0,9";
        return pdo_query($sql); 
    }
    function danhmuc_get_all(){
        $sql = "SELECT * FROM danhmuc";
        return pdo_query($sql); 
    }

    function loadall_danhmuc(){
        $sql = "SELECT * FROM danhmuc ORDER BY ID DESC";
        return pdo_query($sql);
    
    }

    function insert_dm($id, $name) {
        $sql= "INSERT INTO danhmuc (`id`,`name`) VALUES ('$id','$name')";
        pdo_execute($sql);
    }

    function delete_dm($id){
        $sql= "DELETE FROM danhmuc WHERE id = '$id'";
        pdo_execute($sql); 
    }

    function danhmuc_get_by_id($id){
        $sql= "SELECT * FROM danhmuc WHERE id = '$id'";
        return pdo_query_one($sql);
    }

    function update_dm($id,$name) {
        $sql = "UPDATE danhmuc SET name = '$name' WHERE id = '$id'";
        pdo_execute($sql);
    }
    function loadall_dm($kyw="",$iddm=0){
        $sql = "SELECT * FROM danhmuc where 1";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm = '".$iddm."'";
        }
        $sql.= " order by id desc";
        $data = pdo_query($sql);
        return $data;
    }

?>