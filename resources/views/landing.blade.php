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
            width: 100%;
            height: 300px;
            border: 1px solid red;
        }     
        #btn2 {
            margin-left: 10px;
        }
        .section  {
            width: 100%;
            height: 300px;
            border: 1px solid red;
            margin-top: 5rem;
            
        }       
        .section h1 {
            text-align: center;
        }       
        .section .box-container {
            display: flex;
            align-content: center;
            justify-content: center;
            
        }
        .section .box-container .box-admin {
            width: 50%;
            /* height: 100%; */
            border: 1px solid red;
        }
        .section .box-container .box-user {
            width: 50%;
            /* height: 90%; */
            border: 1px solid red;
        }
    </style>
</head>
<body>

    <div class="container" style="margin-top: 30px;">
        <button class="btn btn-primary float-start " id="btn1" onclick="oneClickBtn()">Admin</button>
        <button class="btn btn-success float-start " id="btn2" onclick="oneClickBtn()">User</button>
        <button class="btn btn-warning float-end " id="btn3" onclick="onLogout()">Logout</button>
    </div>
    
    <section class="section">
        <h1>This is Landing Page</h1>
        <div class="box-container">
            @if(Auth::user()->id == '1') 

            <div class="admin">
                admin
            </div> 
            @endif
            
            @if(Auth::user()->id == '1' || Auth::user()->id == '2') 
            <div>
                user
            </div>
            @endif

        </div>
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
                location.href = "/login"
            } else {
                alert("Error")
                location.reload()
            }
        }

        function onClick() {
            const data = document.querySelector('.box-container')
            let html = `<h1>This is content</h1>`
            data.insertAdjacentHTML('afterbegin', html)
        }

        function oneClickBtn() {
            // (A) DISABLE THE BUTTON
            let adminBtn = document.getElementById("btn1");
            let userBtn = document.getElementById("btn2");

            if(adminBtn.disabled == false ) {
                adminBtn.disabled = true
                userBtn.disabled = false
            } else {
                adminBtn.disabled = false
                userBtn.disabled = true
                // userBtn.disabled == true
            }

          

            // if(userBtn.disabled == false) {
            //     userBtn.disabled == true
            // } else {
            //     adminBtn.disabled == false
                
            // }
                

            // (B) DO YOUR PROCESSING HERE
          

            // (C) RE-ENABLE AFTER PROCESSING IF YOU WANT
            // document.getElementById("myButton").disabled = false;
        }       
       
        </script>
</body>
</html>