@csrf
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="id_produto">Produto</label>
                <select type="text" class="form-control @error('id_produto') is-invalid @enderror" id="id_produto"
                    name="id_produto">
                    <option value="">Selecione um Produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->cod_item }} | {{ $produto->nome }}</option>
                    @endforeach
                </select>
                @error('id_produto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lote">Lote</label>
                <input type="text" class="form-control @error('lote') is-invalid @enderror" id="lote"
                    name="lote">
                @error('lote')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control @error('quantidade') is-invalid @enderror quantidade"
                    id="quantidade" name="quantidade">
                @error('quantidade')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_medida">Unidade de Medida</label>
                <select type="text" class="form-control @error('id_medida') is-invalid @enderror" id="id_medida"
                    name="id_medida">
                    <option value="">Selecione uma Unidade de Medida</option>
                    @foreach ($unidadeMedidas as $unidadeMedida)
                        <option value="{{ $unidadeMedida->id }}">{{ $unidadeMedida->unidade }}</option>
                    @endforeach
                </select>
                @error('id_medida')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="valor">Valor Total</label>
                <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor"
                    name="valor">
                @error('valor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="dt_fabricacao">Data de Fabricação</label>
                <input type="date" class="form-control @error('dt_fabricacao') is-invalid @enderror"
                    id="dt_fabricacao" name="dt_fabricacao">
                @error('dt_fabricacao')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="dt_validade">Data de Validade</label>
                <input type="date" class="form-control @error('dt_validade') is-invalid @enderror" id="dt_validade"
                    name="dt_validade">
                @error('dt_validade')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_fornecedor">Fornecedor</label>
                <select type="text" class="form-control @error('id_fornecedor') is-invalid @enderror"
                    id="id_fornecedor" name="id_fornecedor">
                    <option value="">Selecione um Fornecedor</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->fornecedor }}</option>
                    @endforeach
                </select>
                @error('id_fornecedor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_local_armazenamento">Local de Armazenamento</label>
                <select type="text" class="form-control @error('id_local_armazenamento') is-invalid @enderror"
                    id="id_local_armazenamento" name="id_local_armazenamento">
                    <option value="">Selecione um Fornecedor</option>
                    @foreach ($locaisArmazenamentos as $local)
                        <option value="{{ $local->id }}">{{ $local->local }}</option>
                    @endforeach
                </select>
                @error('id_local_armazenamento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
    </div>
</div>
