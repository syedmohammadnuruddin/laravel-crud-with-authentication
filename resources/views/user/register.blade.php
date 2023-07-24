<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('error')
                    <h2>Register Here</h2>
                    <form class="" action="{{route('register.save')}}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Username" class="form-control"><br>
                        <input type="email" name="email" placeholder="Email" class="form-control"><br>
                        <input type="password" name="password" placeholder="Password" class="form-control"><br>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control"><br>
                        <input type="submit" value="Register Now" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </section>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
