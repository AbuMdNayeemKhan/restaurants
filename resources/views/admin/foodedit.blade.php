<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    @include("admin.headlinks")
    
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{url('/foodupdate',$data->id)}}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}">
                    </div>
                    <div class="form-group">
                    <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$data->price}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="price" name="discription" value="{{$data->discription}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Current image</label>
                        <img height="300px" width="150px" src="/foodimage/{{$data->image}}">
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

    </div>
    @include("admin.footerlinks")
  </body>
</html>