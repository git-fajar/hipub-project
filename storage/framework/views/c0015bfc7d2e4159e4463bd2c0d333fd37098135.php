
<?php $__env->startSection('container'); ?>
    <div class="w-full h-screen px-14 pt-10 mb-20">
        <div class="w-full rounded-[10px] bg-white px-10 pt-2 pb-6">
            <table class="w-full">
                <thead>
                    <tr class="py-9 border-b-2 border-gray-400">
                        <th class="uppercase w-1/12 text-center font-bold px-3 pt-4 pb-3">no</td>
                        <th class="uppercase w-8/12 text-center font-bold pt-4 pb-3">log publikasi</td>
                        <th class="uppercase w-3/12 text-center font-bold pt-4 pb-3">tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="w-1/12 text-center border-b border-gray-300 py-3"><?php echo e(($log->currentpage()-1) * $log->perpage() + $loop->index + 1); ?></td>
                        <td class="w-8/12 text-center border-b border-gray-300"><?php echo e($l->keterangan); ?></td>
                        <td class="w-3/12 text-center border-b border-gray-300"><?php echo e($l->tanggal); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
            <br/>
	
 
 
	<?php echo e($log->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/log.blade.php ENDPATH**/ ?>