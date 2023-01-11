<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Landing</title>


    <style>
        .container {
            /* border: 1px solid red; */
        }

        #btn2 {
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <div class="container" style="margin-top: 30px;">
        <button class="btn btn-primary float-start " id="btn1">Admin</button>
        <button class="btn btn-success float-start " id="btn2">User</button>
        <button class="btn btn-warning float-end " id="btn3" onclick="onLogout()">Logout</button>
    </div>
    
    <section>

    </section>



    <script>
        async function onLogout() {
            const response = await axios({
                url: 'api/auth/logout',
                method: 'GET',
            })

            if(response.data.message == "ok") {
                // console.log('yes')
                alert("Logout success")
                location.href = "/"
            } else {
                alert("Error")
                location.reload()
            }
        }
    </script>
</body>
</html>