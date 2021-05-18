<?php

    class Booking
    {
        use Hydrate;

        private $_bookingId;
        private $_bookingDate;
        private $_bookingMileage;
        private $_bookingStartingDate;
        private $_bookingEndingDate;
        private $_bookingVehicleCondition;
        private $_bookingVehicleCleanliness;
        private $_bookingPrice;

        private Vehicle $_vehicle;
        private Subscriber $_subscriber;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getBookingId()
        {
            return $this->_bookingId;
        }
        public function setBookingId($bookingId)
        {
            $this->_bookingId = $bookingId;
        }

        public function getBookingDate()
        {
            return $this->_bookingDate;
        }
        public function setBookingDate($bookingDate)
        {
            $this->_bookingDate = $bookingDate;
        }

        public function getBookingMileage()
        {
            return $this->_bookingMileage;
        }
        public function setBookingMileage($bookingMileage)
        {
            $this->_bookingMileage = $bookingMileage;
        }

        public function getBookingStartingDate()
        {
            return $this->_bookingStartingDate;
        }
        public function setBookingStartingDate($bookingStartingDate)
        {
            $this->_bookingStartingDate = $bookingStartingDate;
        }

        public function getBookingEndingDate()
        {
            return $this->_bookingEndingDate;
        }
        public function setBookingEndingDate($bookingEndingDate)
        {
            $this->_bookingEndingDate = $bookingEndingDate;
        }

        public function getBookingVehicleCondition()
        {
            return $this->_bookingVehicleCondition;
        }
        public function setBookingVehicleCondition($bookingVehicleCondition)
        {
            $this->_bookingVehicleCondition = $bookingVehicleCondition;
        }

        public function getBookingVehicleCleanliness()
        {
            return $this->_bookingVehicleCleanliness;
        }
        public function setBookingVehicleCleanliness($bookingVehicleCleanliness)
        {
            $this->_bookingVehicleCleanliness = $bookingVehicleCleanliness;
        }

        public function getBookingPrice()
        {
            return $this->_bookingPrice;
        }
        public function setBookingPrice($bookingPrice)
        {
            $this->_bookingPrice = $bookingPrice;
        }

        public function getVehicle()
        {
            return $this->_vehicle;
        }
        public function setVehicle(Vehicle $vehicle)
        {
            $this->_vehicle = $vehicle;
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