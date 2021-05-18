<?php

    class PaymentInformation
    {
        use Hydrate;

        private $_PIId;
        private $_PIIBAN;
        private $_PIBIC;
        private $_PIHolderLastName;
        private $_PIHolderFirstName;
        private $_PIBankName;

        private Subscriber $_subscriber;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getPIId()
        {
            return $this->_PIId;
        }
        public function setPIId($PIId)
        {
            $this->_PIId = $PIId;
        }

        public function getPIIBAN()
        {
            return $this->_PIIBAN;
        }
        public function setPIIBAN($PIIBAN)
        {
            $this->_PIIBAN = $PIIBAN;
        }

        public function getPIBIC()
        {
            return $this->_PIBIC;
        }
        public function setPIBIC($PIBIC)
        {
            $this->_PIBIC = $PIBIC;
        }

        public function getPIHolderLastName()
        {
            return $this->_PIHolderLastName;
        }
        public function setPIHolderLastName($PIHolderLastName)
        {
            $this->_PIHolderLastName = $PIHolderLastName;
        }

        public function getPIHolderFirstName()
        {
            return $this->_PIHolderFirstName;
        }
        public function setPIHolderFirstName($PIHolderFirstName)
        {
            $this->_PIHolderFirstName = $PIHolderFirstName;
        }

        public function getPIBankName()
        {
            return $this->_PIBankName;
        }
        public function setPIBankName($PIBankName)
        {
            $this->_PIBankName = $PIBankName;
        }

        public function getSubscriber()
        {
            return $this->_subscriber;
        }
        public function setSubscriber(Subscriber $subscriber)
        {
            $this->_subscriber = $subscriber;
        }
    }