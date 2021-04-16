<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Уведомление</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ $msg }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Ок</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $('.modal').modal('show');

        $('.modal .close').click(function(){
            $('.modal').modal('hide');
        });

        $('.modal .btn-primary').click(function(){
            $('.modal').modal('hide');
        });
    });
</script>
@endpush
