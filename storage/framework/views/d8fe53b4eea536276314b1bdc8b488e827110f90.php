
<?php $__env->startSection('container'); ?>
<div class="h-screen w-full px-16 py-14">

    <div class="flex flex-col space-y-8">
        <div class="w-full py-2 pl-8 pr-4 flex justify-between rounded-xl bg-white">
            <div class="flex space-x-4">
                <div class=" w-10 h-10 p-2 my-auto rounded-full bg-pink-400">
                    <i class="bx bx-user bx-sm text-white"></i>
                </div>
                <div class=" flex flex-col">
                    <h1 class="font-bold capitalize"><?php echo e(Auth::user()->name); ?> </h1>
                    <h2 class=" text-sm"><?php echo e(Auth::user()->email); ?></h2>
                    
                </div>
            </div>
        </div>
        <div class="bg-white px-[77px] pt-[20px] pb-[25px] text-center rounded-xl">
            <h2 class=" text-xl capitalize">judul artikel</h2>
            <h1 class=" mt-2 font-bold text-2xl capitalize"><?php echo e($article->judul_artikel); ?></h1>
            <div class="mt-8 flex flex-warp justify-center gap-6">
                
                <?php if($article->file_revisi != NULL): ?>
                <div class="flex">
                    <a href="<?php echo e(asset('revisi_files/'.$article->file_revisi)); ?>" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-orange-500 hover:bg-orange-700 py-2 rounded-lg capitalize">Download Revisi Artikel</button></a>
                </div>
                <?php endif; ?>
                <?php if($article->loa_file != NULL): ?>
                <div class="flex">
                    <a href="<?php echo e(asset('loa_files/'.$article->loa_file)); ?>" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-green-500 hover:bg-green-700 py-2 rounded-lg capitalize">Download LOA</button></a>
                </div>
                <?php endif; ?>
                <div class="flex">
                    <a href="<?php echo e(asset('article_files/'.$article->nama_file)); ?>" target="_blank"><button type="button" class="font-bold text-white w-[200px] text-center bg-red-600 hover:bg-red-700 py-2 rounded-lg capitalize">Download Artikel</button></a>
                </div>
                
                    <?php echo ($article->status == 'Revisi (E)')?'<a href="revisi">':((($article->status == 'Proses')||($article->status == 'Verifikasi (E)'))?'<a href="revisi_vendor">':'');?>
                <div class="capitalize font-bold text-white bg-sky-500 hover:bg-sky-700 px-20 py-2 rounded-[10px]"><?php echo e(($article->status == 'Verifikasi (E)')?'Proofreading':$article->status); ?></div>
                </a>
            </div>
        </div>
        <div class="bg-white p-8 h-[250px] rounded-xl overflow-auto scrollbar-hide">
            <h1 class="text-xl capitalize">komentar :</h1>
            <hr class="grow h-1 mt-2 mb-2">
            <div class="flex grid-cols-2 pl-2 mt-2">
                <i class='bg-cyan-600 rounded-full w-1 h-6 mt-1'></i>
                <p class="text-xl pl-2">
                    <?php echo e(($article->komentar_vendor == "Belum ada komentar") ? $article->komentar_editor : $article->komentar_vendor); ?>

                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/details.blade.php ENDPATH**/ ?>