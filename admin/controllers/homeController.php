<?php 
    class HomeController extends Controller{
        public function __construct(){
            //gọi hàm xác nhận đăng nhập
            $this->authentication();
        }
    	public function index(){
    		//load view
    		$this->loadView('HomeView.php');
    	}
    }
?>