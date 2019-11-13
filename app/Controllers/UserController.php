<?php
// Avalon Hosting Services
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
	protected $user = null;
	public function __construct()
	{
		$this->user = new User();
	}


	// Show a list of user
	public function index($page = "list")
	{
		if (!file_exists(APPPATH . "/Views/users/" . $page . ".php")) {
			throw new PageNotFoundException($page);
		}
		$data["users"] = $this->user->getUser();
		return view('users/' . $page, $data);
	}

	// Show a form For adding a user
	public function addUser()
	{
		if ($this->request->getMethod() != "post") {
			return view('users/add-user');
		}

		$validate = $this->validate([
			'name' => 'required|min_length[3]',
			'email' => 'required|valid_email',
			'phone' => 'required|min_length[11]|max_length[13]',
			'password' => 'required|min_length[6]',
			'photo' => 'uploaded[photo]', 'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[photo,4096]',
		]);
		if (!$validate) {
			return view('users/add-user', [
				'errors' => $this->validator->getErrors()
			]);
		}


		$photo = $this->request->getFile("photo");;
		$extension = $photo->getClientExtension();
		$name = "img_" . date("Ymd_his") . "." . $extension;
		$photo->move("upload/", $name);
		
		$request = [
			"name" => $this->request->getPost("name"),
			"email" => $this->request->getPost("email"),
			"phone" => $this->request->getPost("phone"),
			"password" => $this->request->getPost("password"),
			"photo" => "upload/" . $name,
		];

		$user = new User();
		$user->saveUserInfo($request);


		return view('/users/add-user');
	}

	//--------------------------------------------------------------------

}
