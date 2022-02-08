<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.inc.admincss')
</head>
<body>
    @include('admin.inc.navbar')
   
    <h1 class=" p-3 border display-4">  All Users  </h1>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
              
                @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$row->name}}</td>
                           <td>{{$row->email}}</td>
                           <td>
                                 @if ($row->usertype=="0")
                                 <form method="POST" action="{{url('User/'.$row->id)}}"> 
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></button>
                                </form>
                                @else
                                <a type="submit" class="btn btn-warning">Not Allow <i class="fas fa-ban"></i></a>
                                @endif
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