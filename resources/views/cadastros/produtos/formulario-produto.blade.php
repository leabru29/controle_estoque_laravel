@csrf
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="cod_item">Código do Item</label>
                <input type="text" class="form-control @error('cod_item') is-invalid @enderror" id="cod_item"
                    name="cod_item" @if ($produto) value="{{ $produto->cod_item }}" @endif>
                @error('cod_item')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                    name="nome" @if ($produto) value="{{ $produto->nome }}" @endif>
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao"
                    name="descricao" @if ($produto) value="{{ $produto->descricao }}" @endif>
                @error('descricao')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="princ_ativo">Princípio Ativo</label>
                <input type="text" class="form-control @error('princ_ativo') is-invalid @enderror" id="princ_ativo"
                    name="princ_ativo" @if ($produto) value="{{ $produto->princ_ativo }}" @endif>
                @error('princ_ativo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cond_armazenagem">Condições de Armazenamento</label>
                <input type="text" class="form-control @error('cond_armazenagem') is-invalid @enderror"
                    id="cond_armazenagem" name="cond_armazenagem"
                    @if ($produto) value="{{ $produto->cond_armazenagem }}" @endif>
                @error('cond_armazenagem')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="valor" class="form-control @error('valor') is-invalid @enderror" id="valor"
                    name="valor" @if ($produto) value="{{ $produto->valor }}" @endif>
                @error('valor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_grupo">Grupo de Produto</label>
                <select type="text" class="form-control @error('id_grupo') is-invalid @enderror" id="id_grupo"
                    name="id_grupo">
                    @error('id_grupo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if ($produto)
                        <option value="{{ $produto->id_grupo }}" selected>{{ $produto->grupo->grupo }}</option>
                    @else
                        <option value="">Selecione um Grupo</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->grupo }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>
