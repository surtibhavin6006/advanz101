<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class BaseApiController
 * @package App\Http\Controllers\Api
 */
class BaseApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @var int
     */
    protected $default_per_page = 20;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'       => $message,
                //'status_code'   => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function adminOrApiMiddleware(Request $request){

        if($request->input('api_token') != null)
            return ['auth:api', 'UserIsActive'];
        return ['web','checkAdminLogin'];
    }


    /**
     * @param Request $request
     * @return array
     */
    public function shareAuthUser(Request $request)
    {
        if($request->input('api_token') != null)
            return ['auth:api', 'UserIsActive'];
        return ['web'];
    }

    /**
     * @param $per_page
     * @return int
     */
    public function perPage($per_page)
    {
        $per_page_intval = intval($per_page);
        if($per_page_intval > 0){
            return $per_page_intval;
        }
        return $this->default_per_page;
    }
}
