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
            <table class="table mt-5">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                       @if($data->usertype=="0")
                      <td><a href="{{url('/deleteusers',$data->id)}}" class="btn btn-danger">Delete</a></td>
                      @else
                        <td><a class="btn btn-warning">Not Deletable</a></td>
                      @endif
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