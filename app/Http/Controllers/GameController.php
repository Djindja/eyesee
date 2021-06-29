<?php

namespace App\Http\Controllers;

use Auth;
use URL;
use View;
use Request;
use Response;
use Validator;
use App\Models\Game;

class GameController extends Controller
{
    /**
   * Index page for games
   * @return View
   */
    public function index()
    {
      return View::make('game.index')->with('games', Game::all());
    }
    /**
     * Page for creating new game
     * @return View
     */
    public function create()
    {
        return View::make('game.create');
    }
    /**
     * Method for handling game creation
     * @return  Redirect
     */
    public function postCreate()
    {
        $validator = Validator::make(Request::all(), [
          "name" => "required|min:2",
          "difficulty" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/game/create")->withErrors($validator->errors())
                                                     ->withInput();
        }

        $game = new Game();

        $game->name = Request::get('name');
        $game->user_id = Auth::id();
        $game->difficulty = Request::get('difficulty');

        if ($game->save()) {
            return redirect("/game/edit/$game->id")->with('successfulMessages', 'You successfully added new game!');
        } else {
            return redirect("/game/create")->withErrors('Something went wrong!');
        }
    }
    /**
     * [edit description]
     * @param  int $id
     * @return mixed   If game is null, Response is returned else View is returned
     */
    public function edit(int $id)
    {
        $game = Game::find($id);

        if (is_null($game)) {
            return redirect("/game");
        }

        return View::make('game.edit')->with('games', $game);
    }
    /**
     * Editing games information
     * @param  int $id
     * @return Response edit Users name or get an error
     */
      public function postEdit(int $id)
      {
            $validator = Validator::make(Request::all(), [
              "name" => "required|min:2",
              "difficulty" => "required",
            ]);

        if ($validator->fails()) {
            return redirect("/game/edit/$id")->withErrors($validator->errors())
                                                       ->withInput();
        }

          $game = Game::find($id);

          $game->name = Request::get('name');
          $game->difficulty = Request::get('difficulty');

          if ($game->save()) {
              return redirect("/game/edit/$game->id")->with('successfulMessages', 'You successfully added new game!');
          } else {
              return redirect("/game/edit/$game->id")->withErrors('Something went wrong!');
          }
      }
    /**
     * Delete game
     * @param  int $id
     * @return Response Remove User or get an error
     */
    public function delete(int $id)
    {
        $game = GAme::find($id);

        if ($game->delete()) {
            return redirect("/game");
        } else {
            return redirect("/game")->withErrors('Something went wrong!');
        }
    }

    public function play(int $id)
    {
        $game = Game::find($id);

        if (is_null($game)) {
            return redirect("/game");
        }

        return View::make('play.index')->with('games', $game);
    }

    public function getGame(int $id)
    {
        $game = Game::find($id);

        if (is_null($game)) {
            return redirect("/game");
        }

        return response()->json($game->difficulty);
    }
}