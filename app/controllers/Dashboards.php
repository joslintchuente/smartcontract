<?php
class Dashboards extends Controller
{

    public function __construct()
    {
        $this->dashboardModel = $this->model('Dashboard');
    }

    public function Admin()
    {
        $this->view('dashboard/admin');
    }


    public function fournisseur()
    {
        $this->view('fournisseur/index');
    }
}
