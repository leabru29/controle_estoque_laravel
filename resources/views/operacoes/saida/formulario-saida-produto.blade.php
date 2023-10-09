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
                        <option value="{{ $produto->id }}">Produto: {{ $produto->nome }} | Cód:
                            {{ $produto->cod_item }}
                        </option>
                    @endforeach
                </select>
                @error('id_produto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control @error('quantidade') is-invalid @enderror" id="quantidade"
                    name="quantidade">
                @error('quantidade')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">


        </div>
    </div>
</div>
