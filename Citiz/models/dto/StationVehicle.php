<?php

    abstract class StationVehicle
    {
        use Hydrate;

        protected $_SVId;
        protected $_SVCity;
        protected $_SVPlace;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getSVId()
        {
            return $this->_SVId;
        }
        public function setSVId($SVId)
        {
            $this->_SVId = $SVId;
        }

        public function getSVCity()
        {
            return $this->_SVCity;
        }
        public function setSVCity($SVCity)
        {
            $this->_SVCity = $SVCity;
        }

        public function getSVPlace()
        {
            return $this->_SVPlace;
        }
        public function setSVPlace($SVPlace)
        {
            $this->_SVPlace = $SVPlace;
        }
    }