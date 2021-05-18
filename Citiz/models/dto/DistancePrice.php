<?php

    class DistancePrice
    {
        use Hydrate;

        private $_DPInf100Km;
        private $_DPSup100Km;
        private $_VCCode;
        private $_distanceName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDPInf100Km()
        {
            return $this->_DPInf100Km;
        }
        public function setDPInf100Km($DPInf100Km)
        {
            $this->_DPInf100Km = $DPInf100Km;
        }

        public function getDPSup100Km()
        {
            return $this->_DPSup100Km;
        }
        public function setDPSup100Km($DPSup100Km)
        {
            $this->_DPSup100Km = $DPSup100Km;
        }

        public function getVCCode()
        {
            return $this->_VCCode;
        }
        public function setVCCode($VCCode)
        {
            $this->_VCCode = $VCCode;
        }

        public function getDistanceName()
        {
            return $this->_distanceName;
        }
        public function setDistanceName($distanceName)
        {
            $this->_distanceName = $distanceName;
        }
    }