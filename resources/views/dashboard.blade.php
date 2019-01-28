@extends('layouts.app')
@section('pagename', 'Dashboard')

@section('content')

          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Employees</p>
                  <h3 class="card-title">{{ count($users) }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-success">face</i>Number of registered users
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Reports</p>
                  <h3 class="card-title">{{ count($reports) }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Submitted reports today
                  </div>
                </div>
              </div>
            </div>
  
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Employees Stats</h4>
                  <p class="card-category">List of employees who recently submmited report</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Department</th>
                    </thead>
                    <tbody>
                      @foreach($reports as $report)
                      <tr>
                        <td>1</td>
                        <td>{{ $report->user['name'] }}</td>
                        @php
                        $department = \App\Department::find($report->user['department_id'])
                        @endphp
                        <td>{{ $department->name }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

@endsection