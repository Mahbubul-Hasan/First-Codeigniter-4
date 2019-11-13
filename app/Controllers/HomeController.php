<?php
// Avalon Hosting Serveices
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class HomeController extends BaseController
{
	// Show a list of user
	public function index($page = "list")
	{
		if (!file_exists(APPPATH . "/Views/users/" . $page . ".php")) {
			throw new PageNotFoundException($page);
		}
		return view('users/' . $page);
	}

	//--------------------------------------------------------------------

}