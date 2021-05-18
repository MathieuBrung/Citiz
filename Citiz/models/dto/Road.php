<?php

    final class Road extends StationVehicle
    {
        private $_roadId;
        private $_roadAdress;
        private $_roadSpacesNumber;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getRoadId()
        {
            return $this->_roadId;
        }
        public function setRoadId($roadId)
        {
            $this->_roadId = $roadId;
        }

        public function getRoadAdress()
        {
            return $this->_roadAdress;
        }
        public function setRoadAdress($roadAdress)
        {
            $this->_roadAdress = $roadAdress;
        }

        public function getRoadSpacesNumber()
        {
            return $this->_roadSpacesNumber;
        }
        public function setRoadSpacesNumber($roadSpacesNumber)
        {
            $this->_roadSpacesNumber = $roadSpacesNumber;
        }
    }