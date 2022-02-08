<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.inc.admincss')
</head>
<body>
    
    @include('admin.inc.navbar')
    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="{{url('/showMenu')}}" role="button">View All Menus </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Add New Menu  </h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" method="post" action="{{url('/uploadFood')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cat">Title</label>
                        <input type="text" class="form-control" id="cat" name="title" >
                    </div>
                    <div class="form-group">
                        <label for="cat">price</label>
                        <input type="number" class="form-control" id="cat" name="price" >
                    </div>
                   
    
                    <div>
                        <label for="formFileLg" class="form-label">image</label>
                        <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
                      </div>

                      <div class="form-floating">
                        <label for="floatingTextarea2">description</label>
                        <textarea class="form-control"  name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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