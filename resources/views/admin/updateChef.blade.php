<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin.inc.admincss')
</head>
<body>
    @include('admin.inc.navbar')
    
    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="{{url('/viewChef')}}" role="button">View All Chef </a>
        </h3>
    </div>


    <h1 class=" p-3 border display-4">  Add new chef  </h1>
    @if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" method="post" action="{{url('updatedChef',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="color: white" for="cat">Name</label>
                    <input type="text" class="form-control" id="cat" name="name" value="{{$data->name}}" >
                    </div>
                    <div class="form-group">
                        <label style="color: white" for="cat">special</label>
                        <input type="text" class="form-control" value="{{$data->special}}" id="cat" name="special" >
                    </div>
                   
                    <div>
                        <label style="color: white" for="formFileLg" class="form-label">old image</label>
                        <img height="50%" width="20%" src="{{ asset('/chefImage/'.$data->image)}}" class="" alt="">
                      </div>
        
                    <div>
                        <label style="color: white" for="formFileLg" class="form-label">New image</label>
                        <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
                      </div>
        

                    <button type="submit"  class="btn btn-success mt-3">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>
    @include('admin.inc.adminjs')
</body>
</html>