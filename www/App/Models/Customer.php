<?php

namespace App\Models;

use \Core\Model;

class Customer extends \Core\Model
{
    protected $first_name = "";
    protected $last_name  = "";
    protected $email      = "";
    protected $phone      = "";
    protected $country    = "";

    public  function customerList()
    {
        $db = Model::getDB();
        $users = $db->query("SELECT * FROM customers");
        return $users;
    }

    public  function customerDetail($id)
    {
        $db = Model::getDB();
        $user = $db->query("SELECT * FROM customers WHERE id = '$id'");
        return $user;
    }

    public  function deleteCustomer($id)
    {
        $db = Model::getDB();
        if( $db->query("DELETE FROM customers WHERE id='$id'")){
          return true;
        }else{
          return false;
        }
    }

    public  function createCustomer(){

      $validate = $this->validateFormData();

      if(count($validate) <= 0){
        $this->setFormData();
        $db = Model::getDB();
        $sql = "INSERT INTO customers (first_name, last_name, email, phone, country)
        VALUES ('$this->first_name', '$this->last_name', '$this->email', '$this->phone', '$this->country')";

        if(mysqli_query($db, $sql)){
          return true;
        }else{
          return false;
        }
      }else{
        return $validate;
      }
    }

    public  function updateCustomer(){
      if(!isset($_POST['id'])){
        return "ID is required to delete customer";
      }
      $id  = $_POST['id'];
      $validate = $this->validateFormData();

      if(count($validate) <= 0){
        $this->setFormData();
        $db = Model::getDB();
        $sql = "UPDATE customers
        SET first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email', phone='$this->phone',country='$this->country'
        WHERE id = '$id'";

        if(mysqli_query($db, $sql)){
          return true;
        }else{
          return false;
        }
      }else{
        return $validate;
      }
    }

    public function setFormData(){
      $this->first_name  = $_POST['first_name'];
      $this->last_name   = $_POST['last_name'];
      $this->email       = $_POST['email'];
      $this->phone       = $_POST['phone'];
      $this->country     = $_POST['country'];
    }

    public function validateFormData(){

      $errors = array();

      if(!isset($_POST['first_name'])){
        $errors[] = "First name is required";
      }
      if(!isset($_POST['last_name'])){
        $errors[] = "Last name is required";
      }
      if(!isset($_POST['email'])){
        $errors[] = "Email is required";
      }
      if(!isset($_POST['phone'])){
        $errors[] = "Phone is required";
      }
      if(!isset($_POST['country'])){
        $errors[] = "Country is required";
      }
      // echo count($errors);
      // exit();
      return $errors;


    }


}
