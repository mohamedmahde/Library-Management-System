<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        .center{

            text-align: center;
            margin : auto;
            width: 80px;
            border: 1px solid white;
            margin-top:60px;
        }

        th{

            background-color: skyblue;
            text-align: center;
            color: white;
            font-size : 20px;
            font-weight: bold;
            padding: 15px;
        }
    </style>
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
<div>
                    <table class="center">

                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Book Title</th>
                            <th>quantity</th>
                            <th>Borrow Status</th>
                            <th>Book Image</th>
                            <th>Change Status</th>
                              @foreach ($data as $data)
    
                            <tr>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->user->email }}</td>
                                <td>{{ $data->user->phone }}</td>
                                <td>{{ $data->book->title }}</td>
                                <td>{{ $data->book->quantity }}</td>
                                <td>

                                  @if ($data->stauts == 'approved')
                                  <span style="color: skyblue">{{ $data->stauts }}</span>
                                    
                                  @endif

                                  @if ($data->stauts == 'Returned')
                                  <span style="color: yellow">{{ $data->stauts }}</span>
                                    
                                  @endif

                                  @if ($data->stauts == 'Rejected')
                                  <span style="color: red">{{ $data->stauts }}</span>
                                    
                                  @endif
                                </td>

                                <td>


                                    <img src="book/{{ $data->book->book_img }}" alt="">
                                </td>

                                <td>

                                <a class="btn btn-warning" href="{{ url('approve_book',$data->id) }}">Approved</a>
                                <a class="btn btn-danger" href="{{ url('rejected_book',$data->id) }}">Rejected</a>
                                <a class="btn btn-info" href="{{ url('return_book',$data->id) }}">Returned</a>
                                </td>
                            </tr>
                            @endforeach

                        </tr>
                    </table>

               </div>
               </div>
            </div>




      @include('admin.footer')
  </body>
</html>