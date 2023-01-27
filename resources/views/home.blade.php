@extends('layouts.app', [
'namePage' => 'Dashboard',
'class' => 'login-page sidebar-mini ',
'activePage' => 'home',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  
  <div class="row">
<!--
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h6 class="card-title">{{ count($customers) }}</h6>
            <p class="text-muted">Total Customers</p>
          </div>

          <div class="pull-right">
            <i class="now-ui-icons users_circle-08" style="font-size: 43px;"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h6 class="card-title">{{ count($order) }}</h6>
            <p class="text-muted">Total
              @if( count($order) == 1)Order
              @else
              Orders
              @endif
            </p>
          </div>

          <div class="pull-right">
            <i class="now-ui-icons shopping_cart-simple" style="font-size: 43px;"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h6 class="card-title">{{ count($reviews) }}</h6>
            <p class="text-muted">Total Reviews</p>
          </div>

          <div class="pull-right">
            <i class="now-ui-icons ui-2_like" style="font-size: 43px;"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            @php

            $allReview = 5 * count($reviews);

            $sumReview = $reviews->sum('rate');

            $overAllReview = ($sumReview / $allReview) * 100;

            $overAllReview = round($overAllReview);

            @endphp
            <h6 class="card-title">{{ $overAllReview }}%</h6>
            <p class="text-muted">Satisfied Customers</p>
          </div>

          <div class="pull-right">
            <i class="now-ui-icons emoticons_satisfied" style="font-size: 43px;"></i>
          </div>
        </div>
      </div>
    </div>
-->
    <!--
<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ number_format($budgetIncomeToday, 2) }}</h6>
       <p class="text-muted">Income Today</p>
     </div>

     <div class="pull-right">
      <p style="font-size: 33px;">￠</p>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ number_format($budgetExpenseToday, 2) }}</h6>
       <p class="text-muted">Expense Today</p>
     </div>

     <div class="pull-right">
      <p style="font-size: 33px;">￠</p>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ number_format($budgetIncomeMonth, 2) }}</h6>
       <p class="text-muted">Income This Month</p>
     </div>

     <div class="pull-right">
      <p style="font-size: 33px;">￠</p>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card">
    <div class="card-body">
      <div class="pull-left">
       <h6 class="card-title">{{ number_format($budgetExpenseMonth, 2) }}</h6>
       <p class="text-muted">Expense This Month</p>
     </div>

     <div class="pull-right">
      <p style="font-size: 33px;">￠</p>
    </div>
  </div>
</div>
</div>

<div class="col-lg-12">
  <div class="card card-chart">
    <div class="card-header">
      <h5 class="card-category">Budget</h5>
      <h4 class="card-title">This Year</h4>
    </div>
    <div>
      <div class="card-body">
        <div style="height: 40vh;">
          @if($budgetIncomeYear > 0 || $budgetExpenseYear > 0)

          <canvas id="income" style="width: 100%; height: 100%;"></canvas>
          <script>
           var ctx = document.getElementById("income");

           var monthlyIncomeData = [
           @foreach($monthlyIncome as $monthIncome)
           {{ $monthIncome }},
           @endforeach
           ];

           var monthlyIncomeDataBg = [
           @foreach($monthlyIncome as $monthIncome)
           '#28a745',
           @endforeach
           ];

           var monthlyExpenseData = [
           @foreach($monthlyExpense as $monthExpense)
           {{ $monthExpense }},
           @endforeach
           ];

           var monthlyExpenseDataBg = [
           @foreach($monthlyExpense as $monthExpense)
           '#dc3545',
           @endforeach
           ];

           var yearBudget = new Chart(ctx, {
            type: 'bar',
            data:  {
              labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
              datasets: [{
                label: 'Income',
                data : monthlyIncomeData,
                backgroundColor:monthlyIncomeDataBg,
              },
              {
                label: 'Expense',
               data : monthlyExpenseData,
                backgroundColor:monthlyExpenseDataBg,
              } ]
            },
            options: {
              scales: {
                x:{
                  grid:{
                    display: false,
                  }
                },
                y: {
                  beginAtZero: true,
                  grid:{
                    display: false,
                  }
                }
              },
              responsive: false,
            },
          });
        </script>
        @else
        <p class="centered-content">No budget this year</p>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
        -->
  </div>

  <div class="row">
    <!--
  <div class="col-12">
    <div class="card card-chart" style="height: 50em; overflow-y: scroll;">
      <div class="card-header">
        <h4 class="card-title">Recent Budget</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="text-dark">
              <th>Date</th>
              <th>Reference</th>
              <th class="text-right">
                Amount (GHS)
              </th>
            </thead>
            <tbody>
             @forelse($budget as $budgets)
             <tr>
              <td>
               {{ $budgets->created_at->format('d/m/Y g:i A') }}            
             </td>
             <td>
               {{ $budgets->description }}
               <br>
               <small>{{ $budgets->user->name }}</small>
             </td>
             <td class="text-right @if($budgets->budget == 'income') text-success @else text-danger @endif ">
               {{ number_format($budgets->amount, 2) }}
             </td>
           </tr>
           @empty
           <td colspan="3" class="text-center">No data</td>
           @endforelse
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
-->
  </div>


  <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Recent Orders</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-dark">
                <th>Date</th>
                <th>Order #</th>
                <th colspan="3">Customer Info</th>
                <th>Vehicle Info</th>
                <th>Description</th>
                <th>Status</th>
              </thead>
              <tbody>
                @forelse($order->take(10) as $order)
                <tr>
                  <td>
                    {{ $order->created_at->format('d/m/Y g:i A') }}
                  </td>
                  <td>{{ $order->orderNumber }}</td>
                  <td>
                    {{ $order->name }}
                  </td>
                  <td>
                    {{ $order->email }}
                  </td>
                  <td>
                    {{ $order->phone_number }}
                  </td>
                  <td>
                    {{ $order->vehicle }}
                  </td>
                  <td>
                    {{ $order->description }}
                  </td>
                  <td>
                    <span class="badge bg-primary text-capitalize p-2 text-white rounded-0">{{ $order->status }}</span>
                  </td>
                </tr>
                @empty
                <td colspan="5" class="text-center">No orders</td>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!--
<div class="col-12 col-lg-6">
  <div class="card card-chart" style="height: 45em; overflow-y: scroll;">
    <div class="card-header">
      <h4 class="card-title">Recent Reviews</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <tbody>
           @forelse($reviews->take(8) as $review)
           <tr>
            <td>
             <div class="ms-1" style="height: 7vh; width: 7vh;">
              <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $review->services->image1 }}" alt="Card image cap">
            </div>          
          </td>
          <td>
           <a href="" class="text-primary">{{ $review->services->title }}</a>
           <br><small>sfsf</small>
         </td>
         <td class="text-right">
          <div>
            <span id="ratingStar"> 
             @for($i = 1; $i <= $review->rate; $i++)

               <i class="fa-solid fa-star" aria-hidden="true"></i>
               @endfor

               @for($i = 1; $i <= 5 - $review->rate; $i++)
                <i class="fa-regular fa-star"></i>
                @endfor
              </span>
            </div>
          </td>
        </tr>
        @empty
        <td colspan="3" class="text-center">No data</td>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>
-->
  </div>


</div>
</div>
@endsection