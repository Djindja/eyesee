<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Request;
use Response;
use Exception;
use App\Models\Result;

class ResultController extends Controller
{

    public function index()
    {
      return View::make('result.index');
    }

      /**
     * Display a listing of resource
     *
     * @return Response
     */
    public function getAll()
    {
        try {
            $results = Result::get();
        } catch (Exception $e) {
            $results = [
                'error' => $e->getMessage()
            ];
        }

        return response()->json($results);
    }

    /**
     * Store a newly created resource(result)
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $result = new Result();

        $result->hit = Request::get('hit');
        $result->miss = Request::get('miss');
        $result->difficulty = Request::get('difficulty');
        $result->user_id = Auth::user()->id;
        $result->user_name = Auth::user()->name;

        try {
            $result->save();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];

            return response()->json($result, $result['status']);
        }

        return response()->json($result);
    }

}