<?php $__env->startSection('judul', 'Tambah Data Surat'); ?>

<?php $__env->startSection('konten'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Pengajuan Surat Baru</h3>
    </div>
    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger m-3">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('surat.store')); ?>" method="POST">
        <?php echo csrf_field(); ?> 
        
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="<?php echo e(old('nomor_surat')); ?>" placeholder="Contoh: 005/SKTM/2026">
            </div>

            <div class="form-group mb-3">
                <label for="jenis_surat">Jenis Surat</label>
                <select name="jenis_surat" class="form-control" id="jenis_surat">
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                    <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                    <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="penduduk_id">Warga Pemohon</label>
                <select name="penduduk_id" class="form-control" id="penduduk_id">
                    <option value="">-- Pilih Warga --</option>
                    <?php $__currentLoopData = $penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->nik); ?> - <?php echo e($p->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_ajuan">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_ajuan" class="form-control" id="tanggal_ajuan" value="<?php echo e(date('Y-m-d')); ?>">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
            <a href="<?php echo e(route('surat.index')); ?>" class="btn border">Kembali</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAB\Herd\simpel\resources\views/surat/create.blade.php ENDPATH**/ ?>