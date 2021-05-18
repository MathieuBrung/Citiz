<?php

    class RightsType
    {
        use Hydrate;

        private $_RTCode;
        private $_RTName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getRTCode()
        {
            return $this->_RTCode;
        }
        public function setRTCode($RTCode)
        {
            $this->_RTCode = $RTCode;
        }

        public function getRTName()
        {
            return $this->_RTName;
        }
        public function setRTName($RTName)
        {
            $this->_RTName = $RTName;
        }
    }