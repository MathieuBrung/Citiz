<?php

    class Tram
    {
        use Hydrate;

        private $_TSName;
        private $_TSCity;
        
        private $_TLCode;

        private $_SVId;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getTSName()
        {
            return $this->_TSName;
        }
        public function setTSName($TSName)
        {
            $this->_TSName = $TSName;
        }

        public function getTSCity()
        {
            return $this->_TSCity;
        }
        public function setTSCity($TSCity)
        {
            $this->_TSCity = $TSCity;
        }

        public function getTLCode()
        {
            return $this->_TLCode;
        }
        public function setTLCode($TLCode)
        {
            $this->_TLCode = $TLCode;
        }

        public function getSVId()
        {
            return $this->_SVId;
        }
        public function setSVId($SVId)
        {
            $this->_SVId = $SVId;
        }
    }