<?php

    class User extends UserType
    {
        use Hydrate;

        private $_userEmail;
        private $_userLastName;
        private $_userFirstName;
        private $_userPhoneNumber;
        private $_userPassword;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getUserEmail()
        {
            return $this->_userEmail;
        }
        public function setUserEmail($userEmail)
        {
            $this->_userEmail = $userEmail;
        }

        public function getUserLastName()
        {
            return $this->_userLastName;
        }
        public function setUserLastName($userLastName)
        {
            $this->_userLastName = $userLastName;
        }

        public function getUserFirstName()
        {
            return $this->_userFirstName;
        }
        public function setUserFirstName($userFirstName)
        {
            $this->_userFirstName = $userFirstName;
        }

        public function getUserPhoneNumber()
        {
            return $this->_userPhoneNumber;
        }
        public function setUserPhoneNumber($userPhoneNumber)
        {
            $this->_userPhoneNumber = $userPhoneNumber;
        }

        public function getUserPassword()
        {
            return $this->_userPassword;
        }
        public function setUserPassword($userPassword)
        {
            $this->_userPassword = $userPassword;
        }
    }