<?php
// Avalon Hosting Services
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
	// Show a list of user
	public function index($page = "list")
	{
		if (!file_exists(APPPATH . "/Views/users/" . $page . ".php")) {
			throw new PageNotFoundException($page);
		}
		return view('users/' . $page);
	}

	// Show a form For adding a user
	public function addUser()
	{
		return view('users/add-user');
	}

	//--------------------------------------------------------------------

}