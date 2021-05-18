<?php

	abstract class Dispatcher{

		static function dispatch($controllerName)
		{
			$require = "controllers/controller" . ucfirst($controllerName) . ".php";
			return $require ;
		}

		static function dispatchWithSubfolder($subfolder, $controllerName)
		{
			$require = "controllers/" . $subfolder . "/controller" . ucfirst($controllerName) . ".php";
			return $require ;
		}

	}

