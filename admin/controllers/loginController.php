<?php
    //load file model
    include "models/LoginModel.php";
    class LoginController extends Controller{
        //kế thừa class LoginModel
        use LoginModel;
        //url: index.php?controller=login -> action mặc định là index
        public function index(){
            //load view
            $this->loadView("LoginView.php");
        }
         //khi ấn nút submt ở form login sẽ dẫn hàm
         //url: index.php?controller=login&action=loginPost
        public function doLogin(){
    	   //gọi hàm là modellogin ktra login
    	   $this->modelLogin();
        }
        public function logout(){
    	   unset($_SESSION['email']);
    	      header("location:index.php");
        }
    }
   
?>