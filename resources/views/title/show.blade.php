@extends('layouts.app', [
'namePage' => 'Schools',
'class' => 'login-page sidebar-mini ',
'activePage' => 'schools',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">

    <div class="col-md-3">
     <a href="{{ route('schools.ssa.index', $school) }}"> <div class="card">
        <div class="card-body">
          <div class="pull-left">
           <h6 class="card-title">{{ count($ssa) }}</h6>
           <p class="text-muted">Total Super System Admin</p>
         </div>

         <div class="pull-right">
          <i class="now-ui-icons users_circle-08" style="font-size: 43px;"></i>
        </div>
      </div>
    </div>
  </a>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="pull-left">
         <h6 class="card-title">{{ count($workers) + count($users) }}</h6>
         <p class="text-muted">Total System Admins</p>
       </div>

       <div class="pull-right">
        <i class="now-ui-icons users_circle-08" style="font-size: 43px;"></i>
      </div>
    </div>
  </div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($invoice) }}</h6>
       <p class="text-muted">Total 
        @if($school->type->name == "University") Lecturers
        @else
        Teachers
        @endif
      </p>
    </div>

    <div class="pull-right">
      <i class="now-ui-icons users_circle-08" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Students</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons users_circle-08" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

@if($school->type->name == "University")
<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Colleges</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons business_bank" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Faculties</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons business_bank" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Departments</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons business_bank" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

@elseif($school->type->name == "Senior High School")

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Programmes</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons business_bank" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>

@endif

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ count($task) }}</h6>
       <p class="text-muted">Total Classes</p>
     </div>

     <div class="pull-right">
      <i class="now-ui-icons business_bank" style="font-size: 43px;"></i>
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6">
  <div class="card card-chart">
    <div class="card-header">
      <h5 class="card-category">Income</h5>
      <h4 class="card-title">This Year</h4>
    </div>
    <div class="card-body">
      <div class="chart-area">
        @if($budgetIncomeYear > 0)
        <canvas id="expense" style="width: 100%; height: 100%;" ></canvas>
        <script>
         var ctx = document.getElementById("expense");

         var expense = new Chart(ctx, {
          type: 'bar',
          data:  {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
              label: 'Income',
              data: [{{$incomeJan}}, {{$incomeFeb}}, {{$incomeMar}}, {{$incomeApr}}, {{$incomeMay}}, {{$incomeJun}}, {{$incomeJul}}, {{$incomeAug}}, {{$incomeSep}}, {{$incomeOct}}, {{$incomeNov}}, {{$incomeDec}}],
              backgroundColor: [
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646'
              ],

              borderColor: [
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
        });
      </script>
      @else
      <p class="text-center">No income this year</p>
      @endif
    </div>
  </div>
</div>
</div>



<div class="col-lg-6">
  <div class="card card-chart">
    <div class="card-header">
      <h5 class="card-category">Expense</h5>
      <h4 class="card-title">This Year</h4>
    </div>
    <div class="card-body">
      <div class="chart-area">
        @if($budgetExpenseYear > 0)
        <canvas id="expenseThisYear" style="width: 100%; height: 100%;" ></canvas>
        <script>
         var ctx = document.getElementById("expenseThisYear");

         var expense = new Chart(ctx, {
          type: 'bar',
          data:  {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
              label: 'Expense',
              data: [{{$expenseJan}}, {{$expenseFeb}}, {{$expenseMar}}, {{$expenseApr}}, {{$expenseMay}}, {{$expenseJun}}, {{$expenseJul}}, {{$expenseAug}}, {{$expenseSep}}, {{$expenseOct}}, {{$expenseNov}}, {{$expenseDec}}],
              backgroundColor: [
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646'
              ],

              borderColor: [
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646',
              '#464646'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
        });
      </script>
      @else
      <p class="text-center">No expense this year</p>
      @endif
    </div>
  </div>
</div>
</div>
</div>

<div class="row">

  <div class="col-md-6">
    <div class="card card-chart" style="height: 30em; overflow-y: scroll;">
      <div class="card-header">
        <h4 class="card-title">Latest Income</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="text-primary">
              <th>Date</th>
              <th>Description</th>
              <th class="text-right">
                Amount
              </th>
            </thead>
            <tbody>
              @foreach($income as $incomes)
              <tr class="text-success">
                <td>
                 {{ $incomes->created_at->format('d/m/Y g:i A') }}            
               </td>
               <td>
                @if(is_numeric($incomes->description))
                INV{{ str_pad($incomes->description, 4, '0', STR_PAD_LEFT)  }}
                @else
                {{ $incomes->description }}
                @endif
              </td>
              <td class="text-right">
                GH￠ {{ number_format($incomes->amount, 2) }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="card card-chart" style="height: 30em; overflow-y: scroll;">
    <div class="card-header">
      <h4 class="card-title">Latest Expense</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class="text-primary">
            <th>Date</th>
            <th>Description</th>
            <th class="text-right">
              Amount
            </th>
          </thead>
          <tbody>
            @foreach($expense as $expenses)
            <tr class="text-danger">
              <td>
               {{ $expenses->created_at->format('d/m/Y g:i A') }}            
             </td>
             <td>
              @if(is_numeric($expenses->description))
              INV{{ str_pad($expenses->description, 4, '0', STR_PAD_LEFT)  }}
              @else
              {{ $expenses->description }}
              @endif
            </td>
            <td class="text-right">
              GH￠ {{ number_format($expenses->amount, 2) }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

</div>
</div>

@endsection

@push('js')
<script>
  $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  @endpush