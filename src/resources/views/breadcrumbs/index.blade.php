<div class="breadcrumbs">
    <button class="hamburger btn-link is-active no-animation">
        <span class="hamburger-inner"></span>
    </button>
    <ol>
        @php
            $segments = array_filter(explode('/', str_replace(route('overwatch.dashboard'), '', Request::url())));
            $url = route('overwatch.dashboard');
        @endphp

        @if(count($segments) == 0)
            <li>Dashboard</li>
        @else
            <li>
                <a href="{{route('overwatch.dashboard')}}">Dashboard</a>
            </li>
            @foreach ($segments as $segment)
                @php
                    $url .= '/'.$segment;
                @endphp
                @if ($loop->last)
                    <li>{{ ucfirst($segment) }}</li>
                @else
                    <li>
                        <a href="{{ $url }}">{{ ucfirst($segment) }}</a>
                    </li>
                @endif
            @endforeach
        @endif

    </ol>
</div>

