<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdooController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.auth');
    }
    
    public function index() {
		$version = "0";
		$userId = "0";
		$odoo = new \Obuchmann\LaravelOdooApi\Odoo();
		$odoo = $odoo
            ->username('')
            ->password('')
            ->db('')
            ->host('')
            ->connect();
		
		$version = $odoo->version();
		/*$odoo = $odoo->connect();*/
		$userId = $odoo->getUid();
		$can = $odoo->can('read', 'res.partner');//'ir.model', 'hr.department'
		$department = $odoo
    ->model('hr.employee')
    ->get();
		return view('odoo.welcome', ['version' => $version, 'userId' => $userId, 'department' => $department]);
	}
}
