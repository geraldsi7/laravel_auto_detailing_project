            <div class="row">
              <div class="col-5 col-md-3">
                Incomes
                <br>
                <p class="font-weight-bold">GHS {{ number_format($totalIncome, 2) }}</p>
              </div>
              <div class="col-5 col-md-3">
                Expenses
                <br>
                <p class="font-weight-bold">GHS {{ number_format($totalExpense, 2) }}</p>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
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