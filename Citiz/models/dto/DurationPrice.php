<?php

    class DurationPrice
    {
        use Hydrate;
        
        private $_DP;
        private $_formulaName;
        private $_VCCode;
        private $_durationName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDP()
        {
            return $this->_DP;
        }
        public function setDP($DP)
        {
            $this->_DP = $DP;
        }

        public function getFormulaName()
        {
            return $this->_formulaName;
        }
        public function setFormulaName($formulaName)
        {
            $this->_formulaName = $formulaName;
        }

        public function getVCCode()
        {
            return $this->_VCCode;
        }
        public function setVCCode($VCCode)
        {
            $this->_VCCode = $VCCode;
        }

        public function getDurationName()
        {
            return $this->_durationName;
        }
        public function setDurationName($durationName)
        {
            $this->_durationName = $durationName;
        }
    }