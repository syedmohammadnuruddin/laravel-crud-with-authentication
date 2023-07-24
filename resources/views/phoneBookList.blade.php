<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>phonebook</title>
</head>
<body>
    <section>
        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">Navbar</a>
                    <div class="d-flex">
                        <a href="{{route('logout')}}">{{Auth::user()->name }}(logout)</a>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <li class="alert alert-success">{{session('success')}}</li>
                    @endif
                    @include('error')
                    <h2>Add Contact</h2>
                    <form action="{{route('createContact')}}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="form-control"><br>
                        <input type="email" name="email" placeholder="Email" class="form-control"><br>
                        <input type="text" name="contact" placeholder="Contact Number" class="form-control"><br>
                        <input type="submit" class="btn btn-primary" value="Add Contact">
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-dark table-striped">
                        <thead>

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Number</th>
                            <th scope="col">Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($contacts as $key => $contact)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->contact}}</td>
                            <td>
                                <a href="{{route('showEdit',$contact->id)}}">Update</a>
                                <a onclick="return confirm('Are you sure?')" href="{{route('deleteContact',$contact->id)}}">Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
