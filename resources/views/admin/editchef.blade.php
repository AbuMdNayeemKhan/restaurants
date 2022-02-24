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
                <form action="{{url('/updatechef',$data->id)}}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                    <label for="speciality">Speciality</label>
                        <input type="text" class="form-control" name="speciality" id="speciality" value="speciality">
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