<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;
class Auth extends Controller {
    public function login() {
       
        if ($this->request->getMethod() === 'POST') {
           
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            if ($username === 'admin' && $password === 'admin123') {
             
                session()->set('logged_in', true);
                return redirect()->to('/admin/services');
            } else {
                return view('admin/login', ['error' => 'Invalid credentials']);
            }
        }
        return view('admin/login');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
