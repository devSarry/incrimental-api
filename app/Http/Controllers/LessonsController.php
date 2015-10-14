<?php

namespace App\Http\Controllers;

use ACME\Transformers\LessonsTransformer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LessonsController extends ApiController {


    /**
     * @var \ACME\Transformers\LessonsTransformer;
     */
    protected $lessonsTransformer;

    /**
     * LessonsController constructor.
     * @param LessonsTransformer $lessonsTransformer
     */
    public function __construct(LessonsTransformer $lessonsTransformer)
    {
        $this->middleware('jwt.auth', ['only' => 'store']);
        $this->lessonsTransformer = $lessonsTransformer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This is not a really good way to do this.
        //the main reason is that we aren't molding our data to be
        //more specific to the use case. Its just a dump of our database.
        //with very little other info.

        //1. All is bad
        //2. No way to attach meta data.
        //3. Linking db structure to the API output (things like password fields would be shown)
        //4. No way to signal headers/response codes.


        //Added eager loading of the authors from the users table.
        $lessons = Lesson::with('author')->get();

        return $this->respond([
            'data' => $this->lessonsTransformer->transformCollection($lessons->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  Auth::user();

        if( !$request->get('title') || ! $request->get('body')) {
            return $this->respondFailedValidation('Parameters failed validation for a lesson');
        }

        $lesson =  $user->lessons()->create($request->all());

        return $this->respondCreated($lesson, 'Lesson created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        /*Preforming a check to see if id exists in db.*/
        if ( ! $lesson)
        {
            return $this->respondNotFound('Lesson not found');
        }

        /*If check doesn't fail we send out the data*/

        return $this->respond([
            'data' => $this->lessonsTransformer->transform($lesson->with('author')->first())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
