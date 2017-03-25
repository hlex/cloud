<div class="form-group">
  <div class="row">
    <label class="control-label D-4">
      {{ $label }}
    </label>
    <div class="D-8">
      <div class="input-group">
        <input id="{{ $id }}" name="{{ $name }}" type="number" class="form-control" placeholder="{{ $placeholder }}" />
        <span class="input-group-btn">
          <button id="{{ $idBtn }}" class="btn btn-primary" type="button">{{ $labelBtn }}</button>
        </span>
      </div>
    </div>
  </div>
</div>
