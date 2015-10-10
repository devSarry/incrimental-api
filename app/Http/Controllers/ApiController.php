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
class ApiController extends Controller {

    /*Our Api Controller needs some way to set the status code.*/
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
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }


}