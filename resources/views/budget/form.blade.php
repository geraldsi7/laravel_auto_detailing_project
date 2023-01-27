<div class="form-row">
  <div class="form-group col-12">
    <select class="form-control" name="budget" id="budgetType">
      <option disabled selected>-- Select Budget Type --</option>
      <option value="income">Income</option>
      <option value="expense">Expense</option>
    </select>
    <span class="budget_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
  </div>

  <div class="form-group col-12">
    <input class="form-control" placeholder="Amount" type="number" name="amount" id="amount">
    <span class="amount_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
  </div>

  <div class="form-group col-12">
    <input class="form-control" placeholder="Reference" type="text" name="description" id="description">
    <span class="description_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
  </div>

  <div class="col-12">
    <button type="submit" id="submit_form" class="btn btn-primary rounded-0 btn-lg col-12" disabled>
      Save 
    </button>
    <b class="text-danger">* Note changes cannot be made after saving</b>
  </div>
</div>