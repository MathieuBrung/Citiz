<?php
    require ('library/autoLoader.php');
    
    try
    {       
        
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }