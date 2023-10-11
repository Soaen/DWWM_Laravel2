<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home(){
        return "Ceci est la page d'accueil";
    }

    public function newPost(){
        return "Création d'un nouveau billet de blog";
    }

    public function deletePost(){
        return "Suppression d'un billet de blog";
    }
}
