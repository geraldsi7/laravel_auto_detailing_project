<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    DeCraft
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Montserrat:wght@800&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=League+Script&display=swap" rel="stylesheet">

</head>

<body>
  <style>
    * {
      font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif !important;
      -moz-osx-font-smoothing: grayscale;
      -webkit-font-smoothing: antialiased;
      line-height: 1.2em !important;
    }


  </style>
  <div class="float-start">
    <span class="fw-bold text-uppercase" style="font-size: 1.8em !important;">budget report</span>
    <br>
    <!-- company's details -->
    <span class="text-uppercase fw-bold h5">DeCraft
    </span>

    <table class="mt-1 text-capitalize" width="100%">
      <tr>
        <td>
          <small>Greater Accra Regional Hospital, Ridge
            <br>
          Ghana, West Africa</small>
        </td>
      </tr>
    </table>
  </div>

  <div class="float-end">
    <img src="../public/assets/img/logo.png" class="mt-3" height="50">
  </div>

  <div class="clearfix"></div>
  <small class="text-capitalize">
    generate on: {{ date('l jS F Y g:i A') }}
  </small>
  <hr class="border border-dark">
  <table class="table table-striped">
    <tr>
      <td>
        Total Income
        <br>
        <p class="fw-bold">GHS {{ number_format($totalIncome, 2) }}</p>
      </td>
      <td>
        Total Expense
        <br>
        <p class="fw-bold">GHS {{ number_format($totalExpense, 2) }}</p>
      </td>
    </tr>
  </table>

  <div class="mt-2">
    <table class="table table-striped border border-1">
      <thead class="text-capitalize">
        <tr>
          <th class="text-start">Recorded on</th>
          <th class="text-start">reference</th>
          <th class="text-end">amount (GHS)</th>
        </tr>
      </thead>
      <tbody class="text-capitalize">
        @forelse($budget as $key=>$budgets)
        <tr class="border border-1">
          <td class="text-start">{{ $budgets->created_at->format('d/m/Y g:i A') }}</td>
          <td class="text-start">{{ $budgets->description }}</td>
          <td class="text-end">
           @if($budgets->budget == 'income') + @else - @endif {{ number_format($budgets->amount, 2) }}
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center">No data</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>


