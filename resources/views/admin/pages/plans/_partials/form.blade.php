
@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Digite Nome:" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Preco:</label>
    <input type="text" name="price" class="form-control" placeholder="Digite Preco:" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Descricao:</label>
    <input type="text" name="description" class="form-control" placeholder="Digite Descricao:" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
