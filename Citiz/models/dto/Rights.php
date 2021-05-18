<?php

    class Rights
    {
        use Hydrate;

        private UserType $_userType;
        private RightsType $_rightsType;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getUserType()
        {
            return $this->_userType;
        }
        public function setUserType(UserType $userType)
        {
            $this->_userType = $userType;
        }

        public function getRightsType()
        {
            return $this->_rightsType;
        }
        public function setRightsType(RightsType $rightsType)
        {
            $this->_rightsType = $rightsType;
        }
    }