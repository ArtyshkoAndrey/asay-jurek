<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
  public function index(): Response
  {
    return Inertia::render('Users/Index', []);
  }

  public function about(): Response
  {
    return Inertia::render('Users/About', []);
  }

  public function receiving ()
  {
    return Inertia::render('Users/Receiving', []);
  }
}