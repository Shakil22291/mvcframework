<?php

namespace App\Controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;

class
SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function contact()
    {
        $params = ['name' => 'shakil hossain'];

        return $this->render('contact', $params);
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        die(var_dump($body));
    }
}
