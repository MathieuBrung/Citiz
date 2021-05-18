<?php

    class Document
    {
        use Hydrate;

        private $_documentDirectoryPath;
        private $_documentDriverLicense;
        private $_documentBankDetails;
        private $_documentProofOfAdress;
        private $_documentInsuranceSituation;
        private $_documentGuaranteeDeposit;

        // Object Abonné
        private Subscriber $_subscriber;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDocumentDirectoryPath()
        {
            return $this->_documentDirectoryPath;
        }
        public function setDocumentDirectoryPath($documentDirectoryPath)
        {
            $this->_documentDirectoryPath = $documentDirectoryPath;
        }

        public function getDocumentDriverLicense()
        {
            return $this->_documentDriverLicense;
        }
        public function setDocumentDriverLicense($documentDriverLicense)
        {
            $this->_documentDriverLicense = $documentDriverLicense;
        }

        public function getDocumentBankDetails()
        {
            return $this->_documentBankDetails;
        }
        public function setDocumentBankDetails($documentBankDetails)
        {
            $this->_documentBankDetails = $documentBankDetails;
        }

        public function getDocumentProofOfAdress()
        {
            return $this->_documentProofOfAdress;
        }
        public function setDocumentProofOfAdress($documentProofOfAdress)
        {
            $this->_documentProofOfAdress = $documentProofOfAdress;
        }

        public function getDocumentInsuranceSituation()
        {
            return $this->_documentInsuranceSituation;
        }
        public function setDocumentInsuranceSituation($documentInsuranceSituation)
        {
            $this->_documentInsuranceSituation = $documentInsuranceSituation;
        }

        public function getDocumentGuaranteeDeposit()
        {
            return $this->_documentGuaranteeDeposit;
        }
        public function setDocumentGuaranteeDeposit($documentGuaranteeDeposit)
        {
            $this->_documentGuaranteeDeposit = $documentGuaranteeDeposit;
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