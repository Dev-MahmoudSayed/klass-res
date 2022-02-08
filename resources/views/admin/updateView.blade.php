<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/public">
    @include('admin.inc.admincss')
    

</head>

<body>
    @include('admin.inc.navbar')
    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="{{url('/showMenu')}}" role="button">View All Menus </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  update Menu  </h1>
    
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" method="post" action="{{url('/update',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cat">Title</label>
                    <input type="text" class="form-control" id="cat" value="{{$data->title}}" name="title" >
                    </div>
                    <div class="form-group">
                        <label for="cat">price</label>
                        <input type="num" class="form-control" id="cat" name="price" value="{{$data->price}}" >
                    </div>
                   
                    <div class="form-floating">
                        <label for="floatingTextarea2">description</label>
                        <textarea class="form-control"  value="{{$data->price}}" name="description"  id="floatingTextarea2" style="height: 100px"></textarea>
                      </div>
    
                    <div>
                        <label for="formFileLg" class="form-label"> old image</label>
                       <img height="200" width="200" src="{{ asset('/foodimage/'.$data->image)}}">
                      </div>

                      <div>
                        <label for="formFileLg" class="form-label"> image</label>
                        <input class="form-control form-control-lg" name="image" value="" id="formFileLg" type="file">
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