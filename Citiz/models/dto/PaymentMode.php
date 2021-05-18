<?php

    class PaymentMode
    {
        use Hydrate;

        private $_PMCode;
        private $_PMName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getPMCode()
        {
            return $this->_PMCode;
        }
        public function setPMCode($PMCode)
        {
            $this->_PMCode = $PMCode;
        }

        public function getPMName()
        {
            return $this->_PMName;
        }
        public function setPMName($PMName)
        {
            $this->_PMName = $PMName;
        }
    }