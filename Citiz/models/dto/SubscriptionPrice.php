<?php

    class SubscriptionPrice
    {
        use Hydrate;

        private $_SPMonthly;
        private $_SPMembership;
        private $_SPGuaranteeDeposit;
        private $_SPSocialPart;

        private Inscription $_inscription;
        private Formula $_formula;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getSPMontlhy()
        {
            return $this->_SPMontlhy;
        }
        public function setSPMontlhy($SPMontlhy)
        {
            $this->_SPMontlhy = $SPMontlhy;
        }

        public function getSPMembership()
        {
            return $this->_SPMembership;
        }
        public function setSPMembership($SPMembership)
        {
            $this->_SPMembership = $SPMembership;
        }

        public function getSPGuaranteeDeposit()
        {
            return $this->_SPGuaranteeDeposit;
        }
        public function setSPGuaranteeDeposit($SPGuaranteeDeposit)
        {
            $this->_SPGuaranteeDeposit = $SPGuaranteeDeposit;
        }

        public function getSPSocialPart()
        {
            return $this->_SPSocialPart;
        }
        public function setSPSocialPart($SPSocialPart)
        {
            $this->_SPSocialPart = $SPSocialPart;
        }

        public function getFormula()
        {
            return $this->_formula;
        }
        public function setFormula(Formula $formula)
        {
            $this->_formula = $formula;
        }

        public function getInscription()
        {
            return $this->_inscription;
        }
        public function setInscription(Inscription $inscription)
        {
            $this->_inscription = $inscription;
        }
    }