<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
class QuenasController extends BaseApiController
{

    public function __construct(Request $request)
    {
        $this->middleware(['cors']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question = Question::orderBy('id','DESC')->first();

        return $this->respond([
            'data'  => json_decode($question['questionanswer'])
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validation_rules = [
            'questionanswer'    => 'required'
        ];

        $this->validation_messages = [
            'questionanswer.required' => "questionanswer , pass json as questionanswer",
        ];
        
        $validator = \Validator::make($request->all(),$this->validation_rules,$this->validation_messages);

        if ($validator->fails()) {
            return $this->respondWithError($validator->messages());
        }

        $question = (new Question);

        $question->questionanswer = $request->input('questionanswer');

        if($question->save()){
            return $this->respond([
                'data'  => $question
            ]);
        } else {
            return $this->respondWithError('Something went wrong while saving question answer');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}