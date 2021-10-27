

<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>
            

            {{ 'Welcome :  '.auth('admin')->user()->name }}

            <br>

            {{ session()->get('Message') }}


             <br>
             <a href='{{ url('Admins/LogOut') }}' class='btn btn-primary m-r-1em'>LogOut</a>


            <!-- <a href="logout.php"></a> -->



        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>action</th>
            </tr>


   @foreach ($data as $raw )
       
   <tr>
       <td>{{ $raw->id }}</td>
       <td>{{ $raw->name }}</td>
       <td>{{ $raw->email }}</td>
       <td>{{ $raw->title }}</td>

       <td>

        <a href='' data-toggle="modal" data-target="#modal_single_del{{ $raw->id }}"  class='btn btn-danger m-r-1em'>Delete</a>

        <a href='{{ url('/Admins/'.$raw->id.'/edit') }}' class='btn btn-primary m-r-1em'>Edit</a>

    </td>    
   </tr>




        
   <div class="modal" id="modal_single_del{{ $raw->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">delete confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
           </button>
            </div>
   
            <div class="modal-body">
                    Delete  {{ $raw->name }} !!!!
            </div>
            <div class="modal-footer">
                <form action="{{ url('/Admins/'.$raw->id) }}" method="post">
                    
                    {{-- <input type="hidden"  name="_method" value="delete"> --}}
                 
                    @method('delete')
                 
                    @csrf

                    <div class="not-empty-record">
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>





   @endforeach
   

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>








