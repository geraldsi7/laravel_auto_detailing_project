@extends('layouts.app', [
'namePage' => 'Budgets',
'class' => 'login-page sidebar-mini ',
'activePage' => 'budgets',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Budget</h5>
          <div class="pull-left">
            <label>
              Fetch 
              <select class="py-1 pr-4 pl-1 border border-gray-300" name="budget" id="budget">
                <option value="all" selected>All</option>
                <option value="income">Incomes</option>
                <option value="expense">Expenses</option>
              </select> 
            </label>
          </div>

          <div class="pull-right">
            <button data-toggle="modal" data-target="#manageModal" class="btn btn-link text-capitalize text-primary" style="font-size: 1.1rem"><i class="fa fa-plus" aria-hidden="true"></i></button> 
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-12 col-md-4">
              <label for="from_date">From date</label>
              <input type="datetime-local" required id="from_date" name="from_date" placeholder="from_date" class="form-control" max="{{ date('Y-m-d')  . 'T00:00' }}" value="{{ date('Y-m-d')  . 'T00:00' }}">
            </div>
            <div class="col-12 col-md-4">
              <label for="to_date">To date</label>
              <input type="datetime-local" required id="to_date" name="to_date" placeholder="to_date" class="form-control" max="{{ date('Y-m-d')  . 'T23:59' }}" value="{{ date('Y-m-d')  . 'T23:59' }}">
            </div>
            <div class="col-12 col-md-3">
              <button type="button" class="btn btn-primary rounded-0" id="print"><i class="fa-solid fa-print pr-1"></i>Print
              </button>
            </div>
          </div>

          <div class="modal" id="manageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class=" modal-title text-capitalize">Manage budget</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form id="upload_form">
                    @csrf
                    @include('budget.form')
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div id="manage-content" class="mt-5">
            @include('budget.data')
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('budget.js')

  @endsection