<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use Response;
use Exception;
use App\Models\Result;

class ResultController extends Controller
{

      /**
     * Display a listing of resource
     *
     * @return Response
     */
    public function index()
    {
        try {
            $result = Result::get();
        } catch (Exception $e) {
            $result = [
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
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
        $result->user_id = Auth::id();

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