<?php

Route::get('/', function () {
  return \Inertia\Inertia::render('Admins/Index');
});