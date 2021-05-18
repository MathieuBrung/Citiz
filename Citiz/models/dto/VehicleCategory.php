<?php

    class VehicleCategory
    {
        use Hydrate;
        
        private $_VCCode;
        private $_VCName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getVCCode()
        {
            return $this->_VCCode;
        }
        public function setVCCode($VCCode)
        {
            $this->_VCCode = $VCCode;
        }

        public function getVCName()
        {
            return $this->_VCName;
        }
        public function setVCName($VCName)
        {
            $this->_VCName = $VCName;
        }
    }