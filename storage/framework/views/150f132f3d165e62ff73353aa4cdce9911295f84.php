
<?php $__env->startSection('container'); ?>


    <div class="w-full h-screen bg-cover flex items-center justify-center bg-teal-50 pt-2">
        <div class="w-[570px] pb-14 rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7">
                
            </div>
            <div class="container px-[70px] pt-2">
                <div class="container">
                    <h1 class="mt-2 font-bold text-3xl text-center capitalize tracking-wide text-cyan-400">Akun</h1>
                    <p class="mt-2 font-bold text-1xl text-center capitalize tracking-wide text-cyan-400">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                    </p>
                </div>
                <form action="<?php echo e(route('save_profile',$profile->id)); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input class="w-full mt-[30px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md" name="name" type="text" placeholder="Nama Lengkap" required autocomplete="name" autofocus value="<?php echo e($profile->name); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600"><?php echo e($message); ?></p>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="w-full mt-[20px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md" name="email" type="text" placeholder="Email" autocomplete="email" value="<?php echo e($profile->email); ?>">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600"><?php echo e($message); ?></p>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class="w-full mt-[20px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-2 rounded-md" name="password" type="password" placeholder="Kata Sandi Baru" autocomplete="new-password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600"><?php echo e($message); ?></p>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                <hr class="border-t-1 border-slate-600 mt-4 opacity-50">
                <div class="mt-4 flex justify-between">
                    <button class="w-[150px] uppercase py-1 rounded-md text-center text-cyan-400 font-bold border-2 border-cyan-400 hover:bg-cyan-400 hover:text-white" type="submit">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/profile.blade.php ENDPATH**/ ?>