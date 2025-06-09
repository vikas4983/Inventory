<form action="{{ $url }}" method="POST">
    @csrf
    @method('PATCH')
    <label class="switch switch-text switch-secondary switch-pill form-control-label">
        <input type="checkbox" name="is_active" id="is_active" value="1"
            class="status-button switch-input form-check-input"
            {{ old('is_active', $objectData ?? 0) == 1 ? 'checked' : '' }}>
        <span class="switch-label" data-on="On" data-off="Off"></span>
        <span class="switch-handle"></span>
    </label>
</form>
