<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters){
        $controller = class_basename(get_class($this));
        $action = $method;
        $permissions = $action . '-' . $controller;
        $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }


}
