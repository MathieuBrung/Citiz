<?php

    class Distance
    {
        use Hydrate;

        private $_distanceName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDistanceName()
        {
            return $this->_distanceName;
        }
        public function setDistanceName($distanceName)
        {
            $this->_distanceName = $distanceName;
        }
    }