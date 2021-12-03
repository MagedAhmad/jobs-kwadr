{{ BsForm::resource('profiles')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('profiles.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('first_name')->value(request('first_name')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::text('father_name')->value(request('father_name')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('status')->options(__('profiles.status')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('profiles.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('profiles.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
