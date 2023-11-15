<html>
    <head>
        <title>
            Update Profile
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src=”https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js” integrity=”sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1″ crossorigin=”anonymous”></script>
        <script src=”https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js” integrity=”sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM” crossorigin=”anonymous”></script>
    </head>
    <body style="font-family: Arial; background-color: rgb(240 249 255);">
        <div class="content" >
            <div class="row">
                <div class="col-xl-3"> </div>
                <div class="col-xl-6 mt-5">
                    <div class="d-flex justify-content-center mt-5 pt-5"><h1 style="font-weight: bold;">Update Profile</h1></div>
                    <form action="" method="POST">
                        <div class="ml-5 mr-5 mt-5">
                            <label for="old_username">Old Username</label><br>
                            <input required type="username" name="input" id="old_username" placeholder="Masukkan Username lama anda" class="rounded" style="width:100%; height: 10%;">
                        </div>
                        <div class="ml-5 mr-5 mt-4">
                            <label for="new_username">New Username</label><br>
                            <input required type="username" name="input" id="new_username" placeholder="Masukkan Username baru anda" class="rounded" style="width:100%; height: 10%;">
                        </div>
                        <div class="ml-5 mr-5 mt-4">
                            <label for="pass">Password</label><br>
                            <input required type="password" name="input" id="pass" placeholder="Password anda" class="rounded" style="width:100%; height: 10%;">
                        </div>
                        <div class="ml-5 mr-5 mt-5 d-flex justify-content-center">
                            <button type="submit"  style="width: 40%; height:10%; padding: 1%; 	background-color: rgb(3 105 161); color:white; border-color: rgb(7 89 133);border-radius:4px;">Update</button>
                        </div>
                    </form>

                </div>
                <div class="col-xl-3"> </div>
            </div>

        </div>
    </body>
</html>
