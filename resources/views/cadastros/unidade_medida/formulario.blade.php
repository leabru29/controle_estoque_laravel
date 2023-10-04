<form id="formulario" action="{{route('unidade-medida.store')}}" method="post">
    <div class="form-group">
        <label for="unidade_medida">Unidade de Medida</label>
        <input type="text" class="form-control" id="unidade_medida" placeholder="Digite o nome da Unidade de Medida">
    </div>
    <div class="form-group">
        <label for="sigla">Sigla</label>
        <input type="text" class="form-control" id="sigla" placeholder="Digite uma Sigla">
    </div>
    <div class="form-group">
        <label for="ativo">Status</label>
        <select class="form-control" id="ativo">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
    </div>
</form>