<div class="container-fluid">
    <h1 class=" h3 mb-2 text-gray-800">
        Pengumuman
    </h1>
    <!-- loop kelas with iteration -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembuat</th>
                            <th>Judul</th>
                            <th>Berkas</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengumumanList as $key => $pengumumanItem) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $pengumumanItem->admin->nama ?></td>
                                <td><?= $pengumumanItem->judul  ?></td>
                                <td>
                                    <?php $cek = 0; ?>
                                    <?php foreach ($pengumumanItem->files as $key2 => $file) : ?>
                                        <?php $cek = 1; ?>
                                        <div class="mb-2">
                                            <a href="<?= base_url('./assetsAdmin/files/uploads/pengumuman/' . $file->file_name) ?>" target="_blank">
                                                <?= $file->display_name ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php if ($cek == 0) : ?>
                                        <?php echo "Tidak ada file" ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $pengumumanItem->deskripsi ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>