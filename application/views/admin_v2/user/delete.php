<?php if ($this->user_model->detail($this->session->userdata('id'))->akses_level == '21' || $this->user_model->detail($this->session->userdata('id'))->akses_level == '1') {  ?>
    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $users->id_user ?>" title="Delete">
        <i class="far fa-trash-alt"></i>
    </button>


    <div class="modal fade" tabindex="-1" role="dialog" id="myModal<?php echo $users->id_user ?>">
        <div class="modal-dialog" role="document">
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
                    <a href="<?php echo base_url('admin/user/delete/' . $users->id_user) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>


<?php } else {
    redirect('oops', 'refresh');
} ?>