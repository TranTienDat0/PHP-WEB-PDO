<?php 
     class Controller{
        //hàm hiển thị view

        public function loadView($fileName, $data = NULL){
// nếu biến data ko null thì extract để biến tên key thành tên biến
            if($data != NULL){
                extract($data);
            }
// kiểm tra xem đưuòng dẫn file có tồn tại ko, nếu có tồn tại thì load $filename
            if(file_exists("views/$fileName")){
                //đọc nd trong đưnòg dẫn fileName để gắn vào 1 biến
                //tạo biến để cbi lấy data view gắn vào biến này
                $view = NULL;
                $layout = NULL;
                ob_start();
                include "views/$fileName";
                $view = ob_get_contents();
                ob_get_clean();
                //ktra nếu biến là layout ko null thì include nó
                if($layout != NULL)
                    include "views/$layout";
                else
                    echo $view;
            }
            //ktra đăng nhập
        }
        public function authentication(){
            //!isset($_SESSION["email"]) <=> $_SESSION["email"] == false
            //isset($_SESSION["email"]) <=> $_SESSION["email"] == true
            if(!isset($_SESSION["email"]))
                header("location:index.php?controller=login");
        }
     }
?>