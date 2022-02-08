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
    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
        <a class="btn btn-success btn-lg" href="{{url('/foodMenu')}}" role="button">Add New Menu </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Menus  </h1>
    <div class="container-fluid">
        @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
        <div class="row">
          @foreach ($data as $row)
             <div class="col-sm-3">
                <div class="card m-3" style="">
                    <img src="{{ asset('/foodimage/'.$row->image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                    <h5 class="card-title">{{$row->title}}</h5>
                    <p class="card-text">
                        {{Str::limit($row->description,100)}}
                    </p>
                    <a class="btn btn-info">{{$row->price}}$</a>
                <a href="{{url('/updateView/'.$row->id)}}" class="btn btn-primary">edit</a>

                    <a href="{{url('/deleteMenu/'.$row->id)}}" class="btn btn-danger">delete</a>
                    
                    </div>
                </div>
               </div>
           @endforeach
           
        </div>
    
    @include('admin.inc.adminjs')
</body>
</html>