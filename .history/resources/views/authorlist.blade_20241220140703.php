@extends("layouts.try")
@section("hom-body")
<div class="list_body p-4">
  <h1>author list</h1>

  @php
  $a = 10
  @endphp
  <table class="table table-hover table-striped-columns">
    <thead>
      <tr>
        @if ($a <= 1)
        <!-- Author -->
          <th scope="col">name</th>
          <th scope="col">email</th>
        @elseif($a <= 2)
           <!-- publisher -->
          <th scope="col">name</th>
          <th scope="col">email</th>
        @elseif($a >= 1)
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
        <td>Otto</td>
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