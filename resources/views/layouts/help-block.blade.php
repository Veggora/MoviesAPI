@if ($errors->has($what))
    <span class="help-block" style="color: red;"><strong>{{ $errors->first($what) }}</strong></span>
@endif