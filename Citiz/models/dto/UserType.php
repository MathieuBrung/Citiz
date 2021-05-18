<?php

    class UserType
    {
        use Hydrate;

        private $_UTCode;
        private $_UTName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getUTCode()
        {
            return $this->_UTCode;
        }
        public function setUTCode($UTCode)
        {
            $this->_UTCode = $UTCode;
        }

        public function getUTName()
        {
            return $this->_UTName;
        }
        public function setUTName($UTName)
        {
            $this->_UTName = $UTName;
        }
    }