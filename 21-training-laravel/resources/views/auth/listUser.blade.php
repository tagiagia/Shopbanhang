@extends('auth\layout')
@section ('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>Danh sach User</h3>
                    </div>

                    <div class="col-3">
                        <a href="http://"></a>
                    </div>

                    <div class="col-3">
                        <a href=""></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Hinh anh</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $us )
                        <tr>                      
                            <td>{{$us->name}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->phone}}</td>
                            <td><img src="/upload/{{$us->file}}" alt="" width = "50"></td>
                            <td>{{$us->password}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection