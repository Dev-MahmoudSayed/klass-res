@include('pages.inc.header')
<br>

<h1 class=" mt-5 p-3 border display-4">  All Orders  </h1>
    
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
                    <th scope="col"> Food Name</th>
                    <th scope="col"> Price</th>
                    <th scope="col"> quantity</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$row->title}}</td>
                           <td>{{$row->price}}</td>
                           <td>{{$row->qty}}</td>
                           
                           @foreach ($data2 as $row2)
                           @endforeach
                           <td>
                               <a href="{{url('/remove',$row2->id)}}" type="submit" class="btn btn-danger">Remove <i class="fas fa-user-minus"></i></a>
                           
                               </td>
                         
                           
                            
                        </tr>
        
                    @endforeach

                    
                </tbody>
                </table>
            
            <div align="center" style="padding: 10px">
                <button class="btn btn-primary" id="order">Order Now</button>
            </div>
               
            
            <div id="apear" align="center" style="padding: 10px; ">

            <div style="padding: 10px;">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div style="padding: 10px;">
                <label>Phone</label>
                <input type="number" name="phone" placeholder="Number">
            </div>
            <div style="padding: 10px;">
                <label>Address</label>
                <input type="text" name="address" placeholder="Address">
            </div>
            <div style="padding: 10px;">
                
                <input class="btn btn-success" type="submit" value="Order Confirm">
            </div>
            </div>

        </div>
    </div> 
    


@include('pages.inc.footer')