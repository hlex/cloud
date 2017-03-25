<div class="form-group">
    <div class="row">
      <label class="control-label D-3 text-middle text-right">
        {{ $label }}
      </label>
      <div class="D-9 text-middle">
        <select name="{{ $name }}" id="{{ $id }}" class="form-control" multiple>
          @foreach($options as $option)
            <option value="{{ $option['value'] }}">
              {{ $option['label'] }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
</div>
