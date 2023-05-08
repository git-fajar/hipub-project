<?php 
function bang($var){
if ($var == 'Menunggu Verifikasi') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Dalam Proses') {
    $v = 'bg-sky-600'; 
}elseif($var == 'Revisi (E)'){
    $v = 'bg-orange-500';
}elseif ($var == 'Revisi (V)') {
    $v = 'bg-orange-500'; 
}elseif ($var == 'sudah revisi') {
    $v = 'bg-orange-500'; 
}elseif ($var == 'Verifikasi (E)') {
    $v = 'bg-green-500'; 
}elseif ($var == 'Accepted') {
    $v = 'bg-green-500'; 
}elseif ($var == 'Publish') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Pembayaran Ditolak') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Rejected') {
    $v = 'bg-red-600'; 
}elseif ($var == 'Proses') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Pembayaran') {
    $v = 'bg-sky-600'; 
}elseif ($var == 'Under Review') {
    $v = 'bg-sky-600'; 
}else{
    $v = ''; 
}
return $v;
}
?>

<?php $__env->startSection('container'); ?>
    <div class="h-screen w-full px-16 py-16">
        <div class="flex flex-warp gap-4">
            <div class="w-[10%] h-auto justify-center flex bg-white rounded-xl cursor-pointer">
                <span class="self-center pl-2 pr-1 bx bx-filter" id="status-select"></span>
                <select class="w-full pr-4 py-2 rounded-xl capitalize appearance-none focus:outline-none cursor-pointer" name="status" id="status-filter">
                    <option class="capitalize text-slate-600" value="">filter</option>
                    <option class="capitalize text-black" value="Verifikasi">verifikasi</option>
                    <option class="capitalize text-black" value="Revisi">revisi</option>
                    <option class="capitalize text-black" value="Proses">proses</option>
                    <option class="capitalize text-black" value="Publish">publish</option>
                </select>
            </div>
            <div class="w-[75%] flex px-4 py-2 bg-white rounded-xl capitalize cursor-pointer">
                <span class="self-center bx bx-search"></span>
                <input class="w-full pl-1 appearance-none focus:outline-none" id="search" name="judul" type="text" placeholder="pencarian" >
            </div>
            <a href="<?php echo e(url('')); ?>/add_article" class="w-[15%] h-auto px-4 py-2 focus:outline-cyan-400 bg-white rounded-xl capitalize appearance-none hover:bg-cyan-400 hover:text-white"><span class="bx bx-plus"></span> upload</a>
        </div>
        <div class="bg-white rounded-xl mt-6 px-5 pb-5">
            <table class="w-full" id="my-table">
                <thead>
                    <tr class="py-9 border-b-2 border-gray-400">
                        <th class="uppercase w-1/12 font-bold px-3 pt-4 pb-3"> no</td>
                        <th class="uppercase w-8/12 font-bold pt-4 pb-3"> judul artikel</td>
                        <th class="uppercase w-3/12 font-bold pt-4 pb-3"> status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                    $link_status = (($a->status == 'Pembayaran') || ($a->status == 'Menunggu Verifikasi'))?'payment':(($a->status == 'Pembayaran Ditolak') ? 'payment' : 'artikel') ;
                    // $link_status = 'artikel'; 
                    ?>
                    <tr>
                        <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3"><?php echo e($loop->iteration); ?></td>
                        <td class="w-8/12  capitalize border-b border-[#727272] border-opacity-50"><?php echo e($a->judul_artikel); ?></td>
                        <td class="w-3/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                            <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/<?php echo e($a->id); ?>/<?php echo e($link_status); ?>"><button class="capitalize px-4 rounded-2xl font-bold py-1 <?= bang($a->status)?>"><?php echo e(($a->status == 'Verifikasi (E)')?'Proofreading':$a->status); ?></button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/artikel.blade.php ENDPATH**/ ?>