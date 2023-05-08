<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo1.png">
    <title>HiPub | Dashboard</title>
    <script src='https://cdn.tailwindcss.com'></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
    .active > a{
        --tw-text-opacity: 1;
        color: rgb(255 159 41 / var(--tw-text-opacity));
    }
    
</style>

<body class="bg-teal-50">
    
    
        <div class="fixed left-0">
            <div class="w-70 bg-white h-screen px-8 py-10 rounded-r-[20px] shadow-lg">
                <img src="<?php echo e(asset('img/logo2.png')); ?>" alt="" class="h-[100px] w-auto px-14">
                <div class="mt-[30px] h-full grid grid-flow-row list">
                    
                    
                    <div class="flex flex-col row-span-2 space-y-5 sublist">
                        <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/dashboard" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full <?= ((request()->segment(2) == 'dashboard')|| (request()->segment(1) == 'home'))?'text-white bg-cyan-400 hover:bg-cyan-600 ':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-dashboard bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">dashboard</span>
                            </div>
                        </a>
                        <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/artikel" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full  <?= ((request()->segment(2) == 'artikel') || (request()->segment(1) == 'add_article') || in_array(request()->segment(3), ['artikel','payment','revisi','revisi_vendor']))?'text-white bg-cyan-400 hover:bg-cyan-600':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-book-content bx-sm' ></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">riwayat artikel</span>
                            </div>
                        </a>
                        <?php if(Auth::user()->type == 'admin'): ?>
                        <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/klinik" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full <?= (in_array(request()->segment(2),['klinik','add_agenda']))?'text-white bg-cyan-400 hover:bg-cyan-600':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-calendar-plus bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">jadwal aktivitas</span>
                            </div>
                        </a>                  
                        <?php endif; ?>

                        <?php if(Auth::user()->type == 'user'): ?>                   
                        <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/log" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full   <?= (request()->segment(2) == 'log')?'text-white bg-cyan-400 hover:bg-cyan-600':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <div class="flex items-center">
                                <i class='bx bx-history bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">catatan</span>
                            </div>
                        </a>
                        <a href="<?php echo e(url('')); ?>/<?php echo e(Auth::user()->type); ?>/klinik" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full  <?= ((in_array(request()->segment(2),['klinik'])) || (request()->segment(3) == 'show_agenda'))?'text-white bg-cyan-400 hover:bg-cyan-600':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <div class="flex items-center">
                                <i class='bx bxs-calendar-plus bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">jadwal aktivitas</span>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                    
    
                    
                    <div class="flex flex-col bottom-0 mb-20">
                        <a href="<?php echo e(route('profile',Auth::user()->id)); ?>" class="no-underline border-[1px] border-cyan-400 px-4 py-2 rounded-full <?= (request()->segment(1) == 'akun')?'text-white bg-cyan-400 hover:bg-cyan-600':'text-cyan-400 hover:text-white hover:bg-cyan-400 ';?>">
                            <i class='bx bxs-user bx-sm'></i>
                            <span class=" pl-2 pb-[2px] capitalize text-md"><?php echo e(Auth::user()->type); ?></span>
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="flex w-full bg-white mt-5 px-4 py-2 rounded-full text-cyan-400 items-center border-[1px] border-cyan-400 hover:text-white hover:bg-cyan-400">
                                <i class='bx bx-log-out bx-sm'></i>
                                <span class=" pl-2 pb-[2px] capitalize text-md">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-60 bg-teal-50">
            <?php echo $__env->yieldContent('container'); ?>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    
        <script>
            jQuery(document).ready(function () {
                jQuery(".sublist div").click(function (){
                    jQuery(".sublist div").removeClass('active');
                    jQuery(this).addClass('active');
                })
                var loc = window.location.href;
                jQuery(".sublist div a").each(function (){
                    if (loc.indexOf(jQuery(this).attr("href")) != -1){
                        jQuery(this).closest('div').addClass("active");
                    }
                });
            });
            
        </script>
        
        <script>
            const searchInput = document.getElementById('search');
            const tableRows = document.querySelectorAll('tbody tr');
            searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase();
    
            tableRows.forEach(row => {
                // const name = row.children[0].textContent.toLowerCase();
                const judul = row.children[1].textContent.toLowerCase();
                const status = row.children[2].textContent.toLowerCase();
    
                if (judul.includes(query) || status.includes(query)) {
                row.style.display = '';
                } else {
                row.style.display = 'none';
                }
            });
            });
        </script>
        
         <script>
                        // Get the table and dropdown elements
            const table = document.querySelector('#my-table');
            const statusFilter = document.querySelector('#status-filter');

            // Attach a change event listener to the dropdown
            statusFilter.addEventListener('change', function() {
            // Get the selected status value
            const selectedStatus = statusFilter.value.toLowerCase();;

            // Get all rows in the table body
            const rows = table.querySelectorAll('tbody tr');

            // Loop through each row and check if the status matches the selected value
            rows.forEach(row => {
                // Get the status cell value for the current row
                const statusCell = row.querySelector('td:nth-child(3)');
                const status = statusCell.textContent.toLowerCase();

                // Show or hide the row based on the status value
                if (selectedStatus === '' || status.includes(selectedStatus) ) {
                row.style.display = '';
                } else {
                row.style.display = 'none';
                }
            });
            });

        </script>
    </body>
</html><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/layout.blade.php ENDPATH**/ ?>