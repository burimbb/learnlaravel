<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    protected $statusCode = Response::HTTP_OK;

    /**
     * Get the value of statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Create new public function
     */
    public function respond($data, $headers = [])
    {
        return \response($data, $this->getStatusCode(), $headers);
    }

    /**
     * Create new public function
     */
    public function respondWithPaginator($models, $data)
    {
        $data = \array_merge($data, [
            'paginator' => [
                'total_count' => $models->total(),
                'total_pages' => ceil($models->total() / $models->perPage()),
                'current_page' => $models->currentPage(),
                'limit' => $models->perPage()
            ]
        ]);

        return $this->respond($data);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * Create new public function
     */
    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Create new public function
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Create new public function
     */
    public function respondCreated($message = 'Model created!')
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respond($message);
    }
}
