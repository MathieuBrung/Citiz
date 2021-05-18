<?php

    class Formula
    {
        use Hydrate;

        private $_formulaName;
        
        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getFormulaName()
        {
            return $this->_formulaName;
        }
        public function setFormulaName($formulaName)
        {
            $this->_formulaName = $formulaName;
        }
    }