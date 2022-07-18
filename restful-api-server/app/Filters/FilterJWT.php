<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Exception;

class FilterJWT implements FilterInterface
{
    use ResponseTrait;
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        //cek apakah di dalam request ada http_authorization yang dikirimkan
        $header = $request->getServer('HTTP_AUTHORIZATION');
        try {
            //panggil helper jwt yg telah dibuat
            helper('jwt');
            //cek apakah ada encodedToken
            $encodedToken = getJWT($header);
            //melakukan validasi JWT
            validateJWT($encodedToken);
            return $request;
        } catch (Exception $e) {
            //bila tidak sesuai atau error dan berikan respon error
            return Services::response()->setJSON([
                'error' => $e->getMessage(),
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
