<div class="pagination-wrapper d-flex justify-content-center mb-3">
    @if ($paginator->lastPage() > 1)
        <ul class="pagination mb-0">
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="{{ $paginator->currentPage() == $i ? ' active' : '' }} page-item">
                    <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    @endif
</div>
