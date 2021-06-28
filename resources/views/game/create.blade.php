@extends("includes.master")

@section('title', 'Create New Game')

@section('content')

<form class="form-horizontal" method="POST" action="{{url("/game/create")}}">
  {{csrf_field()}}

 <div class="x_content">
     <h2>Create New Game</h2>
 </br>
  <div class="form-group">
    <label class="col-md-1">Game Name<span class="required"> *</span>
    </label>
   <div class="col-md-4">
      <input name="name" class="form-control col-md-4 form-group" required="required" type="text" value="{{old('name')}}">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-1">Difficulty<span class="required"> *</span>
    </label>

    <div class="col-md-4">
        <select class="form-control" name="difficulty">
            <option value="">Select game type</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
    </div>
  </div>

  <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-md col-md-6">Submit</button>
  </div>
 </div>
</form>

<div class="col-md-2">
    <button style="margin-top: 30px;" class="btn btn-primary btn-lg" onClick="window.open('{{url("game")}}', '_self');">Back to Home Page</button>
</div>

@endsection