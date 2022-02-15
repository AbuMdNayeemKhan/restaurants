<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.headlinks")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                    <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="price" name="discription" placeholder="Enter price">
                    </div>
                    <div>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Data showing in Admin page -->
    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table mt-5">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Images</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td><img src="/foodimage/{{$data->image}}"></td>
                        <td>{{$data->discription}}</td>
                        <td>
                            <a href="{{url('/foodedit',$data->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('/fooddelete',$data->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>

    </div>
    @include("admin.footerlinks")
  </body>
</html>