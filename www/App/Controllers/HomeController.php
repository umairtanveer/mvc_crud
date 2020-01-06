<?php

namespace App\Controllers;

use PDO;
use \Core\View;
use \Core\Model;
use App\Models\Customer;
use App\Helpers\GeneralHelper;

class HomeController extends \Core\Controller
{

    public function indexAction()
    {

        $data      = Customer();
        $customers = $data->customerList();

        View::renderTemplate('Home/index.php',['customers'=>$customers]);

    }


}
