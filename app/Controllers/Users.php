<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users', [
            'users' => $this->userModel->findAll(),
        ]);
    }

    public function new()
    {
        return view('users_new');
    }

    public function create()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[50]|is_unique[users.username]',
            ],
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|max_length[255]',
            ],
            'password_confirm' => [
                'label' => 'Confirm password',
                'rules' => 'required|matches[password]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->userModel->insert([
            'username' => trim(
                (string) $this->request->getPost('username')
            ),
            'full_name' => trim(
                (string) $this->request->getPost('full_name')
            ),
            'password' => password_hash(
                (string) $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/users')
            ->with('success', 'User account created successfully.');
    }

    public function edit(int $id)
    {
        $user = $this->userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound(
                'User account not found.'
            );
        }

        return view('users_edit', [
            'user' => $user,
        ]);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound(
                'User account not found.'
            );
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            ],
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
        ];

        $avatar = $this->request->getFile('avatar');

        $hasAvatar = $avatar !== null
            && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasAvatar) {
            $rules['avatar'] = [
                'label' => 'Profile picture',
                'rules' => [
                    'uploaded[avatar]',
                    'max_size[avatar,2048]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => trim(
                (string) $this->request->getPost('username')
            ),
            'full_name' => trim(
                (string) $this->request->getPost('full_name')
            ),
        ];

        if ($hasAvatar && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadPath = FCPATH
                . 'uploads'
                . DIRECTORY_SEPARATOR
                . 'avatars';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $newName = $avatar->getRandomName();

            $destination = $uploadPath
                . DIRECTORY_SEPARATOR
                . $newName;

            service('image')
                ->withFile($avatar->getTempName())
                ->fit(300, 300, 'center')
                ->save($destination);

            if (! empty($user['avatar'])) {
                $oldAvatar = $uploadPath
                    . DIRECTORY_SEPARATOR
                    . basename($user['avatar']);

                if (is_file($oldAvatar)) {
                    unlink($oldAvatar);
                }
            }

            $data['avatar'] = $newName;
        }

        $this->userModel->update($id, $data);

        return redirect()
            ->to('/users')
            ->with('success', 'User account updated successfully.');
    }
}