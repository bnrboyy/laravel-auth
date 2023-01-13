<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Landing</title>


    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="container" style="margin-top: 30px;">
        <button class="btn btn-primary float-start " id="btn1" onclick="onClickAdmin()">Admin</button>
        <button class="btn btn-success float-start " id="btn2" onclick="onClickUser()">User</button>
        <button class="btn btn-warning float-end " id="btn3" onclick="onLogout()">Logout</button>
    </div>
    
    <section class="section">
        <h1>This is Landing Page</h1>
        <div class="box-container">
            {{-- @dd(Auth::user()->name) --}}

            @if(Auth::user()->name == "admin") 
            <div class="admin">
                <h1>Admin data </h1>
            </div> 
            @endif
            
            @if(Auth::user()->name == "user" || Auth::user()->name == "admin") 
            <div>
                <h1>User data</h1>
            </div>
            @endif

        </div>
    </section>
      
   <script src="./js/landing.js"></script>
</body>
</html>