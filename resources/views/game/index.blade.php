@extends("includes.master")

@section('title', 'Game')

@section('content')

<div class="col-xs-12">
  <div class="x_panel">
    <button style="float: right;" class="btn btn-primary btn-lg" onClick="window.open('{{url("game/create")}}', '_self');">+ Add New Game</button>
    <div class="x_title">
      <h2 style="margin-top: 30px">List of all games</h2>
      </br>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th style="text-align: left; width: 5%;">#</th>
            <th style="text-align: left; width: 20%;">Game Name</th>
            <th style="text-align: left; width: 20%;">Difficulty</th>
            <th style="text-align: left; width: 20%;">Play Game on this Link</th>
            <th style="text-align: center; width: 5%;">Edit Game</th>
            <th style="text-align: center; width: 5%;">Delete Game</th>
          </tr>
        </thead>
        <tbody>
          @foreach($games as $index => $game)
          <tr>
          <th style="text-align: left; width: 5%;" scope="row">{{$index+1}}</th>
            <td style="text-align: left; width: 30%;">{{$game->name}}</td>
            <td style="text-align: left; width: 30%;">{{$game->difficulty}}</td>
            <td style="text-align: left; width: 30%;"><a href="{{url("new-game/$game->id")}}">Play</a></td>
            <td style="text-align: center; width: 5%;"><a href="{{url("game/edit/$game->id")}}">Edit</a></td>
            <td style="text-align: center; width: 5%;"><a onclick="return (confirm('Are you sure?'))" href="{{url("game/delete/$game->id")}}">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <button style="margin-top: 30px;" class="btn btn-primary btn-lg" onClick="window.open('{{url("dashboard/")}}', '_self');">Go to Dashboard</button>
  </div>
</div>
@endsection