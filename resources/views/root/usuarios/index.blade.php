@extends('layouts.dashboard.main')
@section('template_title')
Página principal | {{ config('app.name', 'Laravel') }}
@endsection
@section('content')
<main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Home Page</a>
                        <span>/</span>
                        <span>Dashboard</span>
                    </h4>

                    <form class="d-flex justify-content-center">
                        <!-- Default input -->
                        <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                    </form>

                </div>

            </div>
            <!-- Heading -->

         
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-12">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Table  -->
                            <table id="dtusuarios" class="table table-hover table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Position
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Office
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Age
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Start date
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Salary
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
   
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>
                            <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

          
        </div>
    </main>
    <!--Main layout-->
@endsection
@section('js_links')
<script>
$(document).ready(function () {
  $('#dtusuarios').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection