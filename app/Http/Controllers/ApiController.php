<?php
/**
 * Created by PhpStorm.
 * User: Euler
 * Date: 10/10/2015
 * Time: 3:38 PM
 */

namespace App\Http\Controllers;

/*This class extends our base controller which is being extended by our LessonsController
        LessonsController->ApiController->Controller->BaseController*/
use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

    /*Our Api Controller needs some way to set the status code.*/
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
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

    /*We want to make this a bit more flexible so that we wouldnt have to duplicate the code above for
    every type of error. What we really want to do is somethign like
             $this->setStatusCode(404)->respondWithError('not found')*/


    /*first we need to extract the Response part*/
    /**
     * @param $data
     * @param array $header
     * @return mixed
     */
    public function respond($data, $header = [])
    {
        return Response::json($data, $this->getStatusCode(), $header);
    }

    /*Now whenever we start building our error message it will be stored in this errors array*/
    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


}