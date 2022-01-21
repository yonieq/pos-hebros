<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_barang" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-lg-2 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-6">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_supplier" class="col-lg-2 col-lg-offset-1 control-label">Supplier</label>
                        <div class="col-lg-6">
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                <option value="">Pilih Supplier</option>
                                @foreach ($supplier as $a => $data)
                                <option value="{{ $a }}">{{ $data }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk" class="col-lg-2 col-lg-offset-1 control-label">Merk</label>
                        <div class="col-lg-6">
                            <input type="text" name="merk" id="merk" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_serial" class="col-lg-2 col-lg-offset-1 control-label">Nomor Serial</label>
                        <div class="col-lg-6">
                            <input type="text" name="nomor_serial" id="nomor_serial" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-lg-2 col-lg-offset-1 control-label">Satuan</label>
                        <div class="col-lg-6">
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">Pilih Satuan</option>
                                <option selected value="BOX">Box</option>
                                <option value="PCS">Pcs</option>
                                <option value="UNIT">Unit</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-lg-2 col-lg-offset-1 control-label">Harga Beli</label>
                        <div class="col-lg-6">
                            <input type="number" name="harga_beli" id="harga_beli" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-lg-2 col-lg-offset-1 control-label">Harga Jual</label>
                        <div class="col-lg-6">
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-lg-2 col-lg-offset-1 control-label">Diskon</label>
                        <div class="col-lg-6">
                            <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-lg-2 col-lg-offset-1 control-label">Stok</label>
                        <div class="col-lg-6">
                            <input type="number" name="stok" id="stok" class="form-control" required value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="garansi" class="col-lg-2 col-lg-offset-1 control-label">Garansi</label>
                        <div class="col-lg-6">
                            <input type="date" name="garansi" id="garansi" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="garansi" class="col-lg-2 col-lg-offset-1 control-label">Keterangan</label>
                        <div class="col-lg-6">
                            <textarea name="keterangan" id="keterangan" cols="20" rows="10" class="form-control"></textarea>
                            <!-- <input type="text" name="keterangan" id="keterangan" class="form-control" required> -->
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>