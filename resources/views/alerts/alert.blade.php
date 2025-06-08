@php
    $alerts = [
        'success' => 'success',
        'error' => 'danger',
        'warning' => 'warning',
        'info' => 'info',
    ];
@endphp

@foreach ($alerts as $sessionKey => $alertClass)
    @if (session()->has($sessionKey))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session($sessionKey) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach
