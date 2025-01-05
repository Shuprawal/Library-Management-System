@extends("layouts.try")
@section("hom-body")
<div class="list_body p-4">
  <h1>Book list</h1>
  <table class="table table-hover table-striped-columns">
    <thead>
      <tr>
       
         <!-- Borrowers -->
          <th scope="col">Username</th>
          <th scope="col">Bookname</th>
          <th scope="col">Borrow Date</th>
          <th scope="col">Return Date</th>
          <th scope="col">Status</th>
        @elseif($a <= 1)
          <!-- user -->
          <th scope="col">Username</th>
          <th scope="col">Email</th>  
          <th class="col">Address</th>
                  
        @endif
        <th scope="col">edit</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <tr>


        <td>Mark</td>
        <td>Ottohhhs</td>
        <td>abc</td>
        <td>abhhhhhhh</td>
        <td>abhhhhhhh</td>
        <td><button type="button" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i>
            Delete</button>
          <button type="button" class="btn btn-dark btn-lg"><i class="bi bi-pencil-square"></i>Edit</button>
        </td>
      </tr>
      <tr>

        <td>Jacob</td>
        <td>Thornton</td>
        <td>abc</td>
        <td>abc</td>
        <td>abc</td>
        <td><button type="button" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i>
            Delete</button>
          <button type="button" class="btn btn-dark btn-lg"><i class="bi bi-pencil-square"></i>Edit</button>
        </td>
      </tr>
      <tr>

        <td>Larry the Bird</td>
        <td>abc</td>
        <td>abc</td>
        <td>@twitter</td>
        <td>abc</td>
        <td><button type="button" class="btn btn-danger btn-lg">
            <i class="bi bi-trash3"></i>
            Delete</button>
          <button type="button" class="btn btn-dark btn-lg"><i class="bi bi-pencil-square"></i>Edit</button>
        </td>
      </tr>
    </tbody>
  </table>


  <button type="submit" class="btn btn-dark">Add new </button>
</div>

@endsection