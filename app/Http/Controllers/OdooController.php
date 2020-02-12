<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdooController extends Controller
{
    public function index() {
		$version = "0";
		$userId = "0";
		$odoo = new \Obuchmann\LaravelOdooApi\Odoo();
		$odoo = $odoo
            ->username('admin')
            ->password('admin')
            ->db('demo5')
            ->host('https://demo5.odoo.com')
            ->connect();
		
		/*$version = $odoo->version();
		$odoo = $odoo->connect();
		$userId = $this->odoo->getUid();*/
		return view('odoo.welcome', ['version' => $version, 'userId' => $userId]);
	}
}
