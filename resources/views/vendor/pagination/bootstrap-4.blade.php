@if ($paginator->hasPages())
    <nav>
        <div class="d-flex bd-highlight">
            <div class="mr-auto p-2 bd-highlight">
                <p style="margin-top: 8px;">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} items</p>
            </div>
            <div class="p-2 bd-highlight">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif
        
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif
        
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
        
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="p-2 bd-highlight"> 
                <select class="custom-select" style="height: 35px" onchange="window.location.href = window.location.href.replace('&perPage={{$paginator->perPage()}}', '').replace('?page={{$paginator->currentPage()}}', '') + '?page={{$paginator->currentPage()}}'+'&perPage='+this.value">
                    <option value="10"  @if($paginator->perPage() == '10') selected @endif>10</option>
                    @if ($paginator->hasMorePages())
                        <option value="50"  @if($paginator->perPage() == '50') selected @endif>50</option>
                        <option value="100" @if($paginator->perPage() == '100') selected @endif>100</option>   
                    @endif
                </select>
            </div>
            <div class="p-2 bd-highlight">
                <p style="margin-top: 8px;">items per page</p>
            </div>
        </div>
    </nav>
@endif
