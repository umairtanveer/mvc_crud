<?php

namespace App\Controllers;

use PDO;
use \Core\View;
use \Core\Model;
use App\Models\Customer;
use App\Helpers\GeneralHelper;

class Customers extends \Core\Controller
{

    public function listCustomersAction()
    {
        $customer = new Customer();
        $customers = $customer->customerList();
        echo GeneralHelper::makeJsonResponse($customers,"Success",true);
    }

    public function detailCustomerAction($id)
    {
        $customer = new Customer();
        $customer = $customer->customerDetail($id);
        echo GeneralHelper::makeJsonResponse($customer,"Success",true);
    }

    public function createCustomerAction()
    {
      $customer = new Customer();
      $result = $customer->createCustomer();
      echo json_encode($result);
    }

    public function updateCustomerAction()
    {
      $customer = new Customer();
      $result = $customer->updateCustomer();
      echo json_encode($result);
    }

    public function deleteCustomerAction($id)
    {
      $customer = new Customer();
        $result = $customer->deleteCustomer($id);
        echo json_encode($result);
    }


}
