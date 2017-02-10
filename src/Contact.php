<?php

      class Contact {
        private $name;
        private $address;
        private $Phone_number;
        private $email;


      function __construct($name, $address, $phone_number, $email)
      {
          $this->name = $name;
          $this->address = $address;
          $this->phone_number = $phone_number;
          $this->email = $email;
      }

      function setName()
      {
        $this->name = $name;
      }
      function getName()
      {
        return $this->name;
      }
      function setAddress()
      {
        $this->address = $address;
      }
      function getAddress()
      {
      return $this->address;
      }
      function setPhoneNumber()
      {
      $this->phone_number = $phone_number;
      }
      function getPhoneNumber()
      {
      return $this->phone_number;
      }
      function setEmail()
      {
        $this->email = $email;
      }
      function getEmail()
      {
        return $this->email;
      }
      function save()
      {
          array_push($_SESSION['list_of_contacts'], $this);
      }
      function search($name_entered)
      {
        foreach($_SESSION['list_of_contacts'] as $contacts => $name){
            if($name == $name_entered){
                echo "its a match!";
                return true;
            }else {
                return false;
            }
        }
      }
      static function getAll()
      {
        return $_SESSION['list_of_contacts'];
      }
      static function clearAll()
      {
          return $_SESSION['list_of_contacts'] = array();
      }
    }

?>
