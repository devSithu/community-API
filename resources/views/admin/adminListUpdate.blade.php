<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Admin Account List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Update Admin Account</h2>
  <form action="{{url('update/'.$data->user_id)}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      {{ Form::text('name', $data->name, ['class' => 'form-control', 'name' => 'name', 'required' => true, 'placeholder' => 'Enter Name']) }}
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      {{ Form::text('email', $data->email, ['class' => 'form-control', 'name' => 'email', 'required' => true, 'placeholder' => 'Enter Email']) }}
    </div>
    <a href="{{url('adminList')}}"><button class="btn btn-warning">Back</button></a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
