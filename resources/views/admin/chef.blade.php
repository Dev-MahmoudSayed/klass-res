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
    <h1 class=" p-3 border display-4">  Add new chef  </h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" method="post" action="{{url('uploadChef')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cat">name</label>
                        <input type="text" class="form-control" id="cat" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="cat">special</label>
                        <input type="text" class="form-control" id="cat" name="special" >
                    </div>
                   
    
                    <div>
                        <label for="formFileLg" class="form-label">image</label>
                        <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
                      </div>
        
                    <button type="submit"  class="btn btn-success mt-3">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>
 
   

    <h1 class=" p-3 border display-4">  All chefs  </h1>
    <div class="container-fluid">
        @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
        <div class="row">
          @foreach ($data as $row)
             <div class="col-sm-3">
                <div class="card m-3" style="">
                    <img height="100" width="100" src="{{ asset('/chefImage/'.$row->image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                    <h5 class="card-title">{{$row->name}}</h5>
                    <p class="card-text">
                        {{Str::limit($row->special,100)}}
                    </p>
                    
                <a href="{{url('/editChef/'.$row->id)}}" class="btn btn-primary">edit</a>

                    <a href="{{url('/deleteChef/'.$row->id)}}" class="btn btn-danger">delete</a>
                    
                    </div>
                </div>
               </div>
           @endforeach
           
        </div>
    @include('admin.inc.adminjs')
</body>
</html>