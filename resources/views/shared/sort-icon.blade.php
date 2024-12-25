@if ($sortBy !== $field)
<i  class=" text-gray-300 fas fa-sort"></i>
@elseif ($sortDirection == 'asc')
<i  class="text-primary fas fa-sort-up"></i>
@else
<i  class="text-primary  fas fa-sort-down"></i>

@endif