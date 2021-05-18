<?php

    final class Parking extends StationVehicle
    {
        private $_parkingId;
        private $_parkingAdress; //ATTRIBUTS A CHANGER
        private $_parkingSpacesNumber; //ATTRIBUTS A CHANGER

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getParkingId()
        {
            return $this->_parkingId;
        }
        public function setParkingId($parkingId)
        {
            $this->_parkingId = $parkingId;
        }

        public function getParkingAdress()
        {
            return $this->_parkingAdress;
        }
        public function setParkingAdress($parkingAdress)
        {
            $this->_parkingAdress = $parkingAdress;
        }

        public function getParkingSpacesNumber()
        {
            return $this->_parkingSpacesNumber;
        }
        public function setParkingSpacesNumber($parkingSpacesNumber)
        {
            $this->_parkingSpacesNumber = $parkingSpacesNumber;
        }
    }