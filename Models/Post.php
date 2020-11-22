<?php


namespace App\Models;


use App\core\Session;

class Post
{
    /**
     * @var Session
     */
    private Session $session;

    protected function __construct(Session $session)
    {
        $this->session = $session;
    }
}