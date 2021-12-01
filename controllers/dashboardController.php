<?php

class dashboardController 
{
    public function index() {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/dashboard/index.php';
        require_once './admin/layout/footer.php';
    }
}