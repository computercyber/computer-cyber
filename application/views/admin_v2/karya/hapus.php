<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $jabatan->id_jabatan ?>">
<i class="far fa-trash-alt"></i>
</button>

<div class="modal fade" id="modal-danger<?php echo $jabatan->id_jabatan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pilih <span class="text-danger"><strong>Hapus</strong></span> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?php echo site_url('admin/jabatan/delete/' . $jabatan->id_jabatan); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->