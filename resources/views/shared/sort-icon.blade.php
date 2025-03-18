@isset($sortBy)
    @if ($sortBy === $field)
        @if ($sortDirection === 'asc')
            <i class="bi bi-arrow-up"></i>
        @else
            <i class="bi bi-arrow-down"></i>
        @endif
    @endif
@endisset
