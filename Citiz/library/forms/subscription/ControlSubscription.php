<?php

    abstract class ControlSubscription
    {
        static function controlInscriptionName($inscriptionName)
        {
            $namesAllowed = array('Coopérative', 'Standard');

            if(in_array($inscriptionName, $namesAllowed))
            {
                return true;
            }
            return false;
        }

        static function controlFormulaChoice($formulaChoice)
        {
            $namesAllowed = array('Fréquence', 'Classique', 'Mini');

            if(in_array($formulaChoice, $namesAllowed))
            {
                return true;
            }
            return false;
        }

    }