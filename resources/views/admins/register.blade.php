
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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



      <?php 
        
      //  $title = 'title_'.session()->get('lang');
        $title = 'title_'.app()->getLocale();
      
      ?>



<div class="container">
  <h2>{{ trans('website.register') }}</h2>
  <form  action="{{ url('/Admins')  }}"   method="post"   enctype ="multipart/form-data">

    @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">{{ trans('website.name') }}</label>
    <input type="text"  name="name"   value="{{ old('name') }}" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">{{ trans('website.email') }}</label>
    <input type="email"   name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">{{ trans('website.password') }}</label>
    <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 


  <div class="form-group">
    <label for="exampleInputPassword1">{{ trans('website.role') }}</label>
    <select    name = "role_id"  class="form-control" >
    @foreach ($data as $val )
        <option value="{{ $val->id }}"> {{ $val->$title }} </option>
    @endforeach
    </select>   
  </div>

  


  
  <button type="submit" class="btn btn-primary">{{ trans('website.save') }}</button>
</form>
</div>

</body>
</html>