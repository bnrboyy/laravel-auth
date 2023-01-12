<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>

    <style>
        .container {
            /* border: 1px solid red; */
            margin-top: 100px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

    
    <div class="container" style="width: 30%;">
        <h1>Register </h1>
        <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email :</label>
              <input type="email" id="email" class="form-control" />
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password :</label>
              <input type="password" id="password" class="form-control" />
            </div>
        
            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4" onclick="onRegister()">Register</button>
              
            <a href="/login"><button type="button" class="btn btn-outline-primary btn-block mb-4">Login</button></a>
          
          </form>
    </div>

    








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function onRegister() {
            let data = {
                email: document.querySelector("#email").value,
                password: document.querySelector("#password").value,
            }
            axios({
                url: 'api/auth/register',
                method: 'POST',
                headers: {
                    'Content-type': 'Application/json',
                    // 'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                data: data
            }).then(() => {
                alert('Created !!!')
                location.href = "/login"
            }).catch(error => {
                alert('Error')
            })
        
        }
    </script>
</body>
</html>