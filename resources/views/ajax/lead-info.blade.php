@if (isset($error))
    <div class="modals modals-error bg-danger">
        <h2 class="text-center text-danger">{{ $error }}</h2>
    </div>
@else
<div class="modals modals-lead-info container">
    <h2 class="text-center">{{ $leadInfo->name_task }}</h2>
    <div class="modals-body row">
        <p class="modals-labels col-sm-5">
            ФИО заказчика:
        </p>
        <p class="modals-p col-sm-7">
            {{ $leadInfo->fio }}
        </p>
        <p class="modals-labels col-sm-5">
            Актуально ДО:
        </p>
        <p class="modals-p col-sm-7">
            {{ $leadInfo->created_at }}
        </p>
        <p class="modals-labels col-sm-5">
            Телефон:
        </p>
        <p class="modals-p col-sm-7">
            89209158842
        </p>
    </div>
</div>
@endif
