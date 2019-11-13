<?php
// Avalon Hosting Services
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;
use SebastianBergmann\CodeCoverage\Report\Html\File;

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
		if ($this->request->getMethod() != "post") {
			return view('users/add-user');
		}

		// var_dump($this->request->getFile("photo"));
		$photo = $this->request->getFile("photo");;
		$extension = $photo->getClientExtension();
		$name = "img_" . date("Ymd_his") . "." . $extension;
		$photo->move(WRITEPATH . "upload/", $name);

		$validate = $this->validate([
			'name' => 'required|min_length[3]',
			'email' => 'required|valid_email',
			'phone' => 'required|min_length[11]|max_length[13]',
			'password' => 'required|min_length[6]',
			// 'photo' => 'uploaded[photo]|max_size[photo,1024]',
		]);
		if (!$validate) {
			return view('users/add-user', [
				'errors' => $this->validator->getErrors()
			]);
		}

		$request["name"] = $this->request->getPost("name");
		$request["email"] = $this->request->getPost("email");
		$request["phone"] = $this->request->getPost("phone");
		$request["password"] = $this->request->getPost("password");
		$request["photo"] = "upload/" . $name;

		$user = new User();
		$user->saveUserInfo($request);
	}

	//--------------------------------------------------------------------

}