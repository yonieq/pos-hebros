<div class="modal fade" id="modal-pelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-pelanggan">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Pelanggan</h4>
            </div>
            <div class="modal-body">
                <button onclick="addForm('{{ route('pelanggan.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Pelanggan</button>
                <table class="table table-striped table-bordered table-pelanggan">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $key => $item)
                        <tr>
                            <td width="5%">{{ $key+1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs btn-flat" onclick="pilihPelanggan('{{ $item->id_pelanggan }}', '{{ $item->kode_pelanggan }}')">
                                    <i class="fa fa-check-circle"></i>
                                    Pilih
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('pelanggan.form')
@include('sweetalert::alert')

@push('scripts')
<script>
    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Pelanggan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();
    }
</script>
@endpush