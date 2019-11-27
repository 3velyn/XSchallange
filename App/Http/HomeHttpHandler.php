<?php

namespace App\Http;


class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        $this->render("home/index");
    }
}