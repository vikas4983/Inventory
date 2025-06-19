<form action="{{ $url }}" method="POST">
    @csrf
    @method('PATCH')
    <label class="switch switch-text switch-primary switch-pill form-control-label">
        <input type="checkbox" name="is_active" id="is_active" value="1" class="statusBtn switch-input form-check-input btn btn-outline-primary btn-pill"
            {{ old('is_active', $objectData ?? 0) == 1 ? 'checked' : '' }}>
        <span class="switch-label" data-on="On" data-off="Off"></span>
        <span class="switch-handle" style="color: black"></span>
    </label>
</form>
<style>
    /* Green "On" state */
    .switch-input:checked ~ .switch-label::before {
        background-color: #3f4ae4 !important; /* Bootstrap green */
        border-color: #3f4ae4 !important;
    }
    
    
    
    /* White text for better contrast */
    .switch-label[data-on]::after,
    .switch-label[data-off]::after {
        color: white !important;
       
    }
    
    /* Handle color when active */
    .switch-input:checked ~ .switch-handle {
        border-color: #28a745 !important;
    }
</style>