<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] != 'Admin') {
    header("Location: /login");
    die;
}

class Reports extends Controller {

    public function index() {		
        $this->view('report/index'); 
    }
}
?>