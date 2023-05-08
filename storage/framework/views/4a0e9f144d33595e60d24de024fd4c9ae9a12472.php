
<?php $__env->startSection('container'); ?>
    <div class="w-full h-screen p-14">
        <div class="w-full pb-10">
            <div class="w-full rounded-[10px] bg-white p-5">
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="cursor-pointer bx bx-arrow-back text-lg"></a>
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-dark md:text-3xl">Detail Agenda</h2>
                </div>
                <div class="mx-auto lg:w-full my-6 justify-center">
                    <div class="container lg:w-[75%] md:w-full sm:w-full mt-4 mb-6">
                        <form action="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type.'/'.$agenda->id); ?>/add_jadwal" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="flex flex-warp">
                                <div class="w-[25%] self-center text-md font-bold">Judul</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e($agenda->title); ?></div>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Tanggal Mulai</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e(date('Y-m-d', strtotime($agenda->start))); ?></div>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Tanggal Akhir</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e(date('Y-m-d', strtotime($agenda->end))); ?></div>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] pt-2 text-md font-bold">Deskripsi Kegiatan</div>
                                <div class="w-[4%] pt-2 text-md font-bold">:</div>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e($agenda->desc); ?></div>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Jenis Kegiatan</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <?php if($agenda->tipe == 'offline'): ?>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e($agenda->tipe); ?></div>
                                <?php else: ?>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e($agenda->tipe); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-warp mt-4">
                                <div class="w-[25%] self-center text-md font-bold">Link/Alamat</div>
                                <div class="w-[4%] self-center text-md font-bold">:</div>
                                <?php if($agenda->tipe == 'offline'): ?>
                                <div class="w-[71%] capitalize self-center text-md font-bold"><?php echo e($agenda->desc); ?></div>
                                <?php else: ?>
                                <div class="w-[71%] text-primary underline self-center text-md font-bold"><a href="<?php echo e($agenda->link); ?>" target="_blank"><?php echo e($agenda->link); ?></a></div>
                                <?php endif; ?>
                            </div>
                            <div class="mt-6 flex flex-shrink items-center justify-between">
                                
                                <?php if($listed != TRUE): ?>
                                <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/klinik" type="button" class="inline-block rounded bg-indigo-100 px-5 py-2.5 mr-2 mb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-primary hover:text-white">Batal</a>
                                <button onclick="return confirm('Ikuti Jadwal?')" class="text-white text-right bg-primary hover:bg-primaryhover focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5 mb-2 focus:outline-none" type="submit">Ikuti</button>
                                <?php else: ?>
                                <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/klinik" type="button" class="text-white text-right bg-primary hover:bg-primaryhover focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5 mb-2 focus:outline-none">Kembali</a>
                                <label class="text-white text-right bg-primary hover:bg-primaryhover focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5 mb-2 focus:outline-none">Sudah diikuti</label>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/show_agenda.blade.php ENDPATH**/ ?>