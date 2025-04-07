<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            $allowedPages = ['home/login', 'home/aksi_login', 'home/absensi'];
            if (!in_array(uri_string(), $allowedPages)) {
                return redirect()->to('home/login');
            }
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu tindakan setelah request
    }
}
