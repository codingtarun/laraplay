<div class="form-check form-switch">
    <input class="form-check-input status-switch" type="checkbox" id="status-switch-{{$model->id}}" data-model-id="{{$model->id}}" @if($model->status_switch) checked @endif>
    <label class="form-check-label status-label" for="status-switch-{{$model->id}}">{{$model->status}}</label>
    <!-- Hidden filed is needed to pass the url for switching the status using AJAX-->
    <input type="hidden" name="switch-status-url" id="switch-status-url-{{$model->id}}" value="{{$url}}" />
</div>