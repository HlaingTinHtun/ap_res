@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kitchen Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dishes</h3>
                <a href="/dish/create" class="btn btn-success" style="float:right">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table id="dishes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Dish Name</th>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{$dish->name}}</td>
                        <td>{{$dish->category->name}}</td>
                        <td>{{$dish->created_at}}</td>
                        <td>
                          <div class="form-row">
                            <a style=" height: 40px; margin-right: 10px;" href="/dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                            <form action="/dish/{{$dish->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                            </form> 
                          </div>
                          
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {
    $('#dishes').DataTable({
        "paging": true,
        "pageLength": 10,
        "lengthChange": false,
        "ordering": true,
        "info": true,
    });
});
</script>
