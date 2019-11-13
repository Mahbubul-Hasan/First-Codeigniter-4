<?php
// Avalon Hosting Serveices
namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		return view('user/list');
	}

	//--------------------------------------------------------------------

}