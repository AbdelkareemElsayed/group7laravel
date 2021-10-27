
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



      {{  session()->get('Message')  }}  





<div class="container">
  <h2>Update Data</h2>
  <form  action="{{ url('/Admins/'.$admin[0]->id)  }}"   method="post"   enctype ="multipart/form-data">

    @csrf
    @method('put')

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"   value="{{ $admin[0]->name }}" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"   name="email" value="{{ $admin[0]->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
    <select    name = "role_id"  class="form-control" >
    @foreach ($roles as $val )
        <option value="{{ $val->id }}" @if($val->id == $admin[0]->role_id) {{ "selected" }} @endif > {{ $val->title }} </option>
    @endforeach
    </select>   
  </div>

  


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>