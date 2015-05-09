<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {!!Form::open(['method'=>'POST','class'=>'form-horizontal','url'=>['users/register']]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">x</span>
                </button>
                <h4 class="modal-title">Cadastro de Usuário</h4>

            </div>
            <div class="modal-body">
                @include('users/partials/_form',['submit_text'=>'Create User'])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg pull-left" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>