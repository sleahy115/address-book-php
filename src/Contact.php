<?php

      class Contact {
        private $name;
        private $address;
        private $Phone_number;


      function __construct($name, $address, $phone_number)
      {
          $this->name = $name;
          $this->address = $address;
          $this->phone_number = $phone_number;
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
      function save()
      {
          array_push($_SESSION['list_of_contacts'], $this);
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
