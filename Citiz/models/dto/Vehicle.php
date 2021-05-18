<?php

    class Vehicle extends VehicleCategory
    {
        use Hydrate;

        private $_vehicleId;
        private $_vehicleRegistration;
        private $_vehicleMileage;

        private $_VSName;
        private $_SVId;
        
        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getVehicleId()
        {
            return $this->_vehicleId;
        }
        public function setVehicleId($vehicleId)
        {
            $this->_vehicleId = $vehicleId;
        }

        public function getVehicleRegistration()
        {
            return $this->_vehicleRegistration;
        }
        public function setVehicleRegistration($vehicleRegistration)
        {
            $this->_vehicleRegistration = $vehicleRegistration;
        }

        public function getVehicleMileage()
        {
            return $this->_vehicleMileage;
        }
        public function setVehicleMileage($vehicleMileage)
        {
            $this->_vehicleMileage = $vehicleMileage;
        }

        public function getVSName()
        {
            return $this->_VSName;
        }
        public function setVSName($VSName)
        {
            $this->_VSName = $VSName;
        }
        
        public function getSVId()
        {
            return $this->_SVId;
        }
        public function setSVId($SVId)
        {
            $this->_SVId = $SVId;
        }

    }