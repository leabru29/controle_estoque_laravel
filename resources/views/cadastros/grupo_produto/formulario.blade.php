<form id="formulario" action="{{route('grupo-produto.store')}}" method="POST">
    <div class="modal-body">
            <div class="form-group">
                <label for="grupo">Nome Grupo</label>
                <input type="text" class="form-control" name="grupo" id="grupo" placeholder="Digite o nome do Grupo">
            </div>
            <div class="form-group">
                <label for="ativo">Status</label>
                <select class="form-control" name="ativo" id="ativo">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" id="btn_salvar" class="btn btn-primary">Salvar</button>
        <button type="button" id="btn_fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>