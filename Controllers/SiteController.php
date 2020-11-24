<?php

namespace App\Controllers;

use App\core\Request;
use App\Core\Response;
use App\core\Controller;
use App\Core\Application;
use App\Models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks form contacting us.');
                return $response->redirect('/contact');
            }
        }
        $params = [
            'name' => 'shakil hossain',
            'model' => $contact
        ];

        return $this->render('contact', $params);
    }
}
