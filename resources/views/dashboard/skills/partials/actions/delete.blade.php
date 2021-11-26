@can('delete', $skill)
<a href="#skill-{{ $skill->id }}-delete-model"
   class="btn btn-outline-danger btn-sm"
   data-toggle="modal">
  <i class="fas fa fa-fw fa-trash"></i>
</a>


<!-- Modal -->
<div class="modal fade" id="skill-{{ $skill->id }}-delete-model" tabindex="-1" role="dialog"
     aria-labelledby="modal-title-{{ $skill->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-{{ $skill->id }}">@lang('skills.dialogs.delete.title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('skills.dialogs.delete.info')
      </div>
      <div class="modal-footer">
        {{ BsForm::delete(route('dashboard.skills.destroy', $skill)) }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          @lang('skills.dialogs.delete.cancel')
        </button>
        <button type="submit" class="btn btn-danger">
          @lang('skills.dialogs.delete.confirm')
        </button>
        {{ BsForm::close() }}
      </div>
    </div>
  </div>
</div>
@endcan
