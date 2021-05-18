<?php

    class Inscription
    {
        use Hydrate;

        private $_inscriptionName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getInscriptionName()
        {
            return $this->_inscriptionName;
        }
        public function setInscriptionName($InscriptionName)
        {
            $this->_inscriptionName = $InscriptionName;
        }
    }