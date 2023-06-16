<form action="{{route('moneys.update',1)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="amount" class="col-form-label"> Tambahkan Uang</label>
        <input type="number" min="0" class="form-control" id="amount" name="amount">
    </div>
    <button class="btn-cent" type="submit" name="create" value="create">
        Tambah Uang
    </button>
</form>
