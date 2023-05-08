
<?php $__env->startSection('container'); ?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <style>
        .fc .fc-button {
            background-color: #00ccff;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button:hover {
            background-color: #00A6CF;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button-primary { 
            border-color: #E1F2F6;
        }
        .fc .fc-button-primary:disabled {
            background-color: #00A6CF;
        }
        .fc .fc-daygrid-day.fc-day-today {
            background-color: #E1F2F6;
        }
    </style>
    
    <div class="w-full h-screen p-14">
        <div class="w-full pb-10">
            <div class="w-full rounded-[10px] bg-white p-5">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="my-2 text-3xl font-extrabold tracking-tight text-slate-900 md:text-3xl">Jadwal Aktivitas</h2>
                </div>
                <div class="mx-auto lg:w-full my-6">
                    <div class="container flex pt-2 pb-6  justify-center">
                        <div class="lg:w-[70%] md:w-full sm:w-full" id='calendar'></div>
                    </div>
                    <div class="w-full px-6">
                        <div class="py-2 border border-l-0 border-r-0 text-center">
                            <div class="pl-1 font-semibold text-slate-900 text-lg">Aktivitas Saya</div>
                        </div>
                        <?php $__currentLoopData = $jadwal_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section
                            class="relative flex w-full items-start justify-center overflow-y-hidden">
                            <!-- Sidenav -->
                            <div class="w-full" id="accordion">
                                <div class="border border-l-0 border-r-0 border-t-0 border-[#e5e7eb]">
                                    <div class="mb-0" id="flush-heading<?php echo e($c["id"]); ?>">
                                        <a href="<?php echo e($c["url"]); ?>" class="group relative flex w-full items-center rounded-none border-0 py-2 px-5 text-left text-slate-900 text-[14px] transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-cyan-400 [&:not([data-te-collapse-collapsed])]"
                                        type="button"
                                        data-te-collapse-init
                                        data-te-collapse-collapsed
                                        data-te-target="#flush-collapse<?php echo e($c["id"]); ?>"
                                        aria-expanded="true"
                                        aria-controls="flush-collapse<?php echo e($c["id"]); ?>">
                                            <div class='bg-cyan-600 hover:bg-cyan-400 rounded-full w-1 h-5 mr-2'></div>
                                        <div class="font-bold"><?php echo e($c["title"]); ?></div>
                                            <span class="ml-auto h-4 w-4 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="h-4 w-4">
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div
                                        id="flush-collapse<?php echo e($c["id"]); ?>"
                                        class="!visible border-0 flex w-full justify-between"
                                        data-te-collapse-item
                                        aria-labelledby="flush-heading<?php echo e($c["id"]); ?>"
                                        data-te-parent="#accordion">
                                        <div class="col w-auto">
                                            <div class="px-4 pt-3 text-slate-600 text-sm">
                                                <i class='bx bx-calendar'></i>
                                                <span class="pl-1"><?php echo e($c["start"]); ?> - <?php echo e($c["end"]); ?></span>
                                            </div>
                                            <div class="px-4 pb-2 text-sm pt-2">
                                                <?php echo e($c["desc"]); ?>

                                            </div>
                                        </div>
                                        <div class="col w-auto pt-3 pr-5 text-right">
                                            <div class="space-y-2">
                                                <button
                                                    type="button"
                                                    class="inline-block rounded bg-cyan-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-cyan-600"
                                                    data-te-toggle="modal"
                                                    
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                    <a href="<?php echo e($c->id.'/show_agenda'); ?>">Lihat Pelatihan</a>
                                                </button>
                                                <div
                                                    data-te-modal-init
                                                    class="fixed top-[-8px] left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none bg-black bg-opacity-50"
                                                    id="modalCenter<?php echo e($c["id"]); ?>"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModalCenterTitle"
                                                    aria-modal="true"
                                                    role="dialog">
                                                    <div
                                                        data-te-modal-dialog-ref
                                                        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                                        <div
                                                        class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                                        <div
                                                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border border-l-0 border-r-0 border-t-0 border-slate-100 border-opacity-100 p-4">
                                                            <h5
                                                            class="text-xl font-medium leading-normal text-neutral-800"
                                                            id="exampleModalScrollableLabel">
                                                            <?php echo e($c["title"]); ?>

                                                            </h5>
                                                            <button
                                                            type="button"
                                                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                            data-te-modal-dismiss
                                                            aria-label="Close">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6">
                                                                <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            </button>
                                                        </div>
                                                        <div class="relative p-4 text-left">
                                                            <p><?php echo e($c["desc"]); ?></p>
                                                        </div>
                                                        <div
                                                            class="flex flex-shrink-0 flex-wrap items-center justify-between rounded-b-md border border-l-0 border-r-0 border-b-0 border-slate-100 border-opacity-100 p-4">
                                                            <button
                                                            type="button"
                                                            class="mr-2 inline-block rounded bg-indigo-100 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-cyan-400 transition duration-150 ease-in-out hover:bg-cyan-400 hover:text-white"
                                                            data-te-modal-dismiss
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            Tutup
                                                            </button>
                                                            <button
                                                            type="button"
                                                            class="ml-1 inline-block rounded bg-cyan-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-cyan-600"
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            Daftar
                                                            </button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // calendar
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',    
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,basicWeek,basicDay'
          },
          defaultView: 'month',
          editable: false,
          events: [
            <?php $__currentLoopData = $data_calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              {
                  title: "<?php echo e($c['title']); ?>",
                  start: "<?php echo e($c['start']); ?>",
                  end: "<?php echo e($c['end']); ?>",
                  url: "<?php echo e($c['id'].'/show_agenda'); ?>"
              },
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
          });
          calendar.render();
        });
        const tabs = document.querySelectorAll('.border-t > a');    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/user/klinik.blade.php ENDPATH**/ ?>