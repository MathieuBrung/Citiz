<?php

    class Subscriber extends User
    {
        private $_subscriberId;
        private $_subscriberDateOfBirth;
        private $_subscriberGender;
        private $_subscriberStreet;
        private $_subscriberAdressDetails;
        private $_subscriberCity;
        private $_subscriberPostalCode;

        private PaymentMode $_paymentMode;
        private Inscription $_inscription;
        private Formula $_formula;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getSubscriberId()
        {
            return $this->_subscriberId;
        }
        public function setSubscriberId($subscriberId)
        {
            $this->_subscriberId = $subscriberId;
        }

        public function getSubscriberDateOfBirth()
        {
            return $this->_subscriberDateOfBirth;
        }
        public function setSubscriberDateOfBirth($subscriberDateOfBirth)
        {
            $this->_subscriberDateOfBirth = $subscriberDateOfBirth;
        }

        public function getSubscriberGender()
        {
            return $this->_subscriberGender;
        }
        public function setSubscriberGender($subscriberGender)
        {
            $this->_subscriberGender = $subscriberGender;
        }

        public function getSubscriberStreet()
        {
            return $this->_subscriberStreet;
        }
        public function setSubscriberStreet($subscriberStreet)
        {
            $this->_subscriberStreet = $subscriberStreet;
        }

        public function getSubscriberAdressDetails()
        {
            return $this->_subscriberAdressDetails;
        }
        public function setSubscriberAdressDetails($subscriberAdressDetails)
        {
            $this->_subscriberAdressDetails = $subscriberAdressDetails;
        }
        
        public function getSubscriberCity()
        {
            return $this->_subscriberCity;
        }
        public function setSubscriberCity($subscriberCity)
        {
            $this->_subscriberCity = $subscriberCity;
        }

        public function getSubscriberPostalCode()
        {
            return $this->_subscriberPostalCode;
        }
        public function setSubscriberPostalCode($subscriberPostalCode)
        {
            $this->_subscriberPostalCode = $subscriberPostalCode;
        }

        public function getPaymentMode()
        {
            return $this->_paymentMode;
        }
        public function setPaymentMode(PaymentMode $paymentMode)
        {
            $this->_paymentMode = $paymentMode;
        }
        
        public function getInscription()
        {
            return $this->_inscription;
        }
        public function setInscription(Inscription $inscription)
        {
            $this->_inscription = $inscription;
        }

        public function getFormula()
        {
            return $this->_formula;
        }
        public function setFormula(Formula $formula)
        {
            $this->_formula = $formula;
        }

    }