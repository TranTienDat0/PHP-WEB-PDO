<?php 
// tạo hàm hiển thị data
     
     class Connection{
        // hàm sd để kết nối csdl
        public static function getInstance(){
            $server_name = "localhost";
            $database_name = "qlsach";
            //$database_name = "php62_project";
            $username = "root";
            $password = "";
            //kết nối csdl, trả kq về biến kết nối
            $conn = new PDO("mysql:host=$server_name; dbname=$database_name", $username, $password);
            // nếu muốn lấy đc tv hiển thị lên web cần dog lệnh
            $conn->exec("set names utf8");
            //trả kq để sd cho bền ngoài khi gọi hàm này
            return $conn;
        }
     }
?>