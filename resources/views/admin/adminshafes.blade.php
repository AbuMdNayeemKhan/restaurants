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
                <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                    <label for="speciality">Speciality</label>
                        <input type="text" class="form-control" name="speciality" id="speciality" placeholder="Enter speciality">
                    </div>
                    <div class="form-group">
                        <input type="file" id="image" name="image">
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
                    <th scope="col">Name</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $data)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->speciality}}</td>
                    <td><img src="/shefsimage/{{$data->image}}"></td>
                    <td>
                        <a href="{{url('/editchef',$data->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('/deletechef',$data->id)}}" class="btn btn-danger">Delete</a>
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