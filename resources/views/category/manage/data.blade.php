@if(count($categories) >= 1)
<div class="table-responsive">
  <form id="selectionForm">
    @csrf
    <input type="hidden" name="actions" id="actions">
    <table class="table">
      <thead class="text-primary">
        <th>
          <input type="checkbox" id="all_check">
        </th>
        <th colspan="2">
          Category
        </th>
      </thead>                 
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>
            <input type="checkbox" id="single_check" name="category[]" value="{{ $category->id }}">
          </td>
          <td class="text-capitalize">
            {{ $category->name }}
          </td>
          <td class="text-right">
           <a href="" type="button" class="text-capitalize text-primary h6 pl-3" id="editData" data-toggle="modal" data-target="#manageModal" data-option="edit" data-update="{{ route('category.manage.update', $category) }}" data-href="{{ $category->id }}"><i class="fa-solid fa-pencil" aria-hidden="true"></i>
            </a>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
  </form>

</div>
@else
<p class="text-center">No data</p>
@endif
