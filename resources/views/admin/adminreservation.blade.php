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
    
    <!-- Data showing in Admin page -->
    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table mt-5">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($data as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td><a href="tel:{{$data->phone}}">{{$data->phone}}</a></td>
                        <td>{{$data->guest}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->message}}</td>
                        <td>
                          <a class="btn btn-success" onclick="return confirm('Are you sure? {{$data->name}}s order has been completed?')" href="{{url('/deletereservation', $data->id)}}">Done</a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure? You canceling {{$data->name}}s Order!')" href="{{url('/deletereservation', $data->id)}}">Cancel</a>
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