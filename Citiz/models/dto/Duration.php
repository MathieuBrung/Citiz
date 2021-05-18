<?php

    class Duration
    {
        use Hydrate;

        private $_durationName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getDurationName()
        {
            return $this->_durationName;
        }
        public function setDurationName($durationName)
        {
            $this->_durationName = $durationName;
        }
    }