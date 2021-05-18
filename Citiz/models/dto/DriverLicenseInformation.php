<?php

    class DriverLicenseInformation
    {
        use Hydrate;

        private $_DLINumber;
        private $_DLIObtainingPlace;
        private $_DLIObtainingDate;

        private Subscriber $_subscriber;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDLINumber()
        {
            return $this->_DLINumber;
        }
        public function setDLINumber($DLINumber)
        {
            $this->_DLINumber = $DLINumber;
        }

        public function getDLIObtainingPlace()
        {
            return $this->_DLIObtainingPlace;
        }
        public function setDLIObtainingPlace($DLIObtainingPlace)
        {
            $this->_DLIObtainingPlace = $DLIObtainingPlace;
        }

        public function getDLIObtainingDate()
        {
            return $this->_DLIObtainingDate;
        }
        public function setDLIObtainingDate($DLIObtainingDate)
        {
            $this->_DLIObtainingDate = $DLIObtainingDate;
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