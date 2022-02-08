<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.inc.admincss')
</head>
<body>
    @include('admin.inc.navbar')
   
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- @include('inc.success') --}}
                @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> phone</th>
                    <th scope="col"> message</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$row->name}}</td>
                           <td>{{$row->email}}</td>
                           <td>{{$row->phone}}</td>
                           <td>{{$row->message}}</td>
                           <td>
                                 
                           <a href="{{url('deleteCon',$row->id)}}" type="submit" class="btn btn-danger">Delete <i class="fas fa-user-minus"></i></a>
                            
                            </td>
                            
                        </tr>
        
                    @endforeach
                </tbody>
                </table>
    
               
            </div>
        </div>
    </div>
    @include('admin.inc.adminjs')
</body>
</html>