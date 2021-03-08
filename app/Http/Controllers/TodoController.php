<?php

namespace App\Http\Controllers;

use App\Todo;

use App\Repositories\Rest\RestRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * @var RestRepository
     */
    private $rest;

    public function __construct(Todo $model) {
        $this->rest = new RestRepository($model);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $response = $this->rest->all();
        return $this->response(
            "Todos Successfully Fetched.",
            $response,
            Response::HTTP_OK
        );
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TodoRequest $request)
    {
        //
        $data = $request->all();
        $response = $this->rest->getModel()->create($data);
        return $this->response(
            "Successfully Added.",
            $response,
            Response::HTTP_OK
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TodoRequest $request, $id)
    {
        //
        $data = $request->all();
        $response = $this->rest->update($data, $id);
        return $this->response(
            "Successfully Updated.",
            $response,
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $this->rest->delete($id);
        return $this->response(
            "Successfully Deleted.",
            '',
            Response::HTTP_OK
        );
    }
}
