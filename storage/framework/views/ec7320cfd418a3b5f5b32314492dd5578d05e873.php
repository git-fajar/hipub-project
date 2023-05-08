
<?php $__env->startSection('container'); ?>
<div class="h-screen w-full p-10">
    
    
    <div class="flex flex-warp gap-6">
        <div class="w-1/4 p-4 bg-white rounded-xl">
            <div class="flex grid-cols-3 text-slate-900 bg-neutral-50 p-3 rounded-md">
                <i class="w-[6%] bx bx-repeat text-[16px]"></i>
                <span class="w-[88%] text-[12px] pl-3">Artikel yang diporses</span>
                <a href="" class='w-[6%] bx bx-dots-vertical-rounded'></a>
            </div>
            <div class="flex grid-cols-2">
                <div class="font-semibold text-7xl text-cyan-400"><?php echo e(count($article_progress)); ?></div>
                <span class="text-[16px] mt-10 ml-1 text-cyan-400">Artikel</span>
            </div>
        </div>
        <div class="w-1/4 p-4 bg-white rounded-xl">
            <div class="flex grid-cols-3 text-slate-900 bg-neutral-50 p-3 rounded-md">
                <i class="w-[6%] bx bxs-file text-[16px]"></i>
                <span class="w-[88%] text-[12px] pl-3">Artikel yang dipublish</span>
                <a href="" class='w-[6%] bx bx-dots-vertical-rounded'></a>
            </div>
            <div class="flex grid-cols-2">
                <div class="font-semibold text-7xl text-cyan-400"><?php echo e(count($article_publish)); ?></div>
                <span class="text-[16px] mt-10 ml-1 text-cyan-400">Artikel</span>
            </div>
        </div>
        <div class="w-1/4 p-4 bg-white rounded-xl">
            <div class="flex grid-cols-3 text-slate-900 bg-neutral-50 p-3 rounded-md">
                <i class="w-[6%] bx bxs-comment-detail text-[16x]"></i>
                <span class="w-[88%] text-[12px] pl-3">Jumlah Pelatihan diikuti</span>
                <a href="" class='w-[6%] bx bx-dots-vertical-rounded'></a>
            </div>
            <div class="flex grid-cols-2">
                <div class="font-semibold text-7xl text-cyan-400"><?php echo e(count($agenda)); ?></div>
                <span class="text-[16px] mt-10 ml-1 text-cyan-400">Pelatihan</span>
            </div>
        </div>
        <div class="w-1/4 p-4 bg-white rounded-xl">
            <div class="flex grid-cols-3 text-slate-900 bg-neutral-50 p-3 rounded-md">
                <i class="w-[6%] bx bxs-like text-[16px]"></i>
                <span class="w-[88%] text-[12px] pl-3">Total seluruh pelatihan</span>
                <a href="" class='w-[6%] bx bx-dots-vertical-rounded'></a>
            </div>
            <div class="flex grid-cols-2">
                <div class="font-semibold text-7xl text-cyan-400"><?php echo e(count($agenda_offline)+count($agenda_online)); ?></div>
                <span class="text-[16px] mt-10 ml-1 text-cyan-400">Pelatihan</span>
            </div>
        </div>
    </div>
    <div class="flex flex-warp mt-6 gap-6">
        <div class="w-1/2 p-4 bg-white rounded-xl">
            <div class="bg-neutral-50 px-4 py-3 rounded-md">
                <i class="bx bxs-file text-[16px] text-slate-900"></i>
                <span class="pl-2 font-semibold text-slate-900 text-[14px]">Artikel yang telah di publish dalam setahun</span>
            </div>
            <canvas class="p-2 h-[50px]" id="chartLine"></canvas>
              
            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              
            <!-- Chart bar -->
            <script>
                // const labels = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                const labels = [
                    <?php $__currentLoopData = $diagram_fix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($d['nama']); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ];
                const data = {
                  labels: labels,
                  datasets: [
                    {
                      label: "Jumlah Artikel",
                      backgroundColor: "#00A6CF",
                      borderColor: "#00A6CF",
                      data: [
                        <?php $__currentLoopData = $diagram_fix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($d['total']); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                    },
                  ],
                };
                const configLineChart  = {
                  type: "line",
                  data,
                  options: {},
                };
                var chartBar = new Chart(
                  document.getElementById("chartLine"),
                  configLineChart
                );
              </script>
        </div>
        <div class="w-1/2 p-4 bg-white h-auto rounded-xl">
            <div class="bg-neutral-50 px-4 py-3 rounded-md">
                <i class="bx bxs-chalkboard text-[16px] text-slate-900"></i>
                <span class="pl-2 font-semibold text-slate-900 text-[14px]">Jumlah pelatihan yang telah diikuti</span>
            </div>
            <div class="flex justify-center h-[220px]">
                <canvas class="p-2" id="chartDoughnut"></canvas>
            </div>
                
            <!-- Chart doughnut -->
            <script>
                const dataDoughnut = {
                    labels: ["Pelatihan Online", "Pelatihan Offline"],
                    datasets: [
                        {
                            data: [<?php echo e(count($agenda_online)); ?>, <?php echo e(count($agenda_offline)); ?>],
                            backgroundColor: [
                                "#00A6CF",
                                "#00ccff",
                            ],
                            hoverOffset: 4,
                        },
                    ],
                };
                const configDoughnut = {
                    type: "doughnut",
                    data: dataDoughnut,
                    options: {},
                };
                var chartBar = new Chart(
                    document.getElementById("chartDoughnut"),
                    configDoughnut
                );
            </script>
        </div>
    </div>
    <div class="flex flex-warp gap-6 mt-6 pb-10">
        <div class="w-full px-4 pt-4 pb-6 bg-white rounded-xl">
            <div class="bg-neutral-50 px-4 py-3 mb-2 rounded-md">
                <i class="bx bxs-calendar-plus text-[16px] text-slate-900"></i>
                <span class="pl-2 font-semibold text-slate-900 text-[14px]">Jadwal Saya</span>
            </div>
            <?php $__currentLoopData = $jadwal_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex grid-cols-2 px-4 mt-4 text-slate-600">
                <i class='bx bx-calendar'></i>
                <span class="text-sm pl-2"><?php echo e(date('Y-m-d', strtotime($j->start))); ?> - <?php echo e(date('Y-m-d', strtotime($j->end))); ?></span>
                <hr class="grow h-1 ml-3 mt-3">
            </div>
            <div class="flex grid-cols-2 pl-10 mt-2">
                <div class='bg-cyan-400 rounded-full w-1 h-5'></div>
                <span class="text-sm font-semibold pl-2 text-slate-900"><?php echo e($j->title); ?> - <?php echo e($j->desc); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/dashboard-fix.blade.php ENDPATH**/ ?>