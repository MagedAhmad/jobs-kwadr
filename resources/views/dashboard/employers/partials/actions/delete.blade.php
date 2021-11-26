@can('delete', $employer)
<a href="#employer-{{ $employer->id }}-delete-model"
   class="btn btn-outline-danger btn-sm"
   data-toggle="modal">
  <i class="fas fa fa-fw fa-trash"></i>
</a>


<!-- Modal -->
<div class="modal fade" id="employer-{{ $employer->id }}-delete-model" tabindex="-1" role="dialog"
     aria-labelledby="modal-title-{{ $employer->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-{{ $employer->id }}">@lang('employers.dialogs.delete.title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('employers.dialogs.delete.info')
      </div>
      <div class="modal-footer">
        {{ BsForm::delete(route('dashboard.employers.destroy', $employer)) }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          @lang('employers.dialogs.delete.cancel')
        </button>
        <button type="submit" class="btn btn-danger">
          @lang('employers.dialogs.delete.confirm')
        </button>
        {{ BsForm::close() }}
      </div>
    </div>
  </div>
</div>
@endcan
