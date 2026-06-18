

<?php $__env->startSection('konten'); ?>
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>
        
        <!-- BUTTON TAMBAH: Mengarah ke rute surat.create -->
        <a href="<?php echo e(route('surat.create')); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    <!-- FLASH SESSION: Menampilkan notifikasi sukses setelah redirect -->
    <?php if(session('sukses')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle mr-2"></i> <?php echo e(session('sukses')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="bg-light">
                <tr>
                    <th style="width: 5%">No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $semuaSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><span class="badge badge-secondary"><?php echo e($s->nomor_surat); ?></span></td>
                    <td><?php echo e($s->jenis_surat); ?></td>
                    <td><strong><?php echo e($s->penduduk->nama); ?></strong></td>
                    <td><?php echo e($s->penduduk->nik); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y')); ?></td>

                    <td>
                        <div class="btn-group" role="group">
                            <a href="<?php echo e(route('surat.edit', $s->id)); ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="<?php echo e(route('surat.destroy', $s->id)); ?>" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')"
                                class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data pengajuan surat.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAB\Herd\Simpel\resources\views/surat/index.blade.php ENDPATH**/ ?>